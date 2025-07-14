<?php
require_once('../private/initialize.php');
require_once('../private/shared/index_header.php');


// Get event ID and slug from URL
$event_reference_id = $_GET['event_reference_id'] ?? null;
$event_slug = $_GET['event_name'] ?? null;

// Fetch the event details using the ID
if ($event_reference_id) {
    $event = Event::find_reference_at_view($event_reference_id); // Fetch event from database

    if ($event) {
        // Generate the correct slug from the event name
        $correct_slug = slugify($event->event_name);

        // Check if the slug in the URL matches the correct slug
        if ($correct_slug !== $event_slug) {
            // Redirect to the correct URL if slugs don't match
            header("Location: view_event.php?event_name=$correct_slug&event_reference_id=$event_reference_id");
            exit();
        }
    } else {
        echo "Event not found.";
        exit();
    }
} else {
    echo "Invalid event ID.";
    exit();
}
?>



<section class="mt-5 m-0 row d-flex justify-content-around ">
    <div class="border col-sm-12 col-lg-5 p-0 rounded shadow rounded">
        <div class="col ">
            <div class="">
                <img src="../public/organizer/uploads/<?php echo $event->image ?>" style="width:100%; " alt="">
            </div>
            <div class="card-body px-3 py-3">
                <h5 class="card-title fs-4 fw-bold">Program: <?php echo $event->event_name ?></h5>
                <div class="mt-3">
                    <p class="text-justify m-0 text-wrap fs-5"><?php echo $event->event_description ?></p>
                </div>
                <div class="py-3 ">
                    <span class="fs-5 fw-bold"> Event Contact</span>
                    <p class="mb-0">Email: <?php echo $event->event_email ?></p>
                    <p>Phone: <?php echo $event->event_contact ?></p>
                </div>
            </div>
        </div>
    </div>

    <div class="border col-sm-12 col-lg-5 d-flex flex-column rounded shadow  p-0">
        <div class="row-3">
            <?php $when = $event->event_date_time_start;
            $split_date = explode(' ', $when);

            if (count($split_date) >= 2) {
                $event_day = $split_date;
            } else {
            }

            $time_end = $event->event_date_time_end;
            $split_date_end = explode(' ', $time_end);

            if (count($split_date_end) >= 2) {
                $event_day_time_end = $split_date_end;
            } else {
            }  ?>

            <h3 class="py-4 px-3 fs-2 fw-bold">When</h3>
            <div class="d-flex flex-column align-items-center">
                <div class="d-flex mx-auto mb-3">
                    <h4 class="mb-0 fw-bolder fs-1"><?php echo $event_day[1] ?></h4>
                    <div class="d-flex flex-column align-items-center my-auto">
                        <div class="fw-bold" style="line-height:normal;"><?php echo $event_day[2] ?></div>
                        <div class="fw-bold" style="line-height:normal;"><?php echo $event_day[3] ?></div>
                    </div>
                </div>

                <div class="mb-3">
                    <span class="" style="letter-spacing: 3px;"><?php echo $event_day[4] . ' ' . $event_day[5] ?> - <?php echo $event_day_time_end[1] ?></span>
                </div>
                <div>
                    <i class="bi bi-calendar2-check " style="color:#C3063F;"></i>
                    <span class="" style="color:#C3063F;">Add to calendar</span>
                </div>
            </div>
            <hr class="mx-auto" style="width: 80%;">
        </div>
        <div class="row-3">
            <h3 class="py-4 px-3 fs-2 fw-bold">Where</h3>
            <div class="d-flex flex-column align-items-center">
                <div class="mb-3">
                    <span class=" fs-3"><?php echo $event->event_venue ?></span>
                </div>
                <div>
                    <i class="bi bi-pin-map " style="color:#C3063F;"></i>
                    <span class="" style="color:#C3063F;">Get Directions</span>
                </div>
            </div>
            <hr class="mx-auto" style="width: 80%;">
        </div>


        <div class="row-3 ">
            <h3 class="py-4 px-3 fs-2 fw-bold">Ticket</h3>
            <div class="d-flex flex-column">
                <div class="d-flex flex-column gap-3 ">

                    <div class="d-flex justify-content-between border rounded mx-3 py-3 px-3" style="background-color: #F1F3F7;">
                        <div class="fs-5"><?php echo $event->ticket_name ?></div>
                        <div class="fs-5">₵<?php echo $event->ticket_price ?></div>
                    </div>

                    <div class="d-flex justify-content-between border rounded mx-3 py-3 px-3" style="background-color: #F1F3F7;">
                        <div class="fs-5">Standard</div>
                        <div class="fs-5">₵90.00</div>
                    </div>
                    <!-- <div class="d-flex justify-content-between border rounded mx-3 py-3 px-3" style="background-color: #F1F3F7;">
                        <div class="fs-5">VIP</div>
                        <div class="fs-5">₵150.00</div>
                    </div> -->
                    <form method="POST" action="cart_action.php">
                        <input type="hidden" name="ticket_id" value="<?php echo $event->event_reference_id; ?>">
                        <input type="hidden" name="ticket_price" value="<?php echo $event->ticket_price; ?>">
                        <div class="modal fade" id="exampleModalToggle" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalToggleLabel">🎉 Reserve Your Spot</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <h6 class="b">Program: <?php echo $event->event_name ?></h6>
                                        <p class="text-sm mb-1 text-muted"><i class="fas fa-clock fa-fw"></i> <?php echo $event->event_date_time_start ?></p>

                                        <p class="text-sm text-muted"><i class="fas fa-map-marker-alt fa-fw"></i>
                                            <?php echo $event->event_venue ?>
                                        </p>
                                        <div class="table-responsive">
                                            <table class="table  table-condensed mb-0">
                                                <tbody>
                                                    <tr class="bg-gray">
                                                        <td class="border-top-white ">
                                                            <div class="text-center"><?php echo $event->ticket_name ?></div>
                                                            <div class="b mt-1 text-center">
                                                                ₵<?php echo $event->ticket_price ?>
                                                            </div>
                                                        </td>
                                                        <td class="border-top-white text-right">
                                                            <div class="input-group bootstrap-touchspin bootstrap-touchspin-injected">
                                                                <input type="number" id="quantity" name="quantity" class="form-control touchspin-integer bg-white eventdate-ticket-qte" data-min="0" data-max="10" value="1">
                                                                <span class="input-group-btn-vertical">
                                                                    <button class="btn text-white bootstrap-touchspin-up" type="button" style="background-color: #C3063F;" onclick="incrementValue(this)">+</button>
                                                                    <button class="btn text-white bootstrap-touchspin-down" type="button" style="background-color: #C3063F;" onclick="decrementValue(this)">-</button>
                                                                </span>
                                                            </div>
                                                        </td>
                                                    </tr>

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" name="add_to_cart" class="btn text-white" data-bs-target="#exampleModalToggle2" data-bs-toggle="modal" style="background-color: #C3063F;">Add to Cart</button>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </form>
                    <button class="d-flex justify-content-center gap-2 border rounded mx-3 mb-5 py-3 px-3 text-white" style="background-color: #C3063F;" data-bs-target="#exampleModalToggle" data-bs-toggle="modal">
                        <div style="rotate: 300deg;"><i class="bi bi-ticket-perforated fs-5"></i></div>
                        <div class="fs-5">Get TIcket</div>
                    </button>

                </div>
            </div>
            <hr class="mx-auto" style="width: 80%;">
        </div>


        <div class="row-3 py-5 px-3">
            <div class="d-flex flex-column ">
                <div class="d-flex flex-column  border rounded  gap-4 mx-3 py-3 px-3">
                    <div class="d-flex justify-content-between">
                        <div>Organized by</div>
                        <div class="d-flex gap-2">
                            <i class="bi bi-person-vcard " style="color: #176FDC"></i>
                            <div style="color: #176FDC">Details</div>
                        </div>
                    </div>

                    <div class="d-flex flex-column align-items-start">
                        <div><?php echo $event->organizer_name ?></div>
                        <div class="d-flex gap-2 py-1 px-4 border  rounded mt-1">Follow</div>
                    </div>

                </div>
            </div>
        </div>
    </div>


    <!-- </div> -->
