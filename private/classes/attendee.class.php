<?php
class Attendee
{
    // --- active record code
    static protected $database;

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
            $object_array[] = self::instantiate($record);
        }

        $result->free();

        return $object_array;
    }

    static public function find_all()
    {
        $query_command = "SELECT * FROM attendee";
        return self::find_by_query_command($query_command);
    }

    static public function find_by_id($attendee_id)
    {
        $query_command = "SELECT * FROM attendee ";
        $query_command .= "WHERE id='" . self::$database->escape_string($attendee_id) . "'";
        $obj_array = self::find_by_query_command($query_command);
        if (!empty($obj_array)) {
            return array_shift($obj_array);
        } else {
            return false;
        }
    }

    static protected function instantiate($record)
    {
        $object = new self;
        foreach ($record as $property => $value) {
            if (property_exists($object, $property)) {
                $object->$property = $value;
            }
        }
        return $object;
    }

    public function create()
    {
        $query_command = "INSERT INTO attendee (";
        $query_command .= "email, username, name, phone, birthdate";
        $query_command .= ") VALUES (";
        $query_command .= " '" . $this->email . "',";
        $query_command .= " '" . $this->username . "',";
        $query_command .= " '" . $this->name . "',";
        $query_command .= " '" . $this->phone . "',";
        $query_command .= " '" . $this->birthdate . "'";
        $query_command .= ")";
        $result = self::$database->query($query_command);
        if ($result) {
            $this->attendee_id = self::$database->insert_id;
        }
        return $result;
    }



    // --- active record code
    public function __construct($args = [])
    {
        $this->email = $args['email'] ?? '';
        $this->username = $args['username'] ?? '';
        $this->name = $args['name'] ?? '';
        $this->phone = $args['phone'] ?? '';
        $this->birthdate = $args['birthdate'] ?? '';
    }


    public $attendee_id;
    public $email;
    public $username;
    public $name;
    public $phone;
    public $birthdate;
}
