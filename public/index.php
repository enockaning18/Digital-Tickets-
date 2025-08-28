<?php require_once('../private/initialize.php');
$event = Event::find_event_published();
error_reporting(E_ALL);
ini_set('display_errors', 1);

?>

<!DOCTYPE html>
<html lang="en" class="light-style layout-menu-fixed layout-compact" dir="ltr" data-theme="theme-default" data-template="vertical-menu-template-free">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>Team Event</title>
    <link rel="icon" type="image/ico" sizes="50x50" href="../qr-code.ico">

    <link rel="icon" type="image" href="" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet" />
    <link rel="stylesheet" src="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="../bootstrap-config/css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Exo+2:wght@100..900&display=swap" rel="stylesheet">
</head>

<body style="font-family:'Exo 2','sans-serif';">

    

    <section style="background-color: rgb(5, -0, 10);">
        <header class=" container d-flex justify-content-between align-items-center py-3">
            <div>
                <img src="../bootstrap-config/images/retina-logo.png" alt="">
            </div>
            <div class="d-flex gap-4 justify-content-between">
                <div><a class="text-decoration-none text-white fs-5" href="">Discover</a></div>
                <div><a class="text-decoration-none text-white fs-5" href="">Find Event</a></div>
                <div><a class="text-decoration-none text-white fs-5" href="">Seal Ticket</a></div>
                <div><a class="text-decoration-none text-white fs-5" href="">Private Event</a></div>
                <div><a class="text-decoration-none text-white fs-5" href="">Premium Event</a></div>
            </div>
        </header>
    </section>

    <section class="position-relative">
        <div> <img style="width: 100%; height:500px" class="img-fluid" src="../bootstrap-config/images/parallax8.jpg" alt=""></div>

        <div class="curved-bottom position-absolute" style="z-index: 1;">
            <svg viewBox="0 0 1440 100" class="" preserveAspectRatio="none">
                <path d="M0,64L80,58.7C160,53,320,43,480,53.3C640,64,800,96,960,96C1120,96,1280,64,1360,48L1440,32L1440,320L1360,320C1280,320,1120,320,960,320C800,320,640,320,480,320C320,320,160,320,80,320L0,320Z" fill="#fff" />
            </svg>
        </div>
    </section>

    <section>
        <?php foreach ($event as $event) { ?>
            <div class="row container mx-auto justify-content-between" style="margin-top: 5em;">
                <div class="col-md-6 col-sm-6 col-lg-6 my-3" style="max-width: 600px;">
                    <div class="overflow-hidden position-relative ">
                        <a class="figure_img" href="event-detail.html" title=""><img class="img-fluid" style="height:400px; width:100%" src="organizer/uploads/<?php echo $event->image ?>" alt="Event Image 1"></a>
                        <div class="event_date position-absolute text-white d-flex align-items-center" style="bottom: 0; left: 0; background-color:#e82277;">
                            <i class="bi bi-clock me-3 fw-bold fs-1"></i>
                            <div>
                                <div class="fw-bold">Mon 21 Sep 2020</div>
                                <div>From 5:30pm</div>
                            </div>
                        </div>
                    </div>
                    <div class="my-4 ">
                        <h3 class=" fw-bolder" stye="color:#2B2859;"><?php echo $event->event_name ?></h3>
                        <p style="width: 500px">Lorem ipsum dolor sit amet, consecte piscing elit, sed do eius mod didunt labor iqua sed piscing.</p>
                        <hr style="width:20%">
                        <i class="bi bi-geo-fill fw-bolder"> </i><?php echo $event->event_venue ?>
                        <div class="d-flex my-3">
                            <button style="color:#e82277; border-color:#e82277;" class="btn btn-pramary px-5 py-2 fs-5 align-items-center fw-bold "> <i class="bi bi-ticket-perforated-fill fs-5 me-2"></i>Book Your Ticket</button>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 col-lg-6 my-3" style="max-width: 600px;">
                    <div class="overflow-hidden position-relative ">
                        <a class="figure_img" href="event-detail.html" title=""><img class="img-fluid" style="height:400px; width:100%" src="organizer/uploads/<?php echo $event->image ?>" alt="Event Image 1"></a>
                        <div class="event_date position-absolute text-white d-flex align-items-center" style="bottom: 0; left: 0; background-color:#e82277;">
                            <i class="bi bi-clock me-3 fw-bold fs-1"></i>
                            <div>
                                <div class="fw-bold">Mon 21 Sep 2020</div>
                                <div>From 5:30pm</div>
                            </div>
                        </div>
                    </div>
                    <div class="my-4 ">
                        <h3 class=" fw-bolder" stye="color:#2B2859;"><?php echo $event->event_name ?></h3>
                        <p style="width: 500px">Lorem ipsum dolor sit amet, consecte piscing elit, sed do eius mod didunt labor iqua sed piscing.</p>
                        <hr style="width:20%">
                        <i class="bi bi-geo-fill fw-bolder"> </i><?php echo $event->event_venue ?>
                        <div class="d-flex my-3">
                            <button style="color:#e82277; border-color:#e82277;" class="btn btn-pramary px-5 py-2 fs-5 align-items-center fw-bold "> <i class="bi bi-ticket-perforated-fill fs-5 me-2"></i>Book Your Ticket</button>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 col-lg-6 my-3" style="max-width: 600px;">
                    <div class="overflow-hidden position-relative ">
                        <a class="figure_img" href="event-detail.html" title=""><img class="img-fluid" style="height:400px; width:100%" src="organizer/uploads/<?php echo $event->image ?>" alt="Event Image 1"></a>
                        <div class="event_date position-absolute text-white d-flex align-items-center" style="bottom: 0; left: 0; background-color:#e82277;">
                            <i class="bi bi-clock me-3 fw-bold fs-1"></i>
                            <div>
                                <div class="fw-bold">Mon 21 Sep 2020</div>
                                <div>From 5:30pm</div>
                            </div>
                        </div>
                    </div>
                    <div class="my-4 ">
                        <h3 class=" fw-bolder" stye="color:#2B2859;"><?php echo $event->event_name ?></h3>
                        <p style="width: 500px">Lorem ipsum dolor sit amet, consecte piscing elit, sed do eius mod didunt labor iqua sed piscing.</p>
                        <hr style="width:20%">
                        <i class="bi bi-geo-fill fw-bolder"> </i><?php echo $event->event_venue ?>
                        <div class="d-flex my-3">
                            <button style="color:#e82277; border-color:#e82277;" class="btn btn-pramary px-5 py-2 fs-5 align-items-center fw-bold "> <i class="bi bi-ticket-perforated-fill fs-5 me-2"></i>Book Your Ticket</button>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 col-lg-6 my-3" style="max-width: 600px;">
                    <div class="overflow-hidden position-relative ">
                        <a class="figure_img" href="event-detail.html" title=""><img class="img-fluid" style="height:400px; width:100%" src="organizer/uploads/<?php echo $event->image ?>" alt="Event Image 1"></a>
                        <div class="event_date position-absolute text-white d-flex align-items-center" style="bottom: 0; left: 0; background-color:#e82277;">
                            <i class="bi bi-clock me-3 fw-bold fs-1"></i>
                            <div>
                                <div class="fw-bold">Mon 21 Sep 2020</div>
                                <div>From 5:30pm</div>
                            </div>
                        </div>
                    </div>
                    <div class="my-4 ">
                        <h3 class=" fw-bolder" stye="color:#2B2859;"><?php echo $event->event_name ?></h3>
                        <p style="width: 500px">Lorem ipsum dolor sit amet, consecte piscing elit, sed do eius mod didunt labor iqua sed piscing.</p>
                        <hr style="width:20%">
                        <i class="bi bi-geo-fill fw-bolder"> </i><?php echo $event->event_venue ?>
                        <div class="d-flex my-3">
                            <button style="color:#e82277; border-color:#e82277;" class="btn btn-pramary px-5 py-2 fs-5 align-items-center fw-bold "> <i class="bi bi-ticket-perforated-fill fs-5 me-2"></i>Book Your Ticket</button>
                        </div>
                    </div>
                </div>




            </div>
        <?php } ?>
    </section>



    <section>
        <footer class="footer-hero-section text-light pt-5 pb-4">
            <div class="container">
                <div class="row gy-4">

                    <!-- Column 1: Email Signup -->
                    <div class="col-md-4">
                        <h5 class="fw-bold">Email Sign Up</h5>
                        <p class="small">Subscribe for updates & special offers!</p>
                        <form class="d-flex">
                            <input type="email" class="form-control me-2" placeholder="Enter your email">
                            <button type="submit" class="btn btn-primary">
                                Subscribe
                            </button>
                        </form>
                    </div>

                    <!-- Column 2: Links -->
                    <div class="col-md-4">
                        <h5 class="fw-bold">Quick Links</h5>
                        <div class="row">
                            <div class="col-6">
                                <ul class="list-unstyled small">
                                    <li><a href="#" class="text-light text-decoration-none">Accessibility</a></li>
                                    <li><a href="#" class="text-light text-decoration-none">Affiliates</a></li>
                                    <li><a href="#" class="text-light text-decoration-none">Careers</a></li>
                                    <li><a href="#" class="text-light text-decoration-none">Coach Hire</a></li>
                                    <li><a href="#" class="text-light text-decoration-none">Luggage Policy</a></li>
                                </ul>
                            </div>
                            <div class="col-6">
                                <ul class="list-unstyled small">
                                    <li><a href="#" class="text-light text-decoration-none">Press Room</a></li>
                                    <li><a href="#" class="text-light text-decoration-none">Privacy Centre</a></li>
                                    <li><a href="#" class="text-light text-decoration-none">Rail Disruption</a></li>
                                    <li><a href="#" class="text-light text-decoration-none">Blog</a></li>
                                    <li><a href="#" class="text-light text-decoration-none">Safety</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <!-- Column 3: Social / Tracker -->
                    <div class="col-md-4">
                        <h5 class="fw-bold">Coach Tracker</h5>
                        <p class="small mb-2">Track your coach in real time.</p>
                        <div class="d-flex gap-3">
                            <a href="#" class="text-light fs-5"><i class="bi bi-facebook"></i></a>
                            <a href="#" class="text-light fs-5"><i class="bi bi-twitter"></i></a>
                            <a href="#" class="text-light fs-5"><i class="bi bi-instagram"></i></a>
                            <a href="#" class="text-light fs-5"><i class="bi bi-youtube"></i></a>
                        </div>
                    </div>

                </div>

                <hr class="border-light my-4">

                <!-- Bottom row -->
                <div class="text-center small">
                    <p class="mb-0">&copy; 2025 Event App. All rights reserved.</p>
                </div>
            </div>
        </footer>

        <!-- Bootstrap Icons -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">

    </section>


</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</html>