<?php

class Attendee extends databaseObject
{

    static protected $database;
    static protected $table_name = 'attendee';
    static protected $table_column = ['id', 'attendee_email', 'attendee_username', 'attendee_name', 'attendee_phone', 'attendee_password'];


    public function __construct($args = [])
    {
        $this->id = $this->uniqid_code_for_attendee_id();
        $this->attendee_email = $args['attendee_email'] ?? '';
        $this->attendee_username = $args['attendee_username'] ?? '';
        $this->attendee_name = $args['attendee_name'] ?? '';
        $this->attendee_phone = $args['attendee_phone'] ?? '';
        $this->attendee_password = $args['attendee_password'] ?? '';
    }

    public function create_attendee()
    {
        $this->set_hashed_password();
        return parent::create();
    }

    static public function find_by_attendee_email($email)
    {
        $query_command = "SELECT * FROM " . static::$table_name . " ";
        $query_command .= "WHERE attendee_email = '" . $email . "' ";
        $obj_array = static::find_by_query_command($query_command);
        if (!empty($obj_array)) {
            return array_shift($obj_array);
        } else {
            return false;
        }
    }


    public function uniqid_code_for_attendee_id($length = 7)
    {
        $numbers = '0123456789';
        $code = '';
        for ($i = 0; $i < $length; $i++) {
            $code .= $numbers[random_int(0, strlen($numbers) - 1)];
        }
        return $code;
    }

    protected function set_hashed_password()
    {
        $this->attendee_hashed_password = password_hash($this->attendee_password, PASSWORD_BCRYPT);
    }
    public function verify_password($password)
    {
        return password_verify($password, $this->attendee_password);
    }

    public $id;
    public $attendee_email;
    public $attendee_username;
    public $attendee_name;
    public $attendee_phone;
    public $attendee_password;
    public $attendee_hashed_password;
}
