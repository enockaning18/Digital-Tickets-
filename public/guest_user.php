<?php
require_once('../private/initialize.php');
$ticket_id = $_POST['ticket_id'] ?? $_GET['ticket_id'] ?? null;
$args = [];
$Guest_User = new Guest_User($args);
$result = $Guest_User->create_guest();

if ($result && isset($Guest_User->id)) {
    // $attendee_session->login($result);
    $_SESSION['attendee_id'] = $Guest_User->id;
    $_SESSION['attendee_name'] = $Guest_User->attendee_name;

    header("Location: cart_action.php?attendee_id=" . $Guest_User->id . "&ticket_id=" . $ticket_id);
    exit();
} else {
    echo "<p>Error creating guest user. Please try again later.</p>";
}
