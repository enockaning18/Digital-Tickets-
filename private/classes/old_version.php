<?php
class databaseObject
{
    static protected $database;
    static protected $table_name = '';
    static protected $table_columns = [];
    static protected $error = [];

    static public function set_database($database)
    {
        self::$database = $database;
    }


    static public function find_by_query_command($query_command)
    {
        $result = self::$database->query($query_command);
        if (!$result) {
            exit("Database query failed.");
        }

        // results into objects
        $object_array = [];
        while ($record = $result->fetch_assoc()) {
            $object_array[] = static::instantiate($record);
        }

        $result->free();

        return $object_array;
    }

    static public function find_all()
    {
        $query_command = "SELECT * FROM " . static::$table_name . " ";
        return static::find_by_query_command($query_command);
    }

    static public function find_by_id($attendee_id)
    {
        $query_command = "SELECT * FROM "  . static::$table_name . " ";
        $query_command .= "WHERE attendee_id ='" . self::$database->escape_string($attendee_id) . "'";
        $obj_array = static::find_by_query_command($query_command);
        if (!empty($obj_array)) {
            return array_shift($obj_array);
        } else {
            return false;
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



    public function create()
    {
       
        $attendee_data = $this->sanitized_attendee_data();
        $query_command = "INSERT INTO " . static::$table_name . " (";
        $query_command .= join(', ', array_keys($attendee_data));
        $query_command .= ") VALUES ('";
        $query_command .= join("' , '", array_values($attendee_data));
        $query_command .= "')";
        $result = self::$database->query($query_command);
        if ($result) {
            $this->attendee_id = self::$database->insert_id;
        }
        return $result;
    }

    public function merge_attendee_data($args = [])
    {
        foreach ($args as $key => $value) {
            if (property_exists($this, $key) && !is_null($value)) {
                $this->$key = $value;
            }
        }
    }

    public function update()
    {
        $attendee_data = $this->sanitized_attendee_data();
        $attendee_update = [];
        foreach ($attendee_data as $key => $value) {
            $attendee_update[] = "{$key} = '{$value}' ";
        }

        $query_command = "UPDATE " . static::$table_name . " SET ";
        $query_command .= join(', ', $attendee_update);
        $query_command .= " WHERE attendee_id = '" . self::$database->escape_string($this->attendee_id) . "' ";
        $query_command .= " LIMIT 1 ";

        $result = self::$database->query($query_command);
        return $result;
    }

    public function delete()
    {
        $query_command = "DELETE FROM " . static::$table_name . " ";
        $query_command .= " WHERE attendee_id = '" . self::$database->escape_string($this->attendee_id) . "' ";
        $query_command .= " LIMIT 1 ";

        $result = self::$database->query($query_command);
        return $result;
    }

    // properties which have database columns 
    public function attendee_data()
    {
        $attendee_data = [];
        foreach (static::$table_columns as $column) {
            if ($column == 'attendee_id') {
                continue;
            }
            $attendee_data[$column] = $this->$column;
        }
        return $attendee_data;
    }

    protected function sanitized_attendee_data()
    {
        $sanitized = [];
        foreach ($this->attendee_data() as $key => $value) {
            $sanitized[$key] = self::$database->escape_string($value);
        }

        return $sanitized;
    }
}
