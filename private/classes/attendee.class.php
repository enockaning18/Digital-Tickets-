<?php

use LDAP\Result;

class Attendee
{
    // --- active record code
    static protected $database;

    static protected $attendee_columns = ['email', 'username', 'name', 'phone', 'password', 'birthdate'];

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
        $query_command .= "WHERE attendee_id ='" . self::$database->escape_string($attendee_id) . "'";
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

    public $error = [];

    protected function validate(){
        $this->error =[];
        if(is_blank($this->email)){
            $this->error[]= "Email cannot be blank";
        }
        if(is_blank($this->name)){
            $this->error[] = "Name cannot be blank";
        }

        return $this->error;
    }

    public function create()
    {
        $this->validate();
        if(!empty($this->error)){return false;}

        $attendee_data = $this->sanitized_attendee_data();
        $query_command = "INSERT INTO attendee (";
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

    public function merge_attendee_data($args=[]){
        foreach($args as $key => $value){
            if(property_exists($this, $key) && !is_null($value)){
                $this->$key = $value;
            }
        }
    }

    public function update(){
        $attendee_data = $this->sanitized_attendee_data();
        $attendee_update =[];
        foreach($attendee_data as $key => $value){
            $attendee_update[] = "{$key} = '{$value}' ";
        }

        $query_command = "UPDATE attendee SET ";
        $query_command .= join(', ', $attendee_update);
        $query_command .= " WHERE attendee_id = '" . self::$database->escape_string($this->attendee_id). "' ";
        $query_command .= " LIMIT 1 ";

        $result = self::$database->query($query_command);
        return $result;
    }

    public function delete(){
        $query_command = "DELETE FROM attendee ";
        $query_command .= " WHERE attendee_id = '" . self::$database->escape_string($this->attendee_id). "' ";
        $query_command .= " LIMIT 1 ";

        $result = self::$database->query($query_command);
        return $result;
    }

    // properties which have database columns 
    public function attendee_data()
    {
        $attendee_data = [];
        foreach (self::$attendee_columns as $column) {
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



    // --- active record code
    public function __construct($args = [])
    {
        $this->email = $args['email'] ?? '';
        $this->username = $args['username'] ?? '';
        $this->name = $args['name'] ?? '';
        $this->phone = $args['phone'] ?? '';
        $this->birthdate = $args['birthdate'] ?? '';
        $this->password = $args['password'] ?? '';
    }


    public $attendee_id;
    public $email;
    public $username;
    public $name;
    public $phone;
    public $birthdate;
    public $password;
}
