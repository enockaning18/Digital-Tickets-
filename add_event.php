<!DOCTYPE html>
<html lang="en" class="light-style layout-menu-fixed layout-compact" dir="ltr" data-theme="theme-default" data-template="vertical-menu-template-free">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>Team Event</title>

    <link rel="icon" type="image" href="" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Exo+2:wght@100..900&display=swap" rel="stylesheet">

    <!-- Flatpickr CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">

    <!-- Flatpickr JS -->
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
</head>

<body style="font-family:'Exo 2','sans-serif';">
    <container>
        <header class="d-flex justify-content-between align-items-center shadow-sm p-3">
            <div>
                <img src="bootstrap-config/images/logo.png" style="height: 50px; width: 50px;" alt="">
            </div>

            <div class="input-group d-none d-md-flex border-0 nav-item" style="max-width: 500px;">
                <input type="text" class="form-control" placeholder="Search..." aria-label="Search..." />
                <span class="input-group-text"><i class="bi bi-search fs-5 fw-bold lh-0 "></i></span>
            </div>

            <div class="d-none d-md-flex">
                <button class="btn btn-outline-primary border-0" type="submit">Login</button>
                <button class="btn btn-primary" type="submit">Signup</button>
            </div>

            <!-- Hamburger menu for small screens -->
            <nav class="navbar bg-body-tertiary d-md-none">
                <div class="container-fluid">
                    <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">

                        <div class="offcanvas-header">
                            <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Menu</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                        </div>
                        <div class="offcanvas-body">
                            <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                                <li class="nav-item">
                                    <a class="nav-link active" aria-current="page" href="#">Discover</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">Find Event</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">Seal Tickets</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">Private Event</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">Premium Event</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">Help Center</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">Login</a>
                                    <a class="nav-link" href="#">SignUp</a>
                                </li>

                            </ul>
                            <form class="d-flex mt-3" role="search">
                                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                                <button class="btn btn-outline-success" type="submit">Search</button>
                            </form>
                        </div>
                    </div>
                </div>
            </nav>
            <!-- Hamburger menu ends here -->
        </header>

        <div class="container-lg p-0 ">
            <nav class="p-3 mx-auto d-none d-md-flex justify-content-between  gap-2 mb-5">
                <div><a href="" class="text-decoration-none text-black"> Discover</a> </div>
                <div><a href="" class="text-decoration-none text-black"> Find Event</a></div>
                <div><a href="" class="text-decoration-none text-black"> Seal Tickets</a></div>
                <div><a href="" class="text-decoration-none text-black"> Private Event</a> </div>
                <div><a href="" class="text-decoration-none text-black"> Premium Event</a> </div>
                <div><a href="" class="text-decoration-none text-black"> Help Center</a> </div>
            </nav>

            <section class="mt-5 m-0 row d-flex justify-content-between rounded overflow-hidden align-items-start">

                <!-- Sidebar code remains the same -->
                <div class="border d-none d-md-flex flex-column  shadow-sm col-lg-2 p-0 rounded">

                    <div class="d-flex gap-2 ps-4 py-3" style="background-color: #F1F3F7;">
                        <div><i class="bi bi-speedometer2 " style="color:#C3063F ;"></i></div>
                        <div class="" style="color:#C3063F ;"> Dashboard</div>
                    </div>

                    <div class="d-flex gap-2 ps-4 py-3">
                        <div><i class="bi bi-calendar-check "></i></div>
                        <div> Add A New Event</div>
                    </div>
                    <div class="d-flex gap-2 ps-4 py-3">
                        <div><i class="bi bi-calendar-plus"></i></div>
                        <div> My Event</div>
                    </div>
                    <div class="d-flex gap-2 ps-4 py-3">
                        <div><i class="bi bi-geo-alt-fill"></i></div>
                        <div> My Venues</div>
                    </div>
                    <div class="d-flex gap-2 ps-4 py-3">
                        <div><i class="bi bi-geo"></i></i></div>
                        <div> Add A New Venue</div>
                    </div>
                    <div class="d-flex gap-2 ps-4 py-3">
                        <div><i class="bi bi-person-vcard"></i></div>
                        <div> My Organizer Program</div>
                    </div>
                    <div class="d-flex gap-2 ps-4 py-3">
                        <div><i class="bi bi-patch-question"></i></div>
                        <div> Help Center</div>
                    </div>
                    <div class="d-flex gap-2 ps-4 py-3 ">
                        <div><i class="bi bi-person-gear"></i></i></div>
                        <div>Account Settings</div>
                    </div>
                </div>
                <!-- Basic Information Starts Here -->
                <div id="firstView" class="border col-md-12 col-lg-9 flex-column shadow-sm rounded p-5" style="display: ;">
                    <form action="">
                        <div class="mb-5 text-center">
                            <h2 class="fw-bolder" style="color: #FD6C5D;">Add Event Info</h2>
                            <h5>Create a Memorable Experience</h5>
                        </div>

                        <div>
                            <h4>Step 1: Basic Information</h4>

                            <div class="mb-4">
                                <label for="event_title" class="mb-3" require>Event Title</label>
                                <input type="text" style="background-color: #F1F3F7;" id="event_name" name="event_name" required="required" maxlength="100" class="form-control">
                            </div>

                            <div>
                                <label for="event_title" class="mb-2" require>Event Description</label>
                                <div class="form-floating mb-3">
                                    <textarea class="form-control" placeholder="Leave a comment here" id="event_info" style="height: 100px"> </textarea>
                                    <label for="event_info">Input Event Description</label>
                                </div>
                            </div>

                            <div class="mb-4">
                                <label for="event_category" class="mb-2" require>Event Category</label>
                                <select class="form-select p-2" id="floatingSelectGrid" style="background-color: #F1F3F7;">
                                    <option selected>Select Event Category</option>
                                    <option value="" selected>Select event category</option>
                                    <option value="9">Business / Professional</option>
                                    <option value="12">Charity / Causes</option>
                                    <option value="1">Cinema / Theatre / Movies</option>
                                    <option value="18">Community / Culture</option>
                                    <option value="6">Conference / Seminar / Networking</option>
                                    <option value="13">Family / Education</option>
                                    <option value="19">Fashion / Beauty</option>
                                    <option value="7">Festivals / Spectacle</option>
                                    <option value="17">Food / Drink</option>
                                    <option value="8">Game / Competition</option>
                                    <option value="11">Museum / Monument</option>
                                    <option value="3">Music / Concerts / Live Shows</option>
                                    <option value="15">Other</option>
                                    <option value="2">Performing / Visual Arts</option>
                                    <option value="16">Religion / Spirituality</option>
                                    <option value="10">Sports / Fitness / Health and Wellness</option>
                                    <option value="4">Travel / Outdoor / Camp</option>
                                    <option value="5">Workshop / Training</option>
                                </select>
                            </div>

                            <button type="button" class="btn text-white mx-auto" style="background-color: #c3073f" id="nextBtn" onclick="showSecondView()">Next: Event Media</button>

                        </div>
                </div>

                <!-- Event Media Starts Here -->
                <div id="secondView" class="border col-md-12 col-lg-9  flex-column shadow-sm rounded p-5" style="display: none;">
                    <div class="mb-5 text-center">
                        <h2 class="fw-bolder" style="color: #FD6C5D;">Add Event Media</h2>
                        <h5>Create a Memorable Experience</h5>
                    </div>


                    <h4>Step 2: Event Media</h4>
                    <div class="mb-4">
                        <label for="event_title" class="mb-3" require>Upload Events Image</label>
                        <input type="file" name="image" id="upload" class="account-file-input form-control p-2" required="required" maxlength="100" />
                    </div>
                    <div class="mb-4">
                        <h4>Optional</h4>
                        <div class="accordion accordion-flush shadow-sm" id="accordionFlushExample">
                            <div class="accordion-item rounded border">
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
                                                <input type="text" style="background-color: #F1F3F7;" id="event_name" name="event_youtube_url" required="required" maxlength="100" class="form-control p-2">
                                        </div>

                                        <div class="py-4">
                                            <h6 class="fw-bold">Twitter Link</h6>
                                            <input type="text" style="background-color: #F1F3F7;" id="event_name" name="event_name" required="required" maxlength="100" class="form-control p-2">
                                        </div>

                                        <div class="py-4">
                                            <h6 class="fw-bold">Instagram Link</h6>
                                            <input type="text" style="background-color: #F1F3F7;" id="event_name" name="event_name" required="required" maxlength="100" class="form-control p-2">
                                        </div>
                                    </div>
                                </div>
                            </div>
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
                                            <input type="text" style="background-color: #F1F3F7;" id="event_name" name="event_youtube_url" required="required" maxlength="100" class="form-control p-2">
                                        </div>
                                        <div class="py-4">
                                            <h6 class="fw-bold">Contact Email Address</h6>
                                            <p>Enter Email Address To Be Reached For Enquires</p>
                                            <input type="text" style="background-color: #F1F3F7;" id="event_name" name="event_youtube_url" required="required" maxlength="100" class="form-control p-2">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex gap-0 justify-content-center gap-4">
                        <div>
                            <button type="button" class="btn text-white" style="background-color: #333" id="nextBtn" onclick="showPreviousView()">Previous: Basic Info</button>
                        </div>
                        <div>
                            <button type="button" class="btn text-white" style="background-color: #c3073f" id="nextBtn" onclick="thirdView()">Next: Event Timing & Location</button>
                        </div>
                    </div>
                </div>

                <!-- Event Timing & Location Starts Here -->
                <div id="thirdView" class="border col-md-12 col-lg-9  flex-column shadow-sm rounded p-5" style="display: none;">
                    <div class="mb-5 text-center">
                        <h2 class="fw-bolder" style="color: #FD6C5D;">Add Event Media</h2>
                        <h5>Create a Memorable Experience</h5>
                    </div>
                    <h4>Step 3: Event Timing & Location</h4>

                    <label class="fs-5 mb-4"> Where & When</label>

                    <div class="py-5 ps-5 border rounded">
                        <p class="fw-bold">Enable Sales For Event Date ?</p>
                        <span><i class="bi bi-info-circle-fill" style="color: #C3063F;"> </i>Enable sales for an event date does not affect the ticket individual sales status</span>
                        <div class="mb-4">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1" checked>
                                <label class="form-check-label" for="inlineRadio1">Yes</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
                                <label class="form-check-label" for="inlineRadio2">No</label>
                            </div>
                        </div>

                        <div class="form-group mb-3">
                            <label for="event_startdate" class="required mb-3 fw-bold">Event Starts</label>
                            <input type="date" id="event_startdate" name="event[eventdates][0][startdate]" required="required" class="form-control" style="background-color: #F1F3F7; width: 400px" require>
                        </div>

                        <div class="form-group mb-3">
                            <label for="event_startdate" class="required mb-3 fw-bold">Event Ends</label>
                            <input type="date" id="event_startdate" name="event[eventdates][0][startdate]" required="required" class="form-control" style="background-color: #F1F3F7; width: 400px" require>
                        </div>


                        <label for="event_mode" class="required mb-3 fw-bold">Event Mode</label>
                        <div class="mb-4">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1" checked>
                                <label class="form-check-label" for="inlineRadio1">Physical event</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
                                <label class="form-check-label" for="inlineRadio2">Virtual event</label>
                            </div>
                        </div>

                        <label for="event_mode" class="required mb-3 fw-bold">Venue</label>
                        <div class="mb-4">
                            <span><i class="bi bi-info-circle-fill" style="color: #C3063F;"> </i>Select from public venues or add your own via the "my venues" option in the sidebar.</span>
                            <label for="event_category" class="mb-2" require>Select Venue</label>
                            <select class="form-select p-2" id="floatingSelectGrid" style="background-color: #F1F3F7; width: 600px">
                                <option value="" selected>Select Event </option>
                                <option value="9">Brunie Sports Complex</option>
                                <option value="9">Basement Bar and Loudge</option>
                            </select>
                        </div>

                        <div class="d-flex gap-0 justify-content-center gap-4">
                            <div>
                                <button type="button" class="btn text-white" style="background-color: #333" id="nextBtn" onclick="thirdView()">Previous: Basic Info</button>
                            </div>
                            <div>
                                <button type="button" class="btn text-white" style="background-color: #c3073f" id="nextBtn" onclick="forthView()">Next: Event Timing & Location</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Ticket Configration -->
                <div id="forthView" class="border col-md-12 col-lg-9  flex-column shadow-sm rounded p-5" style="display: none;">

                    <div class="mb-5 text-center">
                        <h2 class="fw-bolder" style="color: #FD6C5D;">Add Event Media</h2>
                        <h5>Create a Memorable Experience</h5>
                    </div>
                    <h4>Step 3: Event Tickets</h4>

                    <label class="fs-5 mb-4"> Ticket Configration</label>

                    <div id="ticketContainer">
                        <!-- Ticket Form Template -->
                        <div class="ticket-form border rounded p-3 mb-3">
                            <div class="d-flex justify-content-between">
                                <p class="fw-bold">Enable Sales For This Ticket?</p>
                            </div>
                            <div class="mb-4">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="inlineRadioOptions_0" id="inlineRadio1_0" value="option1" checked />
                                    <label class="form-check-label" for="inlineRadio1_0">Yes</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="inlineRadioOptions_0" id="inlineRadio2_0" value="option2" />
                                    <label class="form-check-label" for="inlineRadio2_0">No</label>
                                </div>
                            </div>

                            <div class="mb-4">
                                <p class="fw-bold">Ticket Name</p>
                                <span><i class="bi bi-info-circle-fill" style="color: #c3063f"> </i>
                                    Examples: General, Regular, VIP, Premium, Early Bird, Student,
                                    Group</span>
                                <input type="text" style="background-color: #f1f3f7" class="form-control" name="ticket_name[]" required="required" maxlength="100" />
                            </div>

                            <div class="mb-4">
                                <label class="fw-bold">Ticket Type</label>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="ticketType_0" id="paidRadio_0" value="paid" checked />
                                    <label class="form-check-label" for="paidRadio_0">Paid</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="ticketType_0" id="freeRadio_0" value="free" />
                                    <label class="form-check-label" for="freeRadio_0">Free</label>
                                </div>
                            </div>

                            <div class="mb-4">
                                <label class="fw-bold mb-1">Price</label>
                                <input type="number" style="background-color: #f1f3f7" class="form-control" name="ticket_price[]" required="required" />
                            </div>

                            <div class="mb-4">
                                <label class="fw-bold mb-1">Quantity Of Tickets Available</label>
                                <input type="number" style="background-color: #f1f3f7" class="form-control" name="ticket_quantity[]" required="required" />
                            </div>
                        </div>
                    </div>

                    <!-- Button to Add New Ticket Form -->
                    <button type="button" class="btn btn-primary mt-3" id="addTicketBtn">
                        Add New Ticket
                    </button>
                </div>


                </form>
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
            dateFormat: "Y-m-d H:i", // Format for the date and time (e.g., 2024-11-14 15:30)
            time_24hr: true // Use 24-hour time format
        });
    });

    function showSecondView() {
        document.getElementById('firstView').style.display = 'none';
        document.getElementById('secondView').style.display = 'block';
    }

    function showPreviousView() {
        document.getElementById('secondView').style.display = 'none';
        document.getElementById('firstView').style.display = 'block';
    }

    function thirdView() {
        document.getElementById('secondView').style.display = 'none';
        document.getElementById('thirdView').style.display = 'block';
    }

    function forthView() {
        document.getElementById('thirdView').style.display = 'none';
        document.getElementById('forthView').style.display = 'block';
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


</html>