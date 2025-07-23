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
$query = "SELECT * FROM event JOIN `organizer` ON organizer_id  = organizer.id $where_clause ORDER BY event_date_time_start DESC";
$result = $database->execute_query($query);

while ($event = mysqli_fetch_assoc($result)) {
    $event_name_slug = slugify($event['event_name']);
?>
    <div class="col-12 col-sm-6 col-lg-6 mb-3">
        <div class="card-event shadow-sm" onclick="window.location.href='view_event.php?event=<?php echo urlencode($event_name_slug) ?>&event_reference_id=<?php echo $event['event_reference_id'] ?>'" style="cursor: pointer;">

            <div class="position-relative event-image" loading="lazy" style="background-image: url('../public/organizer/uploads/<?php echo $event['image'] ?>');">
                <a href="view_event.php?event=<?php echo urlencode($event_name_slug) ?>&event_reference_id=<?php echo $event['event_reference_id'] ?>" class="stretched-link"></a>
                <div class="date-badge"> <?php echo $event['event_date_time_start'] ?></div>
            </div>

            <div class="info-wrap">
                <!-- EVENT NAME -->
                <h5 class="mb-2 text-truncate" title="<?php echo $event['event_name'] ?>"><?php echo $event['event_name'] ?></h5>

                <!-- Venue -->
                <div class="venue text-muted mb-1">
                    <span class="d-inline-block text-truncate" style="max-width: 100%;" title="<?php echo $event['event_venue'] ?>"><?php echo $event['event_venue'] ?></span>
                </div>

                <div class="organizer text-muted small mb-2">
                    Hosted by <span class="fw-bold"><?php echo $event['organizer_id'] ?></span>
                </div>

                <!-- PRICE & USSD row -->
                <div class="d-flex align-items-center justify-content-between mt-3">
                    <span class="badge-price">GHC <?php echo $event['ticket_price'] ?>.00</span>
                    <a href="tel:*365*88*757#" class="ussd-code" onclick="event.stopPropagation();">*365*88*757#</a>
                </div>

            </div>
        </div>
    </div>
<?php } ?>

<style>
    .card-event {
        width: 340px;
        margin: 1rem auto;
        background-color: #fff;
        border-radius: 1rem;
        overflow: hidden;
        position: relative;
        transition: transform 0.3s, box-shadow 0.3s;
    }

    .card-event:hover {
        transform: translateY(-5px);
        box-shadow: 0 15px 30px rgba(0, 0, 0, 0.15);
    }

    .card-event a.stretched-link {
        position: absolute;
        inset: 0;
        z-index: 1;
        text-decoration: none;
    }

    /* TOP IMAGE */
    .event-image {
        height: 200px;
        background-size: cover;
        background-position: center;
        position: relative;
        border-radius: 1rem 1rem 0 0;
    }

    /* DATE BADGE */
    .date-badge {
        position: absolute;
        top: 0.75rem;
        left: 0.75rem;
        font-size: 0.75rem;
        padding: 0.3rem 0.6rem;
        font-weight: bold;
        backdrop-filter: blur(6px);
        background-color: rgba(0, 0, 0, 0.7);
        color: #fff;
        border-radius: 0.5rem;
        z-index: 2;
    }

    /* INFO WRAP */
    .info-wrap {
        padding: 1rem 1rem 1.5rem;
        position: relative;
        z-index: 2;
    }

    .venue {
        font-size: 0.9rem;
        line-height: 1.2;
        margin-bottom: 0.25rem;
    }

    .venue .text-truncate {
        overflow: hidden;
        white-space: nowrap;
        text-overflow: ellipsis;
    }

    .organizer {
        font-size: 0.85rem;
        color: #6c757d;
    }

    /* BADGES */
    .badge-free {
        background-color: #198754;
        color: #fff;
        padding: 0.3rem 0.6rem;
        font-size: 0.85rem;
        border-radius: 0.4rem;
    }

    .badge-price {
        background: #FD6C5D;
        color: #fff;
        padding: 0.3rem 0.6rem;
        font-size: 0.85rem;
        border-radius: 0.4rem;
    }

    .badge-warning {
        background: #ffc107;
        color: #333;
        padding: 0.3rem 0.6rem;
        font-size: 0.85rem;
        border-radius: 0.4rem;
    }

    .badge-danger {
        background-color: #dc3545;
        color: #fff;
    }

    /* USSD CODE */
    .ussd-code {
        background: #a00b34;
        /* darker than #c3073f */
        color: #fff;
        border-radius: 1rem;
        padding: 0.3rem 0.75rem;
        font-size: 0.8rem;
        white-space: nowrap;
        font-weight: 500;
        text-decoration: none;
    }

    .ussd-code:hover {
        background: #bf0a30;
        color: #fff;
        transition: background-color 0.3s ease;
    }

    /* ORDER REFERENCE */
    .order-reference a {
        font-size: 0.8rem;
        text-decoration: none;
    }

    /* FLEX HELPERS */
    .d-flex {
        display: flex !important;
    }

    .align-items-center {
        align-items: center !important;
    }

    .justify-content-between {
        justify-content: space-between !important;
    }

    .mt-3 {
        margin-top: 1rem !important;
    }

    .text-truncate {
        overflow: hidden;
        white-space: nowrap;
        text-overflow: ellipsis;
    }

    .card-filter label {
        font-size: 0.9rem;
        color: #555;
    }

    .card-filter .form-control,
    .card-filter .form-select {
        border-radius: 0.375rem;
    }

    .card-filter .form-check-label {
        font-weight: 500;
        color: #333;
    }

    .card.bg-light {
        background-color: #f8f9fa !important;
        border-radius: 0.75rem;
    }

    .btn-outline-primary,
    .btn-outline-secondary {
        border-width: 1.5px;
    }

    .text-muted.fs-6 {
        font-size: 1rem;
    }
</style>