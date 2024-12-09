<?php include("../../private/initialize.php");

ob_start();
header("Content-Type: application/json");

$id = $_GET['id'] ?? null;
if ($id) {
    $event = Event::find_by_id($id);
    if ($event) {
        echo json_encode([
            "event_name" => $event->event_name ?? "No name provided",
            "description" => $event->description ?? "No description provided",
            "image" => $event->image ?? null
        ]);
    } else {
        http_response_code(404);
        echo json_encode(["error" => "Event not found"]);
    }
} else {
    http_response_code(400);
    echo json_encode(["error" => "Invalid request. Missing 'id'."]);
}
ob_end_flush(); // Flush the output buffer
