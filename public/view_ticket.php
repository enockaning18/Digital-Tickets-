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

        <div class="container-lg p-0 shadow rounded overflow-hidden">
            <nav class="p-3 mx-auto d-none d-md-flex justify-content-between gap-2 mb-5">
                <div><a href="" class="text-decoration-none text-black"> Discover</a> </div>
                <div><a href="" class="text-decoration-none text-black"> Find Event</a></div>
                <div><a href="" class="text-decoration-none text-black"> Seal Tickets</a></div>
                <div><a href="" class="text-decoration-none text-black"> Private Event</a> </div>
                <div><a href="" class="text-decoration-none text-black"> Premium Event</a> </div>
                <div><a href="" class="text-decoration-none text-black"> Help Center</a> </div>
            </nav>

            <section class="mt-5 m-0 row d-flex justify-content-around">
                <div class="border col-sm-12 col-lg-5 p-0 rounded">
                    <div class="col">
                        <div class="">
                            <img src="bootstrap-config/images/ball.jpeg" style="width:100%; " alt="">
                        </div>
                        <div class="card-body p-2">
                            <h5 class="card-title fs-4 fw-bold">Program: Melbourne Cup</h5>
                            <div class="mt-3">
                                <p class="text-justify m-0 text-wrap fs-5">The Odartey Style and Fashion Awards (OSFAs) 2024 is the ultimate celebration of fashion excellence, creativity, and innovation in Ghana. This prestigious event is set to bring together the brightest stars of the fashion industry.</p>
                            </div>

                            <div class="">
                                <span class="text-justify text-wrap fs-5"> </br>Highlights of the Event:</br> Blackcarpet: Witness the grand arrival of fashion icons, celebrities, and industry leaders in their most stunning ensembles at 6pm</span>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="border col-sm-12 col-lg-5 d-flex flex-column rounded  p-0">
                    <div class="row-3">
                        <h3 class="py-4 px-3 fs-2 fw-bold">When</h3>
                        <div class="d-flex flex-column align-items-center">
                            <div class="d-flex mx-auto mb-3">
                                <h4 class="mb-0 fw-bolder fs-1">20</h4>
                                <div class="d-flex flex-column align-items-center my-auto">
                                    <div class="fw-bold" style="line-height:normal;">OCT</div>
                                    <div class="fw-bold" style="line-height:normal;">2024</div>
                                </div>
                            </div>

                            <div class="mb-3">
                                <span class="" style="letter-spacing: 3px;">6:30 PM - 11:00 PM</span>
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
                                <span class=" fs-3">Palms Royal Beach Accra</span>
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
                                    <div class="fs-5">Regular</div>
                                    <div class="fs-5">₵50.00</div>
                                </div>

                                <div class="d-flex justify-content-between border rounded mx-3 py-3 px-3" style="background-color: #F1F3F7;">
                                    <div class="fs-5">Standard</div>
                                    <div class="fs-5">₵90.00</div>
                                </div>
                                <div class="d-flex justify-content-between border rounded mx-3 py-3 px-3" style="background-color: #F1F3F7;">
                                    <div class="fs-5">VIP</div>
                                    <div class="fs-5">₵150.00</div>
                                </div>

                                <div class="d-flex justify-content-center gap-2 border rounded mx-3 mb-5 py-3 px-3 text-white" style="background-color: #C3063F;">
                                    <div style="rotate: 300deg;"><i class="bi bi-ticket-perforated fs-5"></i></div>
                                    <div class="fs-5">Get TIcket</div>
                                </div>
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
                                    <div>Okyere’s Awards</div>
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
</script>

</php>