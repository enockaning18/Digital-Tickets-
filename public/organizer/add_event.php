<?php
include("../../private/initialize.php");
include(SHARED_PATH . "/organizer_header.php");
require_login();
$errors = [];

if (isset($_POST['add_new_event'])) {
    $args = $_POST['event'];

    // Validation: Check if event_description is empty
    if (empty($args['event_name'])) {
        $errors[] = "Event Name can't be empty";
    }
    if (empty($args['event_contact'])) {
        $errors[] = "Event Contact can't be empty";
    }
    if (empty($args['ticket_quantity'])) {
        $errors[] = "Event Ticket Quantity can't be empty";
    }
    if (empty($args['ticket_price'])) {
        $errors[] = "Event Ticket Price can't be empty";
    }
    if (empty($args['ticket_name'])) {
        $errors[] = "Event Ticket Name can't be empty";
    }
    if (empty($args['event_date_time_end']) && empty($args['event_date_time_start'])) {
        $errors[] = "Event Start & End Time must be set";
    }

    // If there are no errors, proceed to create a new event
    if (empty($errors)) {
        $event = new Event($args);
        $result = $event->create_new_event();

        if ($result === true) {
            echo "<script>
            document.addEventListener('DOMContentLoaded', function() {
                swal.fire({
                    title: 'Success!',
                    text: 'Event added successfully!',
                    icon: 'success',
                    confirmButtonText: 'OK'
                }).then(function() {                
                    window.location.href = 'organizer_dashboard.php';                
                });
            });
        </script>";
        } else {
            $msg = "Error: ";
            $msg .= $database->error;
            exit($msg);
        }
    }
}

// Initialize an empty Event object for the form
$event = new Event();
?>

<div id="basic-info" class="border col-md-12 col-lg-9 flex-column shadow-sm rounded p-md-5 ">
    <!-- Display Validation Errors -->
    <?php if (!empty($errors)) { ?>

        <div class="modal fade " id="exampleModalToggle" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="text-danger fs-5" id="exampleModalToggleLabel">
                            <i class="bi bi-exclamation-diamond  me-1"></i>
                            Error(s)
                        </h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <ul>
                            <?php foreach ($errors as $error) { ?>
                                <li><?php echo $error; ?></li>
                            <?php } ?>
                        </ul>
                    </div>
                    <div class="modal-footer">
                        <button class="btn text-white" data-bs-target="#exampleModalToggle2" data-bs-toggle="modal" style="background-color: #c3063f">
                            Try Again
                        </button>
                    </div>
                </div>
            </div>
        </div>

    <?php } ?>

    <form id="eventForm" action="" onsubmit="validateForm(event)" method="POST" enctype="multipart/form-data">
        <div class="mb-5 text-center">
            <h2 class="fw-bolder" style="color: #FD6C5D;">Add Event Info</h2>
            <h5>Create a Memorable Experience</h5>
        </div>

        <div>
            <h4>Step 1: Basic Information</h4>

            <div class="mb-4">
                <label for="event_title" class="mb-3" require>Event Title</label>
                <input type="text" style="background-color: #F1F3F7;" id="event_name" name="event[event_name]" maxlength="100" class="form-control">
            </div>

            <div>
                <label for="event_title" class="mb-2" require>Event Description</label>
                <div class="form-floating mb-3">
                    <textarea class="form-control" placeholder="Leave a comment here" id="event_description" name="event[event_description]" style="height: 100px"> </textarea>
                    <label for="event_info">Input Event Description</label>
                </div>
            </div>

            <div class="mb-4">
                <label for="event_category" class="mb-2" require>Event Category</label>
                <select class="form-select p-2" id="floatingSelectGrid" name="event[event_category]" style="background-color: #F1F3F7;">
                    <option value="">Select Category</option>
                    <option value="business-professional">Business / Professional</option>
                    <option value="charity-causes">Charity / Causes</option>
                    <option value="cinema-theatre-movies">Cinema / Theatre / Movies</option>
                    <option value="community-culture">Community / Culture</option>
                    <option value="conference-seminar-networking">Conference / Seminar / Networking</option>
                    <option value="family-education">Family / Education</option>
                    <option value="fashion-beauty">Fashion / Beauty</option>
                    <option value="festivals-spectacle">Festivals / Spectacle</option>
                    <option value="food-drink">Food / Drink</option>
                    <option value="game-competition">Game / Competition</option>
                    <option value="museum-monument">Museum / Monument</option>
                    <option value="music-concerts-live-shows">Music / Concerts / Live Shows</option>
                    <option value="other">Other</option>
                    <option value="performing-visual-arts">Performing / Visual Arts</option>
                    <option value="religion-spirituality">Religion / Spirituality</option>
                    <option value="sports-fitness-health-and-wellness">Sports / Fitness / Health and Wellness</option>
                    <option value="travel-outdoor-camp">Travel / Outdoor / Camp</option>
                    <option value="workshop-training">Workshop / Training</option>
                </select>
            </div>

            <div class="form-group ">
                <button type="button" class="btn text-white mx-auto" style="background-color: #c3073f" id="nextBtn" onclick="showView('basic-info', 'event-media')">Next: Event Media</button>

            </div>

        </div>

