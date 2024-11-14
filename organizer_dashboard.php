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

            <section class="mt-5 m-0 row d-flex justify-content-between  rounded overflow-hidden align-items-start">

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

                <div class="border col-md-12 col-lg-9 d-flex flex-column shadow-sm rounded  p-5">
                    <div class="">
                        <h3 style="color:#C3063F;">Hello, User!</h3>
                        <p>Welcome back to your dashboard. Here is a summary of your recent activities and upcoming events</p>
                    </div>

                    <div class="d-flex flex-column">
                        <div class="d-flex justify-content-between my-3">
                            <div class="d-flex gap-2 ">
                                <div><i class="bi bi-calendar2 fs-5 fw-bold"></i></div>
                                <div class="fs-5 fw-bold">Events Summary</div>
                            </div>

                            <div class="d-flex gap-2 ">
                                <div><i class="bi bi-gear-wide-connected" style="color:#31708f;"></i></div>
                                <div class="fw-bold" style="color:#31708f;">Edit Event</div>
                            </div>
                        </div>

                        <div class="d-flex justify-content-between row my-3">
                            <div class="col-lg-3 px-3 py-1 border rounded shadow-sm text-white" style="background-color: #FEB372;">
                                <div class="d-flex justify-content-between align-items-end">
                                    <div> </div>
                                    <div> <i class="bi bi-folder-plus fs-5"></i></div>
                                </div>

                                <div class="d-flex flex-column gap-1 align-items-center mb-2">
                                    <div><span class="fw-bold fs-2">0</span></div>
                                    <div class="">Events Added</div>
                                </div>
                            </div>
                            <div class="col-lg-3 px-3 py-1 border rounded shadow-sm text-white" style="background-color: #BFC9C6;">
                                <div class="d-flex justify-content-between align-items-end">
                                    <div> </div>
                                    <div> <i class="bi bi-globe-americas fs-5"></i></div>
                                </div>

                                <div class="d-flex flex-column gap-1 align-items-center mb-2">
                                    <div><span class="fw-bold fs-2">0</span></div>
                                    <div class="">Published Event</div>
                                </div>
                            </div>
                            <div class="col-lg-3 px-3 py-1 border rounded shadow-sm text-white" style="background-color: #96A5A0;">
                                <div class="d-flex justify-content-between align-items-end">
                                    <div> </div>
                                    <div> <i class="bi bi-calendar-check fs-5"></i></div>
                                </div>

                                <div class="d-flex flex-column gap-1 align-items-center mb-2">
                                    <div><span class="fw-bold fs-2">0</span></div>
                                    <div class="">Upcoming Events</div>
                                </div>
                            </div>
                            <div class="col-lg-3 px-3 py-1 border rounded shadow-sm text-white" style="background-color: #F84F1D;">
                                <div class="d-flex justify-content-between align-items-end">
                                    <div> </div>
                                    <div> <i class="bi bi-calendar-range fs-5"></i></div>
                                </div>

                                <div class="d-flex flex-column gap-1 align-items-center mb-2">
                                    <div><span class="fw-bold fs-2">0</span></div>
                                    <div class="">Event Dates</div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="d-flex flex-column">
                        <div class="d-flex justify-content-between my-3">
                            <div class="d-flex gap-2 ">
                                <div><i class="bi bi-cart4 fs-5 fw-bold"> </i></div>
                                <div class="fs-5 fw-bold">Attendees Summary</div>
                            </div>

                            <div class="d-flex gap-2 ">
                                <div><i class="bi bi-people-fill" style="color:#31708f;"></i></div>
                                <div class="fw-bold" style="color:#31708f;">Manage Attendees</div>
                            </div>
                        </div>

                        <div class="d-flex justify-content-between row my-3">
                            <div class="col-lg-3 px-3 py-1 border rounded shadow-sm text-white" style="background-color: #429596;">
                                <div class="d-flex justify-content-between align-items-end">
                                    <div> </div>
                                    <div> <i class="bi bi-cart2 fs-5"></i></div>
                                </div>

                                <div class="d-flex flex-column gap-1 align-items-center mb-2">
                                    <div><span class="fw-bold fs-2">0</span></div>
                                    <div class="">Orders Placed</div>
                                </div>
                            </div>
                            <div class="col-lg-3 px-3 py-1 border rounded shadow-sm text-white" style="background-color: #F3D9B5;">
                                <div class="d-flex justify-content-between align-items-end">
                                    <div> </div>
                                    <div> <i class="bi bi bi-wallet2 fs-5"></i></div>
                                </div>

                                <div class="d-flex flex-column gap-1 align-items-center mb-2">
                                    <div><span class="fw-bold fs-2">0</span></div>
                                    <div class="">Payed Orders</div>
                                </div>
                            </div>
                            <div class="col-lg-3 px-3 py-1 border rounded shadow-sm text-white" style="background-color: #DDA25B;">
                                <div class="d-flex justify-content-between align-items-end">
                                    <div> </div>
                                    <div> <i class="bi bi-hourglass-bottom fs-5"></i></div>
                                </div>

                                <div class="d-flex flex-column gap-1 align-items-center mb-2">
                                    <div><span class="fw-bold fs-2">0</span></div>
                                    <div class="">Awaiting Payment</div>
                                </div>
                            </div>
                            <div class="col-lg-3 px-3 py-1 border rounded shadow-sm text-white" style="background-color: #CF8D51;">
                                <div class="d-flex justify-content-between align-items-end">
                                    <div> </div>
                                    <div> <i class="bi bi-ticket-detailed fs-5"></i></div>
                                </div>

                                <div class="d-flex flex-column gap-1 align-items-center mb-2">
                                    <div><span class="fw-bold fs-2">0</span></div>
                                    <div class="">Ticket Sold</div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="py-3">
                        <div>
                            <h4 style="color:#C3063F ;">
                                Dashboard Legend
                            </h4>
                        </div>

                        <div>
                            <div><i class="bi bi-cart4 fs-5 fw-bold"> </i>
                        Orders Placed</div>
                        </div>
                    </div>

                    

                </div>
            </section>
        </div>
    </container>


</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</html>