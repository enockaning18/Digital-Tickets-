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

        <div class="container-lg p-0">
            <nav class="p-3 mx-auto d-none d-md-flex justify-content-between gap-2 mb-5">
                <div><a href="" class="text-decoration-none text-black"> Discover</a> </div>
                <div><a href="" class="text-decoration-none text-black"> Find Event</a></div>
                <div><a href="" class="text-decoration-none text-black"> Seal Tickets</a></div>
                <div><a href="" class="text-decoration-none text-black"> Private Event</a> </div>
                <div><a href="" class="text-decoration-none text-black"> Premium Event</a> </div>
                <div><a href="" class="text-decoration-none text-black"> Help Center</a> </div>
            </nav>

            <section class="mt-5 m-0">
                <div class="d-flex flex-column text-center justify-content-center">
                    <h2 class="fs-md-1">Upcoming Event</h2>
                    <p>Don't Miss These Exciting Events In Ghana </p>
                </div>

                <div class="my-5">
                    <ul class="row d-flex justify-content-around gap-2 align-items-center ">
                        <li class="card col-10 col-sm-5 col-md-5 col-lg-3 mb-4 p-0 border border-1 ">
                            <div>
                                <div class="card-image rounded-top" style="background-image: url('bootstrap-config/images/ball.jpeg'); background-size: contain; background-position: center center;     background-repeat: no-repeat; height:14rem; background-size: cover; background-position: center;"></div>
                                <div class="card-body">
                                    <h5 class="card-title">Program: Melbourne Cup</h5>
                                    <p class="card-text mb-0">Location: Palm Royal Beach</p>
                                    <p class="card-text mb-0">Time: Sat 30 2024, 8:30 PM GMT</p>
                                    <p class="card-text ">Price: GHC 50.00</p>
                                    <a href="view_ticket.php" class="btn btn-primary col-12">Buy Ticket</a>
                                </div>
                            </div>
                        </li>

                        <li class="card col-10 col-sm-5 col-md-5 col-lg-3 mb-4 p-0 border border-1 ">
                            <div>
                                <div class="card-image rounded-top" style="background-image: url('bootstrap-config/images/cros.png'); background-size: contain; background-position: center center; background-repeat: no-repeat; height:14rem; background-size: cover; background-position: center;"></div>
                                <div class="card-body">
                                    <h5 class="card-title">Program: Cross It Concert</h5>
                                    <p class="card-text mb-0">Location: Palm Royal Beach</p>
                                    <p class="card-text mb-0">Time: Sat 30 2024, 8:30 PM GMT</p>
                                    <p class="card-text ">Price: GHC 50.00</p>
                                    <a href="#" class="btn btn-primary col-12">Buy Ticket</a>
                                </div>
                            </div>
                        </li>
                        <li class="card col-10 col-sm-5 col-md-5 col-lg-3 mb-4 p-0 border border-1 ">
                            <div>
                                <div class="card-image rounded-top" style="background: url('bootstrap-config/images/halloween.png'); background-size: contain; background-position: center center; background-repeat: no-repeat; height:14rem; background-size: cover; background-position: center;"></div>
                                <div class="card-body">
                                    <h5 class="card-title">Program: halloween City</h5>
                                    <p class="card-text mb-0">Location: Palm Royal Beach</p>
                                    <p class="card-text mb-0">Time: Sat 30 2024, 8:30 PM GMT</p>
                                    <p class="card-text ">Price: GHC 50.00</p>
                                    <a href="#" class="btn btn-primary col-12">Buy Ticket</a>
                                </div>
                            </div>
                        </li>
                        <li class="card col-10 col-sm-5 col-md-5 col-lg-3 mb-4 p-0 border border-1 ">
                            <div>
                                <div class="card-image rounded-top" style="background: url('bootstrap-config/images/double_wahala.jpg'); background-size: fit; background-position: center center;     background-repeat: no-repeat; height:14rem; background-size: cover; background-position: center;"></div>
                                <div class="card-body">
                                    <h5 class="card-title">Program: Inside Sin City</h5>
                                    <p class="card-text mb-0">Location: Palm Royal Beach</p>
                                    <p class="card-text mb-0">Time: Sat 30 2024, 8:30 PM GMT</p>
                                    <p class="card-text ">Price: GHC 50.00</p>
                                    <a href="#" class="btn btn-primary col-12">Buy Ticket</a>
                                </div>
                            </div>
                        </li>
                        <li class="card col-10 col-sm-5 col-md-5 col-lg-3 mb-4 p-0 border border-1 ">
                            <div>
                                <div class="card-image rounded-top" style="background: url('bootstrap-config/images/connect_jams.jpg'); background-size: contain; background-position: center center;     background-repeat: no-repeat; height:14rem; background-size: cover; background-position: center;"></div>
                                <div class="card-body">
                                    <h5 class="card-title">Program: Fashion & Dance</h5>
                                    <p class="card-text mb-0">Location: Palm Royal Beach</p>
                                    <p class="card-text mb-0">Time: Sat 30 2024, 8:30 PM GMT</p>
                                    <p class="card-text ">Price: GHC 50.00</p>
                                    <a href="#" class="btn btn-primary col-12">Buy Ticket</a>
                                </div>
                            </div>
                        </li>
                        <li class="card col-10 col-sm-5 col-md-5 col-lg-3 mb-4 p-0 border border-1 ">
                            <div>
                                <div class="card-image rounded-top" style="background: url('bootstrap-config/images/count_down.jpg'); background-size: contain; background-position: center center;     background-repeat: no-repeat; height:14rem; background-size: cover; background-position: center;"></div>
                                <div class="card-body">
                                    <h5 class="card-title">Program: The Count Down</h5>
                                    <p class="card-text mb-0">Location: Palm Royal Beach</p>
                                    <p class="card-text mb-0">Time: Sat 30 2024, 8:30 PM GMT</p>
                                    <p class="card-text ">Price: GHC 50.00</p>
                                    <a href="#" class="btn btn-primary col-12">Buy Ticket</a>
                                </div>
                            </div>
                        </li>
                    </ul>

                </div>
            </section>
        </div>
    </container>


</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</html>