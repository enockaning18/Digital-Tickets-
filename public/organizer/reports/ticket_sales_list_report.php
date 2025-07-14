<?php
$organizer_id = $_SESSION['id'] ?? $_SESSION['user_token'];
$query_command = "SELECT
event.image,
event.event_name,
attendee_orders.quantity,
event.ticket_name,
ticket_payments.reference,
attendee_orders.created_at,
ticket_payments.email,
ticket_payments.amount,
event.event_reference_id
FROM attendee_orders
INNER JOIN attendee ON attendee_orders.attendee_id = attendee.id
INNER JOIN event ON attendee_orders.ticket_id = event.id
INNER JOIN ticket_payments ON attendee_orders.reference = ticket_payments.reference
WHERE event.organizer_id = '" . $organizer_id . "'";

// Apply additional filters if set
if (!empty($event_reference_id)) {
    $query_command .= " AND event.event_reference_id = '" . $event_reference_id . "'";
}
if (!empty($reference)) {
    $query_command .= " AND ticket_payments.reference = '" . $reference . "'";
}
if (!empty($start_date) && !empty($end_date) ) {
    $query_command .= " AND DATE(attendee_orders.created_at) BETWEEN '$start_date' AND '$end_date'";
}

if (!empty($order)) {
    $query_command .= " ORDER BY event.id $order ";
}

// Execute the query
$result = $database->execute_query($query_command);

?>

<div class="table-responsive text-nowrap">
    <table class="table table-hover table-wrapper" id="studentTable">
        <thead>
            <tr>
                <th>Attendee</th>
                <th>Email</th>
                <th>Reference</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Purchased Date</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Check if results exist
            if (mysqli_num_rows($result) > 0) {
                while ($fetch_order_result = mysqli_fetch_assoc($result)) {
            ?>
                    <tr>
                        <td>
                            <div class="d-flex justify-content-start align-items-center user-name gap-1">
                                <div class="avatar-wrapper">
                                    <div class="avatar "> <img src="uploads/<?php echo $fetch_order_result['image']; ?>" alt="Avatar" class="rounded-circle" style="width: 50px; height: 50px;"></div>
                                </div>
                                <div class="d-flex flex-column ">
                                    <span class="emp_name text-truncate "><?php echo $fetch_order_result['event_name']  ?></span>
                                    <span class="emp_post text-truncate" style="font-size: 13px;">(<?php echo $fetch_order_result['ticket_name'] ?>)</span>
                                </div>
                            </div>
                        </td>

                        <td>
                            <div class="flex-row align-items-center ms-auto ">
                                <span class="fw-medium"> <?php echo $fetch_order_result['email']; ?></span>
                            </div>
                        </td>
                        <td>
                            <div class="flex-row align-items-center ms-auto ">
                                <span class="fw-medium"> <?php echo $fetch_order_result['reference']; ?></span>
                            </div>
                        </td>
                        <td>
                            <div class="flex-row align-items-center ms-auto ">
                                <span class="fw-medium"> <?php echo $fetch_order_result['quantity']; ?></span>
                            </div>
                        </td>
                        <td>
                            <div class="flex-row align-items-center ms-auto ">
                                <span class="fw-medium"> GHS <?php echo number_format($fetch_order_result['amount'], 2); ?></span>
                            </div>
                        </td>
                        <td>
                            <div class="flex-row align-items-center ms-auto ">
                                <span class="fw-medium"> <?php echo date("d M Y, H:i A", strtotime($fetch_order_result['created_at'])); ?></span>
                            </div>
                        </td>
                    </tr>
            <?php
                }
            } else {
                echo "<tr><td colspan='7' class='text-center'>No results found</td></tr>";
            }
            ?>
        </tbody>
    </table>
</div>