</div>

<!-- Event Media Starts Here -->
<div id="event-media" class="border col-md-12 col-lg-9  flex-column shadow-sm rounded p-md-5" style="display: none;">
    <div class="mb-5 text-center">
        <h2 class="fw-bolder" style="color: #FD6C5D;">Add Event Media</h2>
        <h5>Create a Memorable Experience</h5>
    </div>


    <h4>Step 2: Event Media</h4>
    <div class="mb-4">
        <label for="event_event" class="mb-3" require>Upload Events Image</label>
        <input type="file" name="image" id="upload" class="account-file-input form-control " name="event[image]" maxlength="100" />
    </div>
    <div class="mb-4">
        <h4>Optional</h4>
        <div class="accordion accordion-flush shadow-sm" id="accordionFlushExample">
            <!-- <div class="accordion-item rounded border">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed rounded" style="background-color: #F1F3F7;" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                        <span style="color: #C3063F;">Add Your Social Links</span>
                    </button>
                </h2>
                <div id="flush-collapseOne" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                    <div class="accordion-body">
                        <div class="py-4">
                            <h6 class="fw-bold">Youtube Video Url </h5>
                                <p>If you have an Youtube video that represents your activities as an event organizer, add it in the standard format: https://www.youtube.com/watch?v=kPQ26-SbZi4</p>
                                <input type="text" style="background-color: #F1F3F7;" id="event_name" name="event[youtube_url]" required="required" maxlength="100" class="form-control p-2">
                        </div>

                        <div class="py-4">
                            <h6 class="fw-bold">Twitter Link</h6>
                            <input type="text" style="background-color: #F1F3F7;" id="event_name" name="event[twitter]" required="required" maxlength="100" class="form-control p-2">
                        </div>

                        <div class="py-4">
                            <h6 class="fw-bold">Instagram Link</h6>
                            <input type="text" style="background-color: #F1F3F7;" id="event_name" name="event_name" required="required" maxlength="100" class="form-control p-2">
                        </div>
                    </div>
                </div>
            </div> -->
            <div class="accordion-item rounded border">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed  rounded" style="background-color: #F1F3F7;" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                        <span style="color: #C3063F;">Add Contact Channels</span>
                    </button>
                </h2>
                <div id="flush-collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                    <div class="accordion-body">
                        <div class="py-4">
                            <h6 class="fw-bold">Contact Phone Number</h6>
                            <p>Enter Phone Number To Be Called For Enquires</p>
                            <input type="text" style="background-color: #F1F3F7;" id="event_name" name="event[event_contact]" maxlength="100" class="form-control p-2">
                        </div>
                        <div class="py-4">
                            <h6 class="fw-bold">Contact Email Address</h6>
                            <p>Enter Email Address To Be Reached For Enquires</p>
                            <input type="text" style="background-color: #F1F3F7;" id="event_name" name="event[event_email]" maxlength="100" class="form-control p-2">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class=" d-block d-md-flex gap-0 justify-content-center gap-4">
        <div>
            <button type="button" class="btn text-white" style="background-color: #333" id="nextBtn" onclick="showView('event-media','basic-info')">Previous: Basic Info</button>
        </div>
        <div class="my-2 my-md-0">
            <button type="button" class="btn text-white" style="background-color: #c3073f" id="nextBtn" onclick="showView('event-media','timing-location')">Next: Event Timing & Location</button>
        </div>
    </div>
</div>

