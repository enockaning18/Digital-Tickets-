<?php
require_once('../private/initialize.php');

// Log out the admin
$session->logout();
$attendee_session->logout();
$guest_session->logout();
unset($_SESSION['cart']);


header('Location:index.php');