</section>
</div>
</container>


</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<script>
    // Get all sidebar links
    const links = document.querySelectorAll('.sidebar-link');

    // Add event listener for each link
    links.forEach(link => {
        link.addEventListener('click', function() {
            // Remove the 'active' class from all links
            links.forEach(l => l.classList.remove('active'));

            // Add 'active' class to the clicked link
            this.classList.add('active');
        });
    });



    // Function to increment value
    function incrementValue(button) {
        const input = button.closest('.input-group').querySelector('input');
        const max = parseInt(input.getAttribute('data-max'), 10);
        let currentValue = parseInt(input.value, 10) || 0;

        if (currentValue < max) {
            input.value = currentValue + 1;
        }
    }

    // Function to decrement value
    function decrementValue(button) {
        const input = button.closest('.input-group').querySelector('input');
        const min = parseInt(input.getAttribute('data-min'), 10);
        let currentValue = parseInt(input.value, 10) || 0;

        if (currentValue > min) {
            input.value = currentValue - 1;
        }
    }
</script>
<script>
    window.addEventListener('DOMContentLoaded', () => {
        setTimeout(() => {
            document.getElementById('skeleton-loader').style.display = '';
            document.getElementById('real-events').style.display = 'block';
            document.getElementById('index_loader').style.display = 'none';
            document.getElementById('main_loader').style.display = 'block';
            document.getElementById('section_main_loader').style.display = 'block';
            document.getElementById('index_page_header').style.display = 'block';
            document.getElementById('index_footer').style.display = 'block';
        }, 2000); // 2 seconds delay for demonstration
    });
</script>

</php>