<!-- Event Timing & Location Starts Here -->
<div id="timing-location" class="border col-md-12 col-lg-9  flex-column shadow-sm rounded p-md-5" style="display: none;">
    <div class="mb-5 text-center">
        <h2 class="fw-bolder" style="color: #FD6C5D;">Event Timing</h2>
        <h5>Create a Memorable Experience</h5>
    </div>
    <h4>Step 3: Event Timing & Location</h4>

    <label class="fs-5 mb-4"> Where & When</label>

    <div class="py-0 ps-0 py-md-5 ps-md-5 border-0 border-md-1 rounded">
        <p class="fw-bold">Enable Sales On Event Date ?</p>
        <span><i class="bi bi-info-circle-fill" style="color: #C3063F;"> </i>Enable sales for an event date does not affect the ticket individual sales status</span>

        <div class="mb-4">
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="sales_date" id="inlineRadio1" value="option1" checked>
                <label class="form-check-label" for="sales_date">Yes</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="sales_date" id="inlineRadio2" value="option2">
                <label class="form-check-label" for="sales_date">No</label>
            </div>
        </div>

        <div class="form-group mb-3">
            <label for="event_startdate " class="required mb-3 fw-bold">Event Starts</label>
            <input type="text" id="event_startdate" name="event[event_date_time_start]" class="form-control" style="background-color: #F1F3F7; width: 400px;" require>
        </div>


        <div class="form-group mb-3">
            <label for="event_startdate" class="required mb-3 fw-bold">Event Ends</label>
            <input type="date" id="event_startdate" name="event[event_date_time_end]" class="form-control" style="background-color: #F1F3F7; width: 400px" require>
        </div>


        <label for="event_mode" class="required mb-3 fw-bold">Event Mode</label>
        <div class="mb-4">
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="event[event_mode]" id="inlineRadio1" value="Physical Event" checked>
                <label class="form-check-label" for="inlineRadio1">Physical event</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="event[event_mode]" id="inlineRadio2" value="Virtual Event">
                <label class="form-check-label" for="inlineRadio2">Virtual event</label>
            </div>
        </div>


        <label for="event_mode" class="required mb-3 fw-bold">Venue</label>
        <div class="mb-4">
            <span><i class="bi bi-info-circle-fill" style="color: #C3063F;"> </i>Select from public venues or add your own via the "my venues" option in the sidebar.</span>
            <label for="event_category" class="mb-2" require>Select Venue</label>
            <select class="form-select p-2" id="floatingSelectGrid" name="event[event_venue]" style="background-color: #F1F3F7; width: 600px">
                <option value="" disabled selected>Select Event </option>
                <?php $venue = Venue::find_all();
                foreach ($venue as $venue) { ?>
                    <option value="<?php echo $venue->venue_name ?>"><?php echo $venue->venue_name ?></option>
                <?php } ?>
            </select>
        </div>

        <div class="d-block d-md-flex gap-0 justify-content-center gap-4">
            <div>
                <button type="button" class="btn text-white" style="background-color: #333" id="nextBtn" onclick="showView('timing-location','event-media')">Previous: Event Media</button>
            </div>
            <div class="my-2 my-md-0">
                <button type="button" class="btn text-white" style="background-color: #c3073f" id="nextBtn" onclick="showView('timing-location','event-ticket')">Next: Event Timing & Location</button>
            </div>
        </div>
    </div>
</div>

