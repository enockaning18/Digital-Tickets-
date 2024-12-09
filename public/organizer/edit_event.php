<?php
include("../../private/initialize.php");
include(SHARED_PATH . "/organizer_header.php");

$id = $_GET['id'] ?? 1;
$event = Event::find_by_id($id);
$errors = [];
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_FILES['event']['name']['image']) && !empty($_FILES['event']['name']['image'])) {

        $uploaded_image = $_FILES['event'];
        $target_dir = "uploads/";
        $image_name = uniqid() . "_" . basename($uploaded_image['name']['image']);
        $target_file = $target_dir . $image_name;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        $valid_extensions = ['jpg', 'jpeg', 'png', 'gif'];
        if (!in_array($imageFileType, $valid_extensions)) {
            $errors[] = "Invalid file type. Only JPG, JPEG, PNG, and GIF files are allowed.";
        }
        if ($uploaded_image['error']['image'] === UPLOAD_ERR_OK) {
            if (move_uploaded_file($uploaded_image['tmp_name']['image'], $target_file)) {
                $args['image'] = $image_name;
            } else {
                $errors[] = "Failed to upload the image.";
            }
        } else {
            $errors[] = "File upload error: " . $uploaded_image['error']['image'];
        }
    } else {
        $args = $_POST['event'];
        $event->merge_object_data($args);
        $result = $event->update();
        if ($result === true) {
            echo "<script>
                    document.addEventListener('DOMContentLoaded', function() {
                        swal.fire({
                            title: 'Success!',
                            text: 'Details Updated.',
                            icon: 'success',
                            confirmButtonText: 'OK'
                        }).then(function() {                
                            window.location.href = 'my_event.php';                
                        });
                    });
                </script>";
        } else {
            echo "Database Error: " . $database->error;
        }
    }
}

?>



<!-- Basic Information Starts Here -->
<div id="basic-info" class="border col-md-12 col-lg-9 flex-column shadow-sm rounded p-5">
    <?php if ($errors > 1) {
        foreach ($errors as $errors) { ?>
        <ul>
            <li class=""><?php echo $errors ?></li>
        </ul>
    <?php }
    } ?>
    <form action="" method="POST" enctype="multipart/form-data">
        <div class="mb-5 text-center">
            <h2 class="fw-bolder" style="color: #FD6C5D;">Add Event Info</h2>
            <h5>Create a Memorable Experience</h5>
        </div>

        <div>
            <h4>Step 1: Basic Information</h4>

            <div class="mb-4">
                <label for="event_title" class="mb-3" require>Event Title</label>
                <input type="text" style="background-color: #F1F3F7;" id="event_name" name="event[event_name]" value="<?php echo h($event->event_name) ?>" required="required" maxlength="100" class="form-control">
            </div>

            <div>
                <label for="event_title" class="mb-2" require>Event Description</label>
                <div class="form-floating mb-3">
                    <textarea class="form-control" placeholder="Leave a comment here" id="event_description" name="event[event_description]" value="" style="height: 100px"><?php echo h($event->event_description) ?> </textarea>
                    <label for="event_info">Input Event Description</label>
                </div>
            </div>

            <div class="mb-4">
                <label for="event_category" class="mb-2" require>Event Category</label>
                <select class="form-select p-2" id="floatingSelectGrid" name="event[event_category]" style="background-color: #F1F3F7;">
                    <option disabled>Select Event Category</option>
                    <option value="Business / Professional">Business / Professional</option>
                    <option value="Charity / Causes">Charity / Causes</option>
                    <option value="Cinema / Theatre / Movies">Cinema / Theatre / Movies</option>
                    <option value="Community / Culture">Community / Culture</option>
                    <option value="Conference / Seminar / Networking">Conference / Seminar / Networking</option>
                    <option value="Family / Education">Family / Education</option>
                    <option value="Fashion / Beauty">Fashion / Beauty</option>
                    <option value="Festivals / Spectacle">Festivals / Spectacle</option>
                    <option value="Food / Drink">Food / Drink</option>
                    <option value="Game / Competition">Game / Competition</option>
                    <option value="11">Museum / Monument</option>
                    <option value="Music / Concerts / Live Shows">Music / Concerts / Live Shows</option>
                    <option value="Other" selected>Other</option>
                    <option value="Performing / Visual Arts">Performing / Visual Arts</option>
                    <option value="Religion / Spirituality">Religion / Spirituality</option>
                    <option value="Sports / Fitness / Health and Wellness">Sports / Fitness / Health and Wellness</option>
                    <option value="Travel / Outdoor / Camp">Travel / Outdoor / Camp</option>
                    <option value="Workshop / Training">Workshop / Training</option>
                </select>
            </div>

            <div class="form-group ">
                <button type="button" class="btn text-white mx-auto" style="background-color: #c3073f" id="nextBtn" onclick="showView('basic-info', 'event-media')">Next: Event Media</button>

            </div>

        </div>

