
<?php

class oauth_google_organizer extends databaseObject
{

    static protected $database;
    static protected $table_name = 'oauth_google_users';
    static protected $table_column = ['id', 'email', 'first_name', 'last_name', 'organizer_name', 'picture', 'verifiedEmail', 'token'];
    public $errors = [];


    public function __construct($args = [])
    {
        $this->id = $this->uniqid_code_for_id() ?? '';
        $this->email = $args['email'] ?? '';
        $this->first_name = $args['first_name'] ?? '';
        $this->last_name = $args['last_name'] ?? '';
        $this->organizer_name = $args['organizer_name'] ?? '';
        $this->picture = $args['picture'] ?? '';
        $this->verifiedEmail = $args['verifiedEmail'] ?? '';
        $this->token = $args['token'] ?? '';
    }

    public $id;
    public $email;
    public $last_name;
    public $first_name;
    public $organizer_name;
    public $picture;
    public $verifiedEmail;
    public $token;


}
