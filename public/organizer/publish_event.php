<?php include("../../private/initialize.php");
$event_reference_id = $_GET['event_reference_id'] ?? 'null';

$event = Event::find_by_reference_id($event_reference_id);
if ($event->status != '0') {
    $query_command = "UPDATE `event` SET ";
    $query_command .= " status = '" . 1 . "' ";
    $query_command .= " WHERE event_reference_id= '" . $event_reference_id . "' ";
    $query_command .= "LIMIT 1";
    $result = $database->query($query_command);

    if ($result) {
        header('Location:my_event.php');
    }
}
