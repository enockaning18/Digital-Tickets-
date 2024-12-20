<?php require_once('../private/initialize.php');
require_once('../private/shared/index_header.php');
$event = Event::find_all();

?>
<!-- Hero Section -->
<div class="hero-section text-center" style=" padding: 50px 20px;">
    <h1 style="font-size: 3rem; color: #333; margin-bottom: 20px;">
        Welcome to Ghana's Premier Event Hub
    </h1>
    <p style="font-size: 1.25rem; color: #555; max-width: 700px; margin: 0 auto;">
        Discover and secure tickets for the most exciting events happening across Ghana.
        From concerts to workshops, we’ve got something for everyone!
    </p>
    <a href="discover.php" class="btn btn-primary mt-4" style="font-size: 1rem; padding: 10px 20px; color: #fff;">
        Discover Events
    </a>
</div>

<section class="mt-5 m-0">
    <div class="d-flex flex-column text-center justify-content-center">
        <h2 class="fs-md-1">Upcoming Event</h2>
        <p>Don't Miss These Exciting Events In Ghana </p>
    </div>

    <div class="my-5 f-flex align-items-center mx-auto">
        <ul class="row d-flex justify-content-around gap-1 align-items-center p-0">
            <?php foreach ($event as $event) { ?>
                <li class="card col-10 col-sm-5 col-md-5 col-lg-3 mb-4 p-0 border border-1 ">
                    <div>
                        <div class="card-image rounded-top" style="background-image: url('organizer/uploads/<?php echo $event->image ?>'); background-size: contain; background-position: center center;     background-repeat: no-repeat; height:14rem; background-size: cover; background-position: center;"></div>
                        <div class="card-body">
                            <h5 class="card-title">Program: <?php echo $event->event_name ?></h5>
                            <p class="card-text mb-0">Location: <?php echo $event->event_venue ?></p>
                            <p class="card-text mb-0">Time: <?php echo $event->event_date_time_start ?></p>
                            <p class="card-text ">Price: GHC <?php echo $event->ticket_price ?>.00</p>
                            <?php
                            $event_name_slug = slugify($event->event_name);
                            ?>
                            <a href="view_event.php?event=<?php echo urlencode($event_name_slug) ?>&event_reference_id=<?php echo $event->event_reference_id ?>" class="btn btn-primary col-12">Buy Ticket</a>

                        </div>
                    </div>
                </li>
            <?php } ?>
        </ul>

    </div>
</section>
</div>
</container>


</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</html>