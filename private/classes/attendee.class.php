<?php

class Attendee extends databaseObject
{

    static protected $database;
    static protected $table_name = 'attendee';
    static protected $table_column = ['id', 'email', 'attendee_username', 'attendee_name', 'attendee_phone', 'password'];


    public function __construct($args = [])
    {
        $this->id = $this->uniqid_code_for_attendee_id();
        $this->email = $args['email'] ?? '';
        $this->attendee_username = $args['attendee_username'] ?? '';
        $this->attendee_name = $args['attendee_name'] ?? '';
        $this->attendee_phone = $args['attendee_phone'] ?? '';
        $this->password = $args['password'] ?? '';
    }

    public function create_attendee()
    {
        $this->set_hashed_password();
        return parent::create();
    }

    static public function find_by_attendee_email($email)
    {
        $query_command = "SELECT * FROM " . static::$table_name . " ";
        $query_command .= "WHERE email = '" . $email . "' ";
        $obj_array = static::find_by_query_command($query_command);
        if (!empty($obj_array)) {
            return array_shift($obj_array);
        } else {
            return false;
        }
    }

    static public function find_purchased_ticket($attendee_id)
    {
        $query_command = " SELECT * FROM attendee_orders ";
        $query_command .= " JOIN `event` ON attendee_orders.ticket_id = event.id ";
        $query_command .= " JOIN `attendee` ON attendee_orders.attendee_id = attendee.id ";
        $query_command .= " WHERE attendee_orders.attendee_id = '" . $attendee_id . "'";
        return static::find_by_query_command($query_command);
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
        $this->attendee_hashed_password = password_hash($this->password, PASSWORD_BCRYPT);
    }
    public function verify_password($password)
    {
        return password_verify($password, $this->password);
    }



    public $id;
    public $email;
    public $attendee_username;
    public $attendee_name;
    public $attendee_phone;
    public $password;
    public $attendee_hashed_password;
}