</div>

<!-- Event Media Starts Here -->
<div id="event-media" class="border col-md-12 col-lg-9  flex-column shadow-sm rounded p-5" style="display: none;">
    <div class="mb-5 text-center">
        <h2 class="fw-bolder" style="color: #FD6C5D;">Add Event Media</h2>
        <h5>Create a Memorable Experience</h5>
    </div>


    <h4>Step 2: Event Media</h4>
    <div class="mb-4">
        <label for="event_event" class="mb-3" require>Upload Events Image</label>
        <input type="file" id="upload" name="event[image]" class="account-file-input form-control p-2" maxlength="100" />

        <?php if (!empty($event->image)) { ?>
            <img src="uploads/<?php echo h($event->image); ?>" alt="Event Image" class="img-thumbnail mt-3" style="max-width: 200px;">
            <input type="hidden" name="existing_image" value="<?php echo h($event->image); ?>">
        <?php } ?>
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
                            <input type="text" style="background-color: #F1F3F7;" id="event_name" name="event[event_contact]" value="<?php echo h($event->event_contact) ?>" required="required" maxlength="100" class="form-control p-2">
                        </div>
                        <div class="py-4">
                            <h6 class="fw-bold">Contact Email Address</h6>
                            <p>Enter Email Address To Be Reached For Enquires</p>
                            <input type="text" style="background-color: #F1F3F7;" id="event_name" name="event[event_email]" value="<?php echo h($event->event_email) ?>" required="required" maxlength="100" class="form-control p-2">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="d-flex gap-0 justify-content-center gap-4">
        <div>
            <button type="button" class="btn text-white" style="background-color: #333" id="nextBtn" onclick="showView('event-media','basic-info')">Previous: Basic Info</button>
        </div>
        <div>
            <button type="button" class="btn text-white" style="background-color: #c3073f" id="nextBtn" onclick="showView('event-media','timing-location')">Next: Event Timing & Location</button>
        </div>
    </div>
</div>

