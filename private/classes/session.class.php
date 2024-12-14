<?php

class Session
{
    private $organizer_id;


    public function __construct()
    {
        session_start();
        $this->check_stored_login();
    }

    public function login($organizer)
    {
        if ($organizer) {
            session_regenerate_id();
            $_SESSION['id'] = $organizer->id;
            $this->organizer_id = $organizer->id;
        }
        return true;
    }

    public function is_logged_in()
    {
        return isset($this->organizer_id);
    }

    public function logout()
    {
        unset($_SESSION['id']);
        unset($this->organizer_id);
        return true;
    }

    private function check_stored_login()
    {
        if (isset($_SESSION['id'])) {
            $this->organizer_id = $_SESSION['id'];
        }
    }
}
