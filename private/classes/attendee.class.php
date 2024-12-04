<!-- <?php

use LDAP\Result;

class Attendee extends databaseObject
{
    
    static protected $database;
    static protected $table_name = 'attendee';
    static protected $table_columns = ['email', 'username', 'name', 'phone', 'password', 'birthdate'];


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
