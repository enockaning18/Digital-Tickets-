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
                <div class="border d-none d-md-flex flex-column shadow-sm col-lg-2 p-0 rounded">

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

                <!-- First View Starts Here -->
                <div id="firstView" class="border col-md-12 col-lg-9 d-flex flex-column shadow-sm rounded p-5">
                    <div class="mb-5 text-center">
                        <h2 class="fw-bolder" style="color: #FD6C5D;">Add Event Info</h2>
                        <h5>Create a Memorable Experience</h5>
                    </div>

                    <div>
                        <h4>Step 1: Basic Information</h4>
                        <form action="">
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
                        </form>
                    </div>
                </div>
                <!-- First View Ends Here -->

                <!-- Second View Starts Here -->
                <div id="secondView" class="border col-md-12 col-lg-9 d-flex flex-column shadow-sm rounded p-5" style="display: none;">
                    <div class="mb-5 text-center">
                        <h2 class="fw-bolder" style="color: #FD6C5D;">Add Event Media</h2>
                        <h5>Create a Memorable Experience</h5>
                    </div>

                    <!-- Content for the second view goes here -->
                    <!-- You can add more form steps or whatever you need -->
                </div>
                <!-- Second View Ends Here -->

            </section>

            <script>
                function showSecondView() {
                    // Hide the first view and show the second view
                    document.getElementById('firstView').style.display = 'none';
                    document.getElementById('secondView').style.display = 'block';
                }
            </script>



        </div>
    </container>


</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</html>