<!-- Event Timing & Location Starts Here -->
<div id="timing-location" class="border col-md-12 col-lg-9  flex-column shadow-sm rounded p-5" style="display: none;">
    <div class="mb-5 text-center">
        <h2 class="fw-bolder" style="color: #FD6C5D;">Add Event Media</h2>
        <h5>Create a Memorable Experience</h5>
    </div>
    <h4>Step 3: Event Timing & Location</h4>

    <label class="fs-5 mb-4"> Where & When</label>

    <div class="py-5 ps-5 border rounded">
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
            <input type="text" id="event_startdate" name="event[event_date_time_start]" value="<?php echo h($event->event_date_time_start) ?>" required="required" class="form-control" style="background-color: #F1F3F7; width: 400px;" require>
        </div>


        <div class="form-group mb-3">
            <label for="event_startdate" class="required mb-3 fw-bold">Event Ends</label>
            <input type="date" id="event_startdate" name="event[event_date_time_end]" value="<?php echo h($event->event_date_time_end) ?>" required="required" class="form-control" style="background-color: #F1F3F7; width: 400px" require>
        </div>


        <label for="event_mode" class="required mb-3 fw-bold">Event Mode</label>
        <div class="mb-4">
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="event[event_mode]" id="inlineRadio1" value="Physical Event" <?php echo ($event->event_mode === "Physical Event") ? 'checked' : ''; ?>>
                <label class="form-check-label" for="inlineRadio1">Physical event</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="event[event_mode]" id="inlineRadio2" value="Virtual Event" <?php echo ($event->event_mode === "Virtual Event") ? 'checked' : ''; ?>>
                <label class="form-check-label" for="inlineRadio2">Virtual event</label>
            </div>
        </div>



        <label for="event_mode" class="required mb-3 fw-bold">Venue</label>
        <div class="mb-4">
            <span><i class="bi bi-info-circle-fill" style="color: #C3063F;"> </i>Select from public venues or add your own via the "my venues" option in the sidebar.</span>
            <label for="event_category" class="mb-2" require>Select Venue</label>
            <select class="form-select p-2" id="floatingSelectGrid" name="event[event_venue]" style="background-color: #F1F3F7; width: 600px">
                <option value="Brunie Sports Complex" <?php echo ($event->event_venue === "Brunie Sports Complex") ? 'selected' : ''; ?>>Brunie Sports Complex</option>
                <option value="Basement Bar and Loudge" <?php echo ($event->event_venue === "Basement Bar and Loudge") ? 'selected' : ''; ?>>Basement Bar and Loudge</option>
            </select>
        </div>

        <div class="d-flex gap-0 justify-content-center gap-4">
            <div>
                <button type="button" class="btn text-white" style="background-color: #333" id="nextBtn" onclick="showView('timing-location','event-media')">Previous: Event Media</button>
            </div>
            <div>
                <button type="button" class="btn text-white" style="background-color: #c3073f" id="nextBtn" onclick="showView('timing-location','event-ticket')">Next: Event Timing & Location</button>
            </div>
        </div>
    </div>
</div>

<!-- Ticket Configration -->
<div id="event-ticket" class="border col-md-12 col-lg-9  flex-column shadow-sm rounded p-5" style="display: none;">

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
                <input type="text" style="background-color: #f1f3f7" class="form-control" name="event[ticket_name]" value="<?php echo h($event->ticket_name) ?>" required="required" maxlength="100" />
            </div>

            <div class="mb-4">
                <label for="ticket_type" class="required mb-3 fw-bold">Ticket Type</label>
                <div class="mb-4">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="event[ticket_type]" id="inlineRadio1" value="Payed" <?php echo ($event->ticket_type === "Payed") ? 'checked' : ''; ?>>
                        <label class="form-check-label" for="inlineRadio1">Paid</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="event[ticket_type]" id="inlineRadio2" value="Free" <?php echo ($event->ticket_type === "Free") ? 'checked' : ''; ?>>
                        <label class="form-check-label" for="inlineRadio2">Free</label>
                    </div>
                </div>

            </div>

            <div class="mb-4">
                <label class="fw-bold mb-1">Price</label>
                <input type="number" style="background-color: #f1f3f7" class="form-control" name="event[ticket_price]" value="<?php echo h($event->ticket_price) ?>" required="required" />
            </div>

            <div class="mb-4">
                <label class="fw-bold mb-1">Quantity Of Tickets Available</label>
                <input type="number" style="background-color: #f1f3f7" class="form-control" name="event[ticket_quantity]" value="<?php echo h($event->ticket_quantity) ?>" required="required" />
            </div>
        </div>
    </div>

    <button type="button" class="btn text-white" style="background-color: #333" id="nextBtn" onclick="showView('event-ticket','timing-location',)">Previous: Event Timing & Location</button>
    <button type="submit" id="account_settings_save" name="update_event" class="btn btn-primary btn">Update Changes</button>
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

</php>