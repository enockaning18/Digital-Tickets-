<?php
include("../private/initialize.php");

$errors = [];

if (isset($_POST['auth_register_organizer'])) {
    $args = $_POST['organizer'];

    if (empty($args['organizer_phone'])) {
        $errors[] = "Phone Number can't be empty";
    }
    if (empty($args['organizer_name'])) {
        $errors[] = "Name can't be empty";
    }
    if (empty($args['organizer_email'])) {
        $errors[] = "Email can't be empty";
    }
    if (empty($args['organizer_password'])) {
        $errors[] = "Password can't be empty";
    }

    if (empty($errors)) {
        $organizer = new Organizer($args);
        $results = $organizer->create();
        if ($results === true) {
            echo "<script>
            document.addEventListener('DOMContentLoaded', function() {
                swal.fire({
                    title: 'Success!🎉',
                    text: 'Login Successfully!',
                    icon: 'success',
                    confirmButtonText: 'OK'
                }).then(function() {                
                    window.location.href = 'organizer/organizer_dashboard.php';                
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

?>

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

            <div class="d-none d-md-flex">
                <button class="btn btn-outline-primary border-0" type="submit">
                    <div class="nav-item dropdown">
                        <a class="nav-link " href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Login
                        </a>
                        <div class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Attendee</a></li>
                            <li><a class="dropdown-item" href="#">Organizer</a></li>
                        </div>
                    </div>
                </button>

                <button class="btn btn-outline-primary border-0" type="submit">
                    <div class="nav-item dropdown">
                        <a class="nav-link " href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Signup
                        </a>
                        <div class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Attendee</a></li>
                            <li><a class="dropdown-item" href="#">Organizer</a></li>
                        </div>
                    </div>
                </button>
            </div>

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

        <div class=" p-0 container-md">
            <nav class="p-3 mx-auto d-none d-md-flex justify-content-between gap-2 mb-5">
                <div><a href="" class="text-decoration-none text-black"> Discover</a> </div>
                <div><a href="" class="text-decoration-none text-black"> Find Event</a></div>
                <div><a href="" class="text-decoration-none text-black"> Seal Tickets</a></div>
                <div><a href="" class="text-decoration-none text-black"> Private Event</a> </div>
                <div><a href="" class="text-decoration-none text-black"> Premium Event</a> </div>
                <div><a href="" class="text-decoration-none text-black"> Help Center</a> </div>
            </nav>
        </div>
    </container>


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
    <div class="container">
        <div class="row">
            <div class="col-12 mb-5">
                <h2 class="text-center" style="font-size:34px; font-weight:600; margin-bottom: 20px; color: #FD6C5D;">Join over 5000 event creators who trust us!</h2>
                <h3 class="text-center" style="font-size:18px; font-weight:500; color: #343a40;">Creating an account is free and gets your event live in minutes.</h3>
            </div>
            <div class="col-xl-5 offset-xl-1 d-none d-xl-block">
                <img src="../register-organizer.webp" class="img-fluid">
            </div>
            <div class="col-xl-4 col-12">
                <form id="auth_register_organizer" action="" method="POST" enctype="multipart/form-data">

                    <div class="form-group input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text border-0"> <i class="bi bi-person-vcard-fill p-1"></i> </span>
                        </div>
                        <input type="text" id="organizer_name" name="organizer[organizer_name] " placeholder="Organization / Individual Name" class="form-control border border-start-0">

                    </div>
                    <div class="form-group input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text border-0"> <i class="bi bi-person-lines-fill p-1"></i> </span>
                        </div>
                        <input type="text" id="organizer_phone" name="organizer[organizer_phone]" placeholder="Mobile Number" class="form-control border border-start-0">

                    </div>
                    <div class="form-group input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text border-0"> <i class="bi bi-envelope-check p-1"></i> </span>
                        </div>
                        <input type="email" id="organizer_email" name="organizer[organizer_email]" placeholder="Email" class="form-control border border-start-0">

                    </div>
                    <div class="form-group input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text border-0"> <i class="bi bi-shield-fill-exclamation p-1"></i> </span>
                        </div>
                        <input type="password" id="organizer_password" name="organizer[organizer_password]" placeholder="Password" autocomplete="new-password" class="form-control border border-start-0">

                    </div>
                    <!-- <div class="form-group mb-3">
                        <script type="text/javascript" src="https://www.google.com/recaptcha/api.js?hl=en"></script>
                        <div class="g-recaptcha" data-theme="light" data-size="normal" data-type="image" data-sitekey="6LdbD5sqAAAAAHNS7pGd81QxcS3mQXQecaYied4B">
                            <div style="width: 304px; height: 78px;">
                                <div><iframe title="reCAPTCHA" width="304" height="78" role="presentation" name="a-cmotzctoecy0" frameborder="0" scrolling="no" sandbox="allow-forms allow-popups allow-same-origin allow-scripts allow-top-navigation allow-modals allow-popups-to-escape-sandbox allow-storage-access-by-user-activation" src="https://www.google.com/recaptcha/api2/anchor?ar=1&amp;k=6LeEr8AbAAAAAJSpio6vJaG5AOT6pNRTZ2aOukhV&amp;co=aHR0cHM6Ly9heWF0aWNrZXRzLmNvbTo0NDM.&amp;hl=en&amp;type=image&amp;v=zIriijn3uj5Vpknvt_LnfNbF&amp;theme=light&amp;size=normal&amp;cb=7vsgy1zdrod8"></iframe></div><textarea id="g-recaptcha-response" name="g-recaptcha-response" class="g-recaptcha-response" style="width: 250px; height: 40px; border: 1px solid rgb(193, 193, 193); margin: 10px 25px; padding: 0px; resize: none; display: none;"></textarea>
                            </div><iframe style="display: none;"></iframe>
                        </div>
                        <noscript>
                            <div style="width: 302px; height: 352px;">
                                <div style="width: 302px; height: 352px; position: relative;">
                                    <div style="width: 302px; height: 352px; position: absolute;">
                                        <iframe src="https://www.google.com/recaptcha/api/fallback?k=6LdbD5sqAAAAABJGXKNWYAXdga3Lp1S3fsd5xaqo" frameborder="0" scrolling="no" style="width: 302px; height:352px; border-style: none;"></iframe>
                                    </div>
                                    <div style="width: 250px; height: 80px; position: absolute; border-style: none; bottom: 21px; left: 25px; margin: 0; padding: 0; right: 25px;">
                                        <textarea id="g-recaptcha-response" name="g-recaptcha-response" class="g-recaptcha-response" style="width: 250px; height: 80px; border: 1px solid #c1c1c1; margin: 0; padding: 0; resize: none;"></textarea>
                                    </div>
                                </div>
                            </div>
                        </noscript>

                    </div> -->
                    <div class="mb-3 text-sm text-center">
                        <span class="text-muted">By clicking the 'Create Account' button, I agree to Team Events'</span>
                        <a href="#" target="_blank">Terms of Service</a>
                        <span class="text-muted">and</span>
                        <a href="#" target="_blank">Privacy Policy</a>
                    </div>

                    <div class="form-group row mb-3">
                        <button type="submit" name="auth_register_organizer" class=" col btn btn-primary btn-block p-2">Create Account</button>
                    </div>
                    <p class="text-center">Already have an account? <a href="auth_login.php">Sign in</a></p>
                    <a href="<?php echo $client->createAuthUrl() ?> ">Google Login</a>;
                </form>
            </div>
        </div>
    </div>
</body>

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const modal = new bootstrap.Modal(document.getElementById('exampleModalToggle'));
        modal.show();
    });
</script>


</html>
<script src="../bootstrap-config/sweetalert2/jquery-3.7.1.min.js"></script>
<script src="../bootstrap-config/sweetalert2/sweetalert2.all.min.js"></script>