<?php require_once("../../private/initialize.php"); ?>
<!DOCTYPE php>
<php lang="en" class="light-style layout-menu-fixed layout-compact" dir="ltr" data-theme="theme-default" data-template="vertical-menu-template-free">

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
                    <a href="../index.php"><img src="../../bootstrap-config/images/logo.png" style="height: 50px; width: 50px;" alt=""></a>
                </div>

                <div class="input-group d-none d-md-flex border-0 nav-item" style="max-width: 500px;">
                    <input type="text" class="form-control" placeholder="Search..." aria-label="Search..." />
                    <span class="input-group-text"><i class="bi bi-search fs-5 fw-bold lh-0 "></i></span>
                </div>

                <div class="nav-item dropdown">
                    <a class="nav-link fs-5" href="" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-person-check-fill "></i>
                    </a>
                    <div class="dropdown-menu">
                        <li><a class="dropdown-item" href="organizer_dashboard.php">Dashboard</a></li>
                        <li><a class="dropdown-item" href="../logout.php">Logout</a></li>
                    </div>
                </div>

                <div class="d-flex d-md-none ">
                    <!-- profile menu for small screens -->
                    <nav class="navbar d-md-none">
                        <div class="container-fluid">
                            <!-- Button to toggle the offcanvas menu -->
                            <button class="navbar-toggler border border-0" type="button" data-bs-toggle="offcanvas" data-bs-target="#profile-menu" aria-controls="profile-menu" aria-label="Toggle navigation">
                                <i class="bi bi-person-fill-check"></i>
                            </button>

                            <!-- Offcanvas Menu -->
                            <div class="offcanvas offcanvas-start" tabindex="-1" id="profile-menu" aria-labelledby="profile-menu-label">
                                <div class="offcanvas-header">
                                    <h5 class="offcanvas-title" id="profile-menu-label">Menu</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                                </div>

                                <div class="offcanvas-body">
                                    <ul class="list-unstyled m-0 p-0">

                                        <li>
                                            <a href="organizer_dashboard.php" class="sidebar-link d-flex align-items-center ps-4 py-3">
                                                <i class="bi bi-speedometer2 me-2"></i> My Ticket
                                            </a>
                                        </li>
                                        <li>
                                            <a href="add_event.php" class="sidebar-link d-flex align-items-center ps-4 py-3">
                                                <i class="bi bi-calendar-check me-2"></i> My Cart
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </nav>

                    <!-- profile menu ends here -->

                    <!-- Hamburger menu for small screens -->
                    <nav class="navbar d-md-none bg-white">
                        <div class="container-fluid bg-white" style="background-color:ffff; color:#c3073f">
                            <button class="navbar-toggler bg-white" style=" color:#c3073f" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon text-success"></span>
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
                </div>
            </header>

            <div class="container-xxl  p-0 ">
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
                        <ul class="list-unstyled m-0 p-0">

                            <li>
                                <a href="my_ticket.php" class="sidebar-link d-flex align-items-center ps-4 py-3">
                                    <i class="bi bi-ticket-detailed me-2"></i> My Ticket
                                </a>
                            </li>
                            <li>
                                <a href="my_cart.php" class="sidebar-link d-flex align-items-center ps-4 py-3">
                                    <i class="bi bi-inboxes-fill me-2"></i>My Cart
                                </a>
                            </li>
                            <li>
                                <a href="account_settings.php" class="sidebar-link d-flex align-items-center ps-4 py-3">
                                    <i class="bi bi-gear-wide-connected me-2"></i>Account Settings
                                </a>
                            </li>
                        </ul>
                    </div>




                    <!-- Sidebar code remains the same -->