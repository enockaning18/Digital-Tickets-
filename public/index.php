<?php require_once('../private/initialize.php');
require_once('../private/shared/index_header.php');
$event = Event::find_all();
?>

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
                            <a href="view_ticket.php?id=<?php echo $event->id ?>" class="btn btn-primary col-12">Buy Ticket</a>
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