<!-- Ticket Configration -->
<div id="event-ticket" class="border col-md-12 col-lg-9  flex-column shadow-sm rounded p-md-5" style="display: none;">

    <div class="mb-5 text-center">
        <h2 class="fw-bolder" style="color: #FD6C5D;">Add Event Media</h2>
        <h5>Create a Memorable Experience</h5>
    </div>
    <h4>Step 3: Event Tickets</h4>

    <label class="fs-5 mb-4"> Ticket Configration</label>

    <div id="ticketContainer">
        <!-- Ticket Form Template -->
        <div class="ticket-form border rounded p-3 mb-3">

            <div class="mb-4">
                <p class="fw-bold">Ticket Name</p>
                <span><i class="bi bi-info-circle-fill" style="color: #c3063f"> </i>
                    Examples: General, Regular, VIP, Premium, Early Bird, Student,
                    Group</span>
                <input type="text" style="background-color: #f1f3f7" class="form-control" name="event[ticket_name]" maxlength="100" />
            </div>

            <div class="mb-4">
                <label for="ticket_type" class="required mb-3 fw-bold">Ticket Type</label>
                <div class="mb-4">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="event[ticket_type]" id="inlineRadio1" value="Payed" checked>
                        <label class="form-check-label" for="inlineRadio1">Paid</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="event[ticket_type]" id="inlineRadio2" value="Free">
                        <label class="form-check-label" for="inlineRadio2">Free</label>
                    </div>
                </div>

            </div>

            <div class="mb-4">
                <label class="fw-bold mb-1">Price</label>
                <input type="number" style="background-color: #f1f3f7" class="form-control" name="event[ticket_price]" />
            </div>

            <div class="mb-4">
                <label class="fw-bold mb-1">Quantity Of Tickets Available</label>
                <input type="number" style="background-color: #f1f3f7" class="form-control" name="event[ticket_quantity]" />
            </div>
        </div>
    </div>

    <div class="d-block d-md-flex gap-0 justify-content-center gap-4">
        <div>
            <button type="button" class="btn text-white" style="background-color: #333" id="nextBtn" onclick="showView('event-ticket','timing-location',)">Previous: Event Timing & Location</button>
        </div>
        <div class="my-2 my-md-0">
            <button type="submit" id="account_settings_save" name="add_new_event" class="btn btn-primary btn">Save Changes</button>
        </div>
    </div>



    </form>


</div>



</section>
</div>
</container>


</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<script>
    // Wait for the DOM to load
    document.addEventListener('DOMContentLoaded', function() {
        // Initialize Flatpickr on the input field
        flatpickr('#event_startdate', {
            enableTime: true, // Enables time selection
            dateFormat: "D j M Y, h:i K ", // Correctly includes the short month
            time_24hr: false, // Use 12-hour time format
            altInput: true, // Show a more user-friendly display
            altFormat: "D j M Y, h:i K ", // Alternative display format
            defaultHour: 20, // Set default hour to 8 PM
            defaultMinute: 30, // Set default minute to 30
            // fixed: false,
        });
    });

    document.addEventListener('DOMContentLoaded', function() {
        const toastElList = [].slice.call(document.querySelectorAll('.toast'));
        const toastList = toastElList.map(function(toastEl) {
            return new bootstrap.Toast(toastEl, {
                autohide: false
            });
        });

        toastList.forEach(toast => toast.show());
    });

    document.addEventListener("DOMContentLoaded", function() {
        const modal = new bootstrap.Modal(document.getElementById('exampleModalToggle'));
        modal.show();
    });




    // A generic function to show a specific view and hide others
    function showView(currentViewId, nextViewId) {
        // Hide the current view
        document.getElementById(currentViewId).style.display = 'none';
        // Show the next view
        document.getElementById(nextViewId).style.display = 'block';
    }



    document.addEventListener('DOMContentLoaded', function() {
        let ticketCount = 1; // Keeps track of the number of ticket forms

        // Function to add a new ticket form
        document.getElementById('addTicketBtn').addEventListener('click', function() {
            const ticketContainer = document.getElementById('ticketContainer');

            // Clone the initial ticket form and modify IDs
            const newTicketForm = ticketContainer.querySelector('.ticket-form').cloneNode(true);
            newTicketForm.querySelectorAll('input[type="radio"]').forEach(function(radio) {
                radio.name = radio.name.replace(/_\d+/g, `_${ticketCount}`);
                radio.id = radio.id.replace(/_\d+/g, `_${ticketCount}`);
            });

            // Update other inputs' names
            newTicketForm.querySelectorAll('input[type="text"], input[type="number"]').forEach(function(input) {
                input.value = ''; // Clear input value for new ticket form
            });

            // Add a "Remove" button only for newly added forms
            const removeButton = document.createElement('button');
            removeButton.type = 'button';
            removeButton.className = 'btn btn-danger btn-sm mb-3 remove-ticket-btn';
            removeButton.textContent = 'Remove Ticket';

            // Append the "Remove" button to the new ticket form
            newTicketForm.insertBefore(removeButton, newTicketForm.firstChild);

            // Append the new ticket form to the container
            ticketContainer.appendChild(newTicketForm);

            // Add event listener to the new "Remove" button
            removeButton.addEventListener('click', function() {
                ticketContainer.removeChild(newTicketForm);
            });

            ticketCount++; // Increment ticket count
        });
    });
</script>


<?php include(SHARED_PATH . "/organizer_footer.php"); ?>
<!-- Sidebar code remains the same -->



</php>~~