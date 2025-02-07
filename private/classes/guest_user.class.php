<?php

class Guest_User extends databaseObject
{
    static protected $database;
    static protected $table_name = 'attendee';
    static protected $table_column = ['id', 'email', 'attendee_username', 'attendee_name', 'attendee_phone', 'password'];

    public function __construct($args = [])
    {
        // Generate a unique identifier
        $uniqueCode = $this->generate_unique_code();

        // Set default values or values from the provided arguments
        $this->id = $this->uniqid_code_for_guest_id();
        $this->email = $args['email'] ?? $uniqueCode . '@guest.teamevent.com';
        $this->attendee_username = $args['guest_username'] ?? 'GUEST-' . $uniqueCode;
        $this->attendee_name = $args['guest_username'] ?? 'GUEST-' . $uniqueCode;
        $this->attendee_phone = $args['guest_phone'] ?? '';
        $this->password = $args['password'] ?? '';
    }

    public function create_guest()
    {
        $this->set_hashed_password();
        return parent::create();
    }


    public function uniqid_code_for_guest_id($length = 7)
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

    private function generate_unique_code($length = 6)
    {
        $characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
        $code = '';
        for ($i = 0; $i < $length; $i++) {
            $code .= $characters[random_int(0, strlen($characters) - 1)];
        }
        return $code;
    }

    public $id;
    public $email;
    public $attendee_username;
    public $attendee_name;
    public $attendee_phone;
    public $password;
    public $attendee_hashed_password;
}
