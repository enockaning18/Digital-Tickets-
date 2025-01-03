<?php require_once("../private/initialize.php"); ?>
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
                <a href="../public/index.php"> <img src="../bootstrap-config/images/logo.png" style="height: 50px; width: 50px;" alt=""></a>
            </div>

            <div class="input-group d-none d-md-flex border-0 nav-item" style="max-width: 500px;">
                <input type="text" class="form-control" placeholder="Search..." aria-label="Search..." />
                <span class="input-group-text"><i class="bi bi-search fs-5 fw-bold lh-0 "></i></span>
            </div>

            <div class="nav-item dropdown <?php if (!$session->is_logged_in()) {
                                                echo 'd-none' ?? '';
                                            } ?>">
                <a class="nav-link fs-5" href="" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="bi bi-person-check-fill "></i><?php echo $session->organizer_name ?>
                </a>
                <div class="dropdown-menu">
                    <li><a class="dropdown-item" href="organizer/organizer_dashboard.php">Dashboard</a></li>
                    <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                </div>
            </div>

            <?php if (!$session->is_logged_in()) { ?>
                <div class="d-none d-md-flex">
                    <button class="btn btn-outline-primary border-0" type="submit">
                        <div class="nav-item dropdown">
                            <a class="nav-link " href="" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Login
                            </a>
                            <div class="dropdown-menu">
                                <li><a class="dropdown-item" href="auth_login.php">Attendee</a></li>
                                <li><a class="dropdown-item" href="auth_login.php">Organizer</a></li>
                            </div>
                        </div>
                    </button>

                    <button class="btn btn-outline-primary border-0" type="submit">
                        <div class="nav-item dropdown">
                            <a class="nav-link " href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Signup
                            </a>
                            <div class="dropdown-menu">
                                <li><a class="dropdown-item" href="auth_register_attendee.php">Attendee</a></li>
                                <li><a class="dropdown-item" href="auth_register_organizer.php">Organizer</a></li>
                            </div>
                        </div>
                    </button>
                </div>
            <?php } ?>

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

                                <li>
                                    <div class="nav-item dropdown <?php if ($session->is_logged_in()) {
                                                                        echo 'd-none' ?? '';
                                                                    } ?>">
                                        <a class="nav-link " href="" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                            Login
                                        </a>
                                        <div class="dropdown-menu border border-0">
                                            <a class="dropdown-item" href="auth_login.php">Attendee</a>
                                            <a class="dropdown-item" href="auth_login.php">Organizer</a>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="nav-item dropdown <?php if ($session->is_logged_in()) {
                                                                        echo 'd-none' ?? '';
                                                                    } ?>">
                                        <a class="nav-link " href="" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                            Signup
                                        </a>
                                        <div class="dropdown-menu border border-0">
                                            <a class="dropdown-item" href="auth_login.php">Attendee</a>
                                            <a class="dropdown-item" href="auth_register_organizer.php">Organizer</a>
                                        </div>
                                    </div>
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

        <div class="container-xl p-0">
            <nav class="p-3 mx-auto d-none d-md-flex justify-content-between gap-2 mb-5">
                <div><a href="" class="text-decoration-none text-black"> Discover</a> </div>
                <div><a href="" class="text-decoration-none text-black"> Find Event</a></div>
                <div><a href="" class="text-decoration-none text-black"> Seal Tickets</a></div>
                <div><a href="" class="text-decoration-none text-black"> Private Event</a> </div>
                <div><a href="" class="text-decoration-none text-black"> Premium Event</a> </div>
                <div><a href="" class="text-decoration-none text-black"> Help Center</a> </div>
            </nav>