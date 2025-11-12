<?php

class Session
{
    private $organizer_id;
    public $organizer_name;
    public $organizer_token;

    public function __construct()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        $this->check_stored_login();
        
    }

    public function login($organizer)
    {
        if ($organizer) {
            session_regenerate_id();
            $this->organizer_id = $_SESSION['id'] = $organizer->id ?? null;
            $this->organizer_name = $_SESSION['organizer_name'] = $organizer->organizer_name ?? null;
            $this->organizer_token = $_SESSION['organizer_token'] = $organizer->organizer_token ?? null;
        }
        return true;
    }

    public function is_logged_in()
    {
        // Check if the session belongs to an organizer
        return isset($_SESSION['id']) || isset($_SESSION['organizer_token']);
    }

    public function logout()
    {
        unset($_SESSION['id']);
        unset($_SESSION['organizer_name']);
        unset($_SESSION['organizer_token']);
        unset($this->organizer_id);
        unset($this->organizer_name);
        unset($this->organizer_token);
        return true;
    }

    private function check_stored_login()
    {
        if (isset($_SESSION['id'])) {
            $this->organizer_id = $_SESSION['id'];
            $this->organizer_name = $_SESSION['organizer_name'] ?? null;
        }
        if (isset($_SESSION['organizer_token'])) {
            $this->organizer_token = $_SESSION['organizer_token'];
        }
    }
}
