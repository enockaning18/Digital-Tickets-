<?php 

class Attendee_Session
{
    public $attendee_id;
    public $attendee_name;
    public $token;

    public function __construct()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        $this->check_stored_login();
    }

    public function login($attendee)
    {
        if ($attendee) {
            session_regenerate_id();
            $this->attendee_id = $_SESSION['attendee_id'] = $attendee->id ?? null;
            $this->attendee_name = $_SESSION['attendee_name'] = $attendee->attendee_name ?? null;
            $this->token = $_SESSION['attendee_token'] = $attendee->token ?? null;
        }
        return true;
    }

    public function is_logged_in()
    {
        // Check if the session belongs to an attendee
        return isset($_SESSION['attendee_id']) || isset($_SESSION['attendee_token']);
    }

    public function logout()
    {
        unset($_SESSION['attendee_id']);
        unset($_SESSION['attendee_name']);
        unset($_SESSION['attendee_token']);
        unset($this->attendee_id);
        unset($this->attendee_name);
        unset($this->token);
        return true;
    }

    private function check_stored_login()
    {
        if (isset($_SESSION['attendee_id'])) {
            $this->attendee_id = $_SESSION['attendee_id'];
            $this->attendee_name = $_SESSION['attendee_name'] ?? null;
        }
        if (isset($_SESSION['attendee_token'])) {
            $this->token = $_SESSION['attendee_token'];
        }
    }
}
