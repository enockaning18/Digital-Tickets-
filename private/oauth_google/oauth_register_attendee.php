<?php include("../initialize.php");


if (isset($_GET['code'])) {
    $token = $attendee_signup->fetchAccessTokenWithAuthCode($_GET['code']);
    $attendee_signup->setAccessToken($token['access_token']);

    // get profile info
    $google_oauth = new Google_Service_Oauth2($attendee_signup);
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

    // checking if user is already exists in database
    $query_command = "SELECT * FROM oauth_google_attendee WHERE email ='{$userinfo['email']}'";
    $result = mysqli_query($database, $query_command);
    if (mysqli_num_rows($result) > 0) {
        // user is exists
        $userinfo = mysqli_fetch_assoc($result);
        $token = $userinfo['token'];
        echo "<script>
            document.addEventListener('DOMContentLoaded', function() {
                swal.fire({
                    title: 'Success! 🎉',
                    text: 'Login Successfully!',
                    icon: 'success',
                    confirmButtonText: 'OK'
                }).then(function() {
                    window.location.href = '../../public/index.php';
                });
            });
            </script>";
    } else {
        $oauth_google_user = new oauth_google_attendee($userinfo);
        $result = $oauth_google_user->create();
        if ($result) {
            $token = $userinfo['token'];
            echo "<script>
            document.addEventListener('DOMContentLoaded', function() {
                swal.fire({
                    title: 'Success! 🎉',
                    text: 'Sign up Successfully!',
                    icon: 'success',
                    confirmButtonText: 'OK'
                }).then(function() {
                    window.location.href = '../../public/index.php';
                });
            });
            </script>";
        } else {
            echo "User is not created";
            die();
        }
    }

    // save user data into session
    $_SESSION['user_token'] = $token;
} else {
    if (!isset($_SESSION['user_token']) && !isset($_SESSION['id'])) {
        // header("Location: ../index.php");
        // die();
    }

    // checking if user is already exists in database
    $query_command = "SELECT * FROM oauth_google_attendee WHERE token ='{$_SESSION['user_token']}'";
    $result = mysqli_query($database, $query_command);
    if (mysqli_num_rows($result) > 0) {
        // user is exists
        $userinfo = mysqli_fetch_assoc($result);
    }
}
