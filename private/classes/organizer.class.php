
<?php

class Organizer extends databaseObject
{

    static protected $database;
    static protected $table_name = 'organizer';
    static protected $table_column = ['organizer_phone', 'organizer_name', 'organizer_email', 'organizer_password'];
    public $errors = [];


    public function __construct($args = [])
    {
        $this->organizer_phone = $args['organizer_phone'] ?? '';
        $this->organizer_name = $args['organizer_name'] ?? '';
        $this->organizer_email = $args['organizer_email'] ?? '';
        $this->organizer_hashed_password = $args['organizer_password'] ?? '';
    }

    public function create()
    {
        $this->set_hashed_password();
        return parent::create();
    }

    protected function set_hashed_password()
    {
        $this->organizer_password = password_hash($this->organizer_hashed_password, PASSWORD_BCRYPT);
    }

    static public function find_by_organizer_email($organizer_email)
    {
        $query_command = "SELECT * FROM " . static::$table_name . " ";
        $query_command .= "WHERE organizer_email='" . self::$database->escape_string($organizer_email) . "'";
        $obj_array = static::find_by_query_command($query_command);
        if (!empty($obj_array)) {
            return array_shift($obj_array);
        } else {
            return false;
        }
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
    public $organizer_email;
    public $organizer_password;
    public $organizer_hashed_password;
}
