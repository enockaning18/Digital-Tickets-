
<?php

class oauth_google_organizer extends databaseObject
{

    static protected $database;
    static protected $table_name = 'oauth_google_users';
    static protected $table_column = ['id', 'email', 'first_name', 'last_name', 'gender', 'full_name', 'picture', 'verifiedEmail', 'token'];
    public $errors = [];


    public function __construct($args = [])
    {
        $this->id = $this->uniqid_code_for_id() ?? '';
        $this->email = $args['email'] ?? '';
        $this->first_name = $args['first_name'] ?? '';
        $this->last_name = $args['last_name'] ?? '';
        $this->gender = $args['gender'] ?? '';
        $this->full_name = $args['full_name'] ?? '';
        $this->picture = $args['picture'] ?? '';
        $this->verifiedEmail = $args['verifiedEmail'] ?? '';
        $this->token = $args['token'] ?? '';
    }

    public $id;
    public $email;
    public $first_name;
    public $last_name;
    public $gender;
    public $full_name;
    public $picture;
    public $verifiedEmail;
    public $token;

    





    // static public function find_by_organizer_email($email)
    // {
    //     $query_command = "SELECT * FROM " . static::$table_name . " ";
    //     $query_command .= "WHERE organizer_email = '" . $email . "' ";
    //     $obj_array = static::find_by_query_command($query_command);
    //     if (!empty($obj_array)) {
    //         return array_shift($obj_array);
    //     } else {
    //         return false;
    //     }
    // }




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
}
