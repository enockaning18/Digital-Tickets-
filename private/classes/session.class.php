<?php

class Session
{
    private $organizer_id;
    public $organizer_name;
    public $token;


    public function __construct()
    {
        session_start();
        $this->check_stored_login();
    }

    public function login($organizer)
    {
        if ($organizer) {
            session_regenerate_id();
            $this->organizer_id = $_SESSION['id'] = $organizer->id;
            $this->organizer_name = $_SESSION['organizer_name'] = $organizer->organizer_name;
            $this->token = $_SESSION['user_token'] = $organizer->token;
        }
        return true;
    }

    public function is_logged_in()
    {
        return isset($this->organizer_id) || isset($this->token);
    }

    public function logout()
    {
        unset($_SESSION['id']);
        unset($_SESSION['organizer_name']);
        unset($_SESSION['user_token']);
        unset($this->organizer_id);
        unset($this->organizer_name);
        unset($this->token);
        return true;
    }

    private function check_stored_login()
    {
        if (isset($_SESSION['id'])) {
            $this->organizer_id = $_SESSION['id'];
            $this->organizer_name = $_SESSION['organizer_name'];
        }
        if (isset($_SESSION['user_token'])) {
            $this->token = $_SESSION['user_token'];
        }
    }
}
