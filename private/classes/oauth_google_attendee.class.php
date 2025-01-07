

<?php

class oauth_google_attendee extends oauth_google_organizer
{

    static protected $database;
    static protected $table_name = 'oauth_google_attendee';
    static protected $table_column = ['id', 'email', 'first_name', 'last_name', 'full_name', 'picture', 'verifiedEmail', 'token'];
    public $errors = [];


    public function __construct($args = [])
    {
        $this->id = $this->uniqid_code_for_id() ?? '';
        $this->email = $args['email'] ?? '';
        $this->first_name = $args['first_name'] ?? '';
        $this->last_name = $args['last_name'] ?? '';
        $this->full_name = $args['full_name'] ?? '';
        $this->picture = $args['picture'] ?? '';
        $this->verifiedEmail = $args['verifiedEmail'] ?? '';
        $this->token = $args['token'] ?? '';
    }

    public $id;
    public $email;
    public $last_name;
    public $first_name;
    public $full_name;
    public $picture;
    public $verifiedEmail;
    public $token;
}
