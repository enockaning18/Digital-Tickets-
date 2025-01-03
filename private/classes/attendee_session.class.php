
<?php

class Attendee_Session extends Session
{
    public $attendee_id;
    public $attendee_name;
    public $token;




    public function login($attendee)
    {
        if ($attendee) {
            session_regenerate_id();
            $this->attendee_id = $_SESSION['id'] = $attendee->id;
            $this->attendee_name = $_SESSION['attendee_name'] = $attendee->attendee_name;
            $this->token = $_SESSION['user_token'] = $attendee->token;
        }
        return true;
    }

    public function is_logged_in()
    {
        return isset($this->attendee_id) || isset($this->token);
    }

    public function logout()
    {
        unset($_SESSION['id']);
        unset($_SESSION['attendee_name']);
        unset($_SESSION['user_token']);
        unset($this->attendee_id);
        unset($this->attendee_name);
        unset($this->token);
        return true;
    }

    public function __construct()
    {
        $this->check_stored_login();
    }

    private function check_stored_login()
    {
        if (isset($_SESSION['id'])) {
            $this->attendee_id = $_SESSION['id'] ?? '';
            $this->attendee_name = $_SESSION['attendee_name'] ?? '';
        }
        if (isset($_SESSION['user_token'])) {
            $this->token = $_SESSION['user_token']?? '';
        }
    }
}
