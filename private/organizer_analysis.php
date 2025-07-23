<?php
require_once('initialize.php');

// 1. Count publish Events
$query = "SELECT COUNT(*) FROM `event` WHERE status = 1";
$stmt = $database->prepare($query);

if ($stmt) {
    $stmt->execute();
    $stmt->bind_result($fetch_publish_events);
    $stmt->fetch();
    $stmt->close(); // Always close the statement
} else {
    $fetch_events = 0; // Fallback in case of error
}



// 2. Count publish Events
$query = "SELECT COUNT(*) FROM `event` WHERE status = 0";
$stmt = $database->prepare($query);

if ($stmt) {
    $stmt->execute();
    $stmt->bind_result($fetch_draft_events);
    $stmt->fetch();
    $stmt->close(); // Always close the statement
} else {
    $fetch_events = 0; // Fallback in case of error
}

// 3. Count all Events
$query = "SELECT COUNT(*) FROM `event` ";
$stmt = $database->prepare($query);

if ($stmt) {
    $stmt->execute();
    $stmt->bind_result($fetch_all_events);
    $stmt->fetch();
    $stmt->close(); // Always close the statement
} else {
    $fetch_events = 0; // Fallback in case of error
}

// 4. Count all attendees orders places
$query = " SELECT SUM(quantity) AS quantity   FROM `attendee_orders` WHERE reference != 'NULL' AND ticket_id != 'NULL' "; 
$stmt = $database->prepare($query);

if ($stmt) {
    $stmt->execute();
    $stmt->bind_result($fetch_all_orders);
    $stmt->fetch();
    $stmt->close(); // Always close the statement
} else {
    $fetch_events = 0; // Fallback in case of error
}

// 5. Count all attendees payed orders 
$query =" SELECT SUM(quantity) AS payed_ticket FROM `ticket_payments` JOIN attendee_orders ON ticket_payments.reference = attendee_orders.reference WHERE attendee_orders.reference != 'NULL' AND ticket_id != 'NULL' AND ticket_payments.transaction_status = 'success' "; 
$stmt = $database->prepare($query);

if ($stmt) {
    $stmt->execute();
    $stmt->bind_result($fetch_payed_ticket);
    $stmt->fetch();
    $stmt->close(); // Always close the statement
} else {
    $fetch_events = 0; // Fallback in case of error
}

// 2. Count draft Events
$query = "SELECT COUNT(*) FROM `event` WHERE status = 0";
$stmt = $database->prepare($query);

if ($stmt) {
    $stmt->execute();
    $stmt->bind_result($fetch_draft_events);
    $stmt->fetch();
    $stmt->close(); // Always close the statement
} else {
    $fetch_events = 0; // Fallback in case of error
}
