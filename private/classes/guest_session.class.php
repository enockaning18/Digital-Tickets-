<?php

class Guest_Session
{
    public $guest_id;
    public $guest_name;

    public function __construct()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        $this->check_stored_login();
    }

    public function login($guest)
    {
        if ($guest) {
            session_regenerate_id();
            $this->guest_id = $_SESSION['guest_id'] = $guest->id ?? null;
            $this->guest_name = $_SESSION['guest_name'] = $guest->guest_name ?? null;
        }
        return true;
    }

    public function is_logged_in()
    {
        // Check if the session belongs to an attendee
        return isset($_SESSION['guest_id']);
    }

    public function logout()
    {
        unset($_SESSION['guest_id']);
        unset($_SESSION['guest_name']);
        unset($this->guest_id);
        unset($this->guest_name);
        return true;
    }

    private function check_stored_login()
    {
        if (isset($_SESSION['guest_id'])) {
            $this->guest_id = $_SESSION['guest_id'];
            $this->guest_name = $_SESSION['guest_name'] ?? null;
        }
    }
}
