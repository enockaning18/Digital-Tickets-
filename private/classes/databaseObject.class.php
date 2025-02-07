<?php
class databaseObject
{
    static protected $database;
    static protected $table_name = '';
    static protected $table_column = [];


    static public function set_database($database)
    {
        self::$database = $database;
    }


    public function object_data()
    {
        $object_data = [];
        foreach (static::$table_column as $column) {
            if ($column == 'id') {
                continue;
            }
            $object_data[$column] = $this->$column;
        }
        return $object_data;
    }

    public function object_data_for_insert()
    {
        $object_data = [];
        foreach (static::$table_column as $column) {
            $object_data[$column] = $this->$column;
        }
        return $object_data;
    }

    public function sanitize_object_data_for_insert()
    {
        $sanitize = [];
        foreach ($this->object_data_for_insert() as $key => $value) {
            $sanitize[$key] = self::$database->escape_string($value);
        }
        return $sanitize;
    }

    public function sanitize_object_data()
    {
        $sanitize = [];
        foreach ($this->object_data() as $key => $value) {
            $sanitize[$key] = self::$database->escape_string($value);
        }
        return $sanitize;
    }

    public function merge_object_data($args = [])
    {
        foreach ($args as $key => $value) {
            if (property_exists($this, $key) && !is_null($value)) {
                $this->$key = $value; // Updates the object property
            }
        }
    }

    static protected function instantiate($record)
    {
        $object = new static;
        foreach ($record as $property => $value) {
            if (property_exists($object, $property)) {
                $object->$property = $value;
            }
        }
        return $object;
    }



    static public function find_by_query_command($query_command)
    {
        $result = self::$database->query($query_command);
        if (!$result) {
            exit("Database query failed");
        }

        $object_array = [];
        while ($record = $result->fetch_assoc()) {
            $object_array[] = static::instantiate($record);
        }
        $result->free();
        return $object_array;
    }

    public function create()
    {
        // Get sanitized object data for insertion
        $object_data = $this->sanitize_object_data_for_insert();
        if (isset($this->image)) {
            $object_data['image'] = $this->image;
        }
        $query_command = "INSERT INTO " . static::$table_name . " (";
        $query_command .= join(', ', array_keys($object_data));
        $query_command .= ") VALUES ('";
        $query_command .= join("', '", array_values($object_data));
        $query_command .= "')";
        $result = self::$database->query($query_command);
        if ($result) {
            $this->id = self::$database->insert_id;
        }
        return $result;
    }


    public function update()
    {
        $object_data = $this->sanitize_object_data();
        $object_update = [];
        foreach ($object_data as $key => $value) {
            $object_update[] = "{$key}='{$value}'";
        }

        $query_command = "UPDATE " . static::$table_name . " SET ";
        $query_command .= join(', ', $object_update);
        $query_command .= " WHERE id='" . self::$database->escape_string($this->id) . "' ";
        $query_command .= "LIMIT 1";
        $result = self::$database->query($query_command);
        return $result;
    }

    public function delete()
    {
        $query_command = "DELETE FROM '" . static::$table_name . "' ";
        $query_command .= "WHERE id = '" . self::$database->escape_string($this->id) . "'";
        $query_command .= " LIMIT 1 ";

        $result = self::$database->query($query_command);
        return $result;
    }

    static public function find_by_id($id)
    {
        $query_command = "SELECT * FROM " . static::$table_name . " ";
        $query_command .= "WHERE id = '" . self::$database->escape_string($id) . "' ";
        $obj_array = static::find_by_query_command($query_command);
        if (!empty($obj_array)) {
            return array_shift($obj_array);
        } else {
            return false;
        }
    }

    static public function find_all()
    {
        $query_command = "SELECT * FROM " . static::$table_name . " ";
        return static::find_by_query_command($query_command);
    }

    public function uniqid_code_for_reference($length = 10)
    {
        // Generate an MD5 hash and shuffle the characters
        return substr(str_shuffle(md5(uniqid(mt_rand(), true))), 0, $length);
    }

    public function uniqid_code_for_id($length = 7)
    {
        $numbers = '0123456789';
        $code = '';
        for ($i = 0; $i < $length; $i++) {
            $code .= $numbers[random_int(0, strlen($numbers) - 1)];
        }
        return $code;
    }
}
