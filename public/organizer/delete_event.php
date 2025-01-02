<?php
include("../../private/initialize.php");
file_put_contents('debug_log.txt', "Execution log:\n", FILE_APPEND);


header('Content-Type: application/json');

$data = json_decode(file_get_contents("php://input"), true);
file_put_contents('debug_log.txt', "Input Data: " . print_r($data, true), FILE_APPEND);

if (isset($data['event_reference_id'])) {
    $event_reference_id = $data['event_reference_id'];

    $query_command = "DELETE FROM `event` WHERE event_reference_id = ? LIMIT 1";
    $stmt = $database->prepare($query_command);

    if ($stmt) {
        $stmt->bind_param('s', $event_reference_id);
        $stmt->execute();

        if ($stmt->affected_rows > 0) {
            echo json_encode(['success' => true]);
            die();
        } else {
            file_put_contents('debug_log.txt', "No rows affected\n", FILE_APPEND);
            echo json_encode(['success' => false, 'error' => 'No rows were affected.']);
            die();
        }
    } else {
        file_put_contents('debug_log.txt', "Query preparation failed: " . $database->error . "\n", FILE_APPEND);
        echo json_encode(['success' => false, 'error' => 'Query preparation failed.']);
        die();
    }
} else {
    file_put_contents('debug_log.txt', "Invalid event ID received.\n", FILE_APPEND);
    echo json_encode(['success' => false, 'error' => 'Invalid event ID.']);
    die();
}
