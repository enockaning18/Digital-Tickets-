<?php
require_once('../initialize.php');

$keyword = $_GET['keyword'] ?? '';
$category = $_GET['category'] ?? '';
$startdate = $_GET['startdate'] ?? '';
$freeonly = $_GET['freeonly'] ?? '';

$conditions = ["status = '1'"];

if (!empty($keyword)) {
    $keyword = mysqli_real_escape_string($database, $keyword);
    $conditions[] = "event_name LIKE '%$keyword%'";
}

if (!empty($category)) {
    $conditions[] = "event_category = '$category'";
}

if ($freeonly == "1") {
    $conditions[] = "ticket_price = 0";
}

if ($startdate === 'today') {
    $conditions[] = "DATE(event_date_time_start) = CURDATE()";
}

$where_clause = 'WHERE ' . implode(' AND ', $conditions);
$query = "SELECT * FROM event $where_clause ORDER BY event_date_time_start DESC";
$result = $database->execute_query($query);

while ($event = mysqli_fetch_assoc($result)) {
    ?>
    <div class="col-12 col-sm-6 col-lg-6 mb-3">
    
        <div class="card-event shadow-sm">
            <div class="event-image" style="background-image: url('/event/organizer/uploads/<?php echo $event['image'] ?>');">
                <div class="date-badge"><?php echo $event['event_date_time_start'] ?></div>
            </div>
            <div class="info-wrap">
                <h5 class="text-truncate"><?php echo $event['event_name'] ?></h5>
                <div class="venue text-muted mb-1"><?php echo $event['event_venue'] ?></div>
                <div class="badge-price">₵<?php echo $event['ticket_price'] ?></div>
            </div>
        </div>
    </div>
<?php } ?>
