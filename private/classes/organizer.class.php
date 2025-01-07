
<?php

class Organizer extends databaseObject
{

    static protected $database;
    static protected $table_name = 'organizer';
    static protected $table_column = ['id','organizer_reference_id', 'organizer_phone', 'organizer_name', 'email', 'password'];
    public $errors = [];


    public function __construct($args = [])
    {
        $this->id = $this->uniqid_code_for_id() ?? '';
        $this->organizer_reference_id = $this->uniqid_code_for_reference() ?? '';
        $this->organizer_phone = $args['organizer_phone'] ?? '';
        $this->organizer_name = $args['organizer_name'] ?? '';
        $this->email = $args['email'] ?? '';
        $this->organizer_hashed_password = $args['password'] ?? '';
    }

    public function create()
    {
        $this->set_hashed_password();
        return parent::create();
    }

    protected function set_hashed_password()
    {
        $this->password = password_hash($this->organizer_hashed_password, PASSWORD_BCRYPT);
    }




    static public function find_by_organizer_email($email)
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


    public function verify_password($password)
    {
        return password_verify($password, $this->password);
    }


    protected function validate() 
    {
        $this->errors = [];
        if (!has_unique_username($args['organizer_email'] ?? 0)) {
            $errors[] = "Email already exist";
        }

        if (empty($args['organizer_phone'])) {
            $errors[] = "Phone Number can't be empty";
        }
        if (empty($args['organizer_name'])) {
            $errors[] = "Name can't be empty";
        }
        if (empty($args['organizer_email'])) {
            $errors[] = "Email can't be empty";
        }
        if (empty($args['organizer_password'])) {
            $errors[] = "Password can't be empty";
        }
    }

    public $id;
    public $organizer_phone;
    public $organizer_name;
    public $email;
    public $password;
    public $organizer_hashed_password;
    public $organizer_reference_id;
}
