<?php include("../initialize.php");

if (isset($_GET['code'])) {
    $token = $attendee_organizer->fetchAccessTokenWithAuthCode($_GET['code']);
    $attendee_organizer->setAccessToken($token['access_token']);

    // Get profile info
    $google_oauth = new Google_Service_Oauth2($attendee_organizer);
    $google_account_info = $google_oauth->userinfo->get();
    $userinfo = [
        'email' => $google_account_info['email'],
        'first_name' => $google_account_info['givenName'],
        'last_name' => $google_account_info['familyName'],
        'organizer_name' => $google_account_info['name'],
        'picture' => $google_account_info['picture'],
        'verifiedEmail' => $google_account_info['verifiedEmail'],
        'token' => $google_account_info['id'],
    ];

    // Check if user exists in `oauth_google_users` table
    $query_command = "SELECT * FROM oauth_google_users WHERE email ='{$userinfo['email']}'";
    $result = mysqli_query($database, $query_command);

    if (mysqli_num_rows($result) > 0) {
        // User exists in `oauth_google_users`
        $userinfo = mysqli_fetch_assoc($result);
        $token = $userinfo['token'];
        // Save user data into session
        $_SESSION['organizer_token'] = $token;
        // $session->login($token);
        echo "<script>
            document.addEventListener('DOMContentLoaded', function() {
                swal.fire({
                    title: 'Success! 🎉',
                    text: 'Organizer Successfully Login!',
                    icon: 'success',
                    confirmButtonText: 'OK'
                }).then(function() {
                    window.location.href = '../../public/index.php';
                });
            });
            </script>";
    } else {
        // Check if user exists in `oauth_google_attendee` table
        $query_command = "SELECT * FROM oauth_google_attendee WHERE email ='{$userinfo['email']}'";
        $result = mysqli_query($database, $query_command);

        if (mysqli_num_rows($result) > 0) {
            // User exists in `oauth_google_attendee`
            $userinfo = mysqli_fetch_assoc($result);
            $token = $userinfo['token'];
            // Save user data into session
            $_SESSION['attendee_token'] = $token;
            // $attendee_session->login($token);
            echo "<script>
                document.addEventListener('DOMContentLoaded', function() {
                    swal.fire({
                        title: 'Success! 🎉',
                        text: 'Attendee Successfully Login!',
                        icon: 'success',
                        confirmButtonText: 'OK'
                    }).then(function() {
                        window.location.href = '../../public/index.php';
                    });
                });
                </script>";
        } else {
            // User not found in either table
            echo "<script>
                document.addEventListener('DOMContentLoaded', function() {
                    swal.fire({
                        title: 'Error! ❌',
                        text: 'Unable to Login!',
                        icon: 'error',
                        confirmButtonText: 'OK'
                    }).then(function() {
                        window.location.href = '../../public/index.php';
                    });
                });
                </script>";
        }
    }
} else {
    if (!isset($_SESSION['user_token']) && !isset($_SESSION['id'])) {
        die();
    }

    // Check if user exists in `oauth_google_users` table
    $query_command = "SELECT * FROM oauth_google_users WHERE token ='{$_SESSION['user_token']}'";
    $result = mysqli_query($database, $query_command);

    if (mysqli_num_rows($result) > 0) {
        // User exists in `oauth_google_users`
        $userinfo = mysqli_fetch_assoc($result);
    } else {
        // Check if user exists in `oauth_google_attendee` table
        $query_command = "SELECT * FROM oauth_google_attendee WHERE token ='{$_SESSION['user_token']}'";
        $result = mysqli_query($database, $query_command);

        if (mysqli_num_rows($result) > 0) {
            // User exists in `oauth_google_attendee`
            $userinfo = mysqli_fetch_assoc($result);
        }
    }
}
