<?php
include("../private/initialize.php");

$errors = [];
if (isset($_POST['auth_login'])) {
    $email = $_POST['organizer_email'];
    $password = $_POST['organizer_password'];

    // Validate input
    if (empty($email)) {
        $errors[] = "Email can't be empty";
    }
    if (empty($password)) {
        $errors[] = "Password can't be empty";
    }

    // Proceed only if there are no errors
    if (empty($errors)) {
        $organizer = Organizer::find_by_organizer_email($email);

        if ($organizer && $organizer->verify_password($password)) {

            $session->login($organizer);
            echo "<script>
            document.addEventListener('DOMContentLoaded', function() {
                swal.fire({
                    title: 'Success! 🎉',
                    text: 'Login Successfully!',
                    icon: 'success',
                    confirmButtonText: 'OK'
                }).then(function() {
                    window.location.href = 'organizer/organizer_dashboard.php';
                });
            });
            </script>";
        } else {
            // Error message for incorrect email or password
            echo "<script>
            document.addEventListener('DOMContentLoaded', function() {
                swal.fire({
                    title: 'Error! ❌',
                    text: 'Invalid email or password!',
                    icon: 'error',
                    confirmButtonText: 'OK'
                });
            });
            </script>";
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
            <div class="col-12 col-lg-4 offset-lg-4 mt-5 ">

                <div class="col-12 mb-5 text-center">
                    <h2 style="font-size:24px; font-weight:600; color: #333;">Welcome back!</h2>
                    <p style="font-size:18px; font-weight:400; color: #333;">We're glad to see you again 👋</p>
                </div>
                <form id="auth_login_form" action="" method="POST" enctype="multipart/form-data">

                    <div class="form-group mb-3">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text border-0"> <i class="bi bi-person-check-fill p-1"></i> </span>
                            </div>
                            <input name="organizer_email" value="" class="form-control" placeholder="Mobile Number / Email / Username" type="text">
                        </div>
                    </div>

                    <div class="form-group mb-3">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text border-0"><i class="bi bi-shield-lock-fill p-1"></i> </span>
                            </div>
                            <input name="organizer_password" class="form-control" placeholder="Password" type="password">
                        </div>
                    </div>

                    <div class="form-group mb-3">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="remember_me" name="_remember_me" value="on">
                            <label class="custom-control-label" for="remember_me">Remember me</label>
                        </div>
                    </div>


                    <div class="form-group mb-3 row">
                        <button type="submit" name="auth_login" class="btn btn-primary btn-block col-12">Sign in</button>
                    </div>
                    <p class="text-center"><a href="/en/resetting/request">Forgot your password ?</a></p>
                    <p class="text-center">Not a member yet ? <a href="/en/signup/attendee" class="text-primary _600">Sign up</a></p>
                    <p class="text-center">Hosting an event ? <a href="auth_register_organizer.php" class="text-primary _600">Sign up as an organizer</a></p>

                </form>

            </div>
        </div>
    </div>
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

</html>