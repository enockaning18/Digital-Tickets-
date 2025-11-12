<?php include("../../private/initialize.php");
require_once("../../private/organizer_analysis.php");

include(SHARED_PATH . "/organizer_header.php");

if (isset($_GET['code'])) {
    $organizer_token = $client->fetchAccessTokenWithAuthCode($_GET['code']);
    $client->setAccessToken($organizer_token['access_token']);

    // get profile info
    $google_oauth = new Google_Service_Oauth2($client);
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
    $query_command = "SELECT * FROM oauth_google_users WHERE email ='{$userinfo['email']}'";
    $result = mysqli_query($database, $query_command);
    if (mysqli_num_rows($result) > 0) {
        // user is exists
        $userinfo = mysqli_fetch_assoc($result);
        $organizer_token = $userinfo['token'];
    } else {
        $oauth_google_user = new oauth_google_organizer($userinfo);
        $result = $oauth_google_user->create();
        if ($result) {
            $organizer_token = $userinfo['token'];
        } else {
            echo "User is not created";
            die();
        }
    }

    // save user data into session
    $_SESSION['organizer_token'] = $organizer_token;
} else {
    if (!isset($_SESSION['organizer_token']) && !isset($_SESSION['id'])) {
        header("Location: ../index.php");
        die();
    }

    // checking if user is already exists in database
    $query_command = "SELECT * FROM oauth_google_users WHERE token ='{$_SESSION['organizer_token']}'";
    $result = mysqli_query($database, $query_command);
    if (mysqli_num_rows($result) > 0) {
        // user is exists
        $userinfo = mysqli_fetch_assoc($result);
    }
}
require_login();


?>



<div class="border col-md-12 col-lg-9 d-flex flex-column shadow-sm rounded  p-5">
    <div class="">
        <h3 style="color:#C3063F;">Hello, <?php echo $session->organizer_name ?? $userinfo['organizer_name']; ?> !</h3>
        <p>Welcome back to your dashboard. Here is a summary of your recent activities and upcoming events <?php echo $userinfo['email'] ?? $session->organizer_name; ?></p>
    </div>

    <div class="d-flex flex-column">
        <div class="d-flex justify-content-between my-3">
            <div class="d-flex gap-2 align-items-center">
                <div><i class="bi bi-calendar2 fs-5 fw-bold"></i></div>
                <div class="fs-md-5 fw-bold">Events Summary</div>
            </div>

            <div class="d-flex gap-2 align-items-center">
                <div><i class="bi bi-gear-wide-connected" style="color:#31708f;"></i></div>
                <div class="fw-bold" style="color:#31708f;">Edit Event</div>
            </div>
        </div>

        <div class="d-flex justify-content-around row my-3">
            <div class="col-lg-3 px-3 py-1 border rounded shadow-sm text-white" style="background-color: #FEB372;">
                <div class="d-flex justify-content-between align-items-end">
                    <div> </div>
                    <div> <i class="bi bi-folder-plus fs-5"></i></div>
                </div>

                <div class="d-flex flex-column gap-1 align-items-center mb-2">
                    <div><span class="fw-bold fs-2"><?php echo $fetch_all_events ?></span></div>
                    <div class="">Events Added</div>
                </div>
            </div>
            <div class="col-lg-3 px-3 py-1 border rounded shadow-sm text-white" style="background-color: #BFC9C6;">
                <div class="d-flex justify-content-between align-items-end">
                    <div> </div>
                    <div> <i class="bi bi-globe-americas fs-5"></i></div>
                </div>

                <div class="d-flex flex-column gap-1 align-items-center mb-2">
                    <div><span class="fw-bold fs-2"><?php echo $fetch_publish_events ?></span></div>
                    <div class="">Published Event</div>
                </div>
            </div>
            <div class="col-lg-3 px-3 py-1 border rounded shadow-sm text-white" style="background-color: #96A5A0;">
                <div class="d-flex justify-content-between align-items-end">
                    <div> </div>
                    <div> <i class="bi bi-calendar-check fs-5"></i></div>
                </div>

                <div class="d-flex flex-column gap-1 align-items-center mb-2">
                    <div><span class="fw-bold fs-2"><?php echo $fetch_draft_events ?></span></div>
                    <div class="">Upcoming Events</div>
                </div>
            </div>
        </div>
    </div>

    <div class="d-flex flex-column">
        <div class="d-flex justify-content-between my-3">
            <div class="d-flex gap-2 align-items-center">
                <div><i class="bi bi-cart4 fs-5 fw-bold"> </i></div>
                <div class="fs-md-5 fw-bold" class="font-size:13px">Attendees Summary</div>
            </div>

            <div class="d-flex gap-2 align-items-center">
                <div><i class="bi bi-people-fill" style="color:#31708f;"></i></div>
                <div class="fw-bold" style="color:#31708f;">Manage Attendees</div>
            </div>
        </div>

        <div class="d-flex justify-content-around row my-3">
            <div class="col-lg-3 px-3 py-1 border rounded shadow-sm text-white" style="background-color: #429596;">
                <div class="d-flex justify-content-between align-items-end">
                    <div> </div>
                    <div> <i class="bi bi-cart2 fs-5"></i></div>
                </div>

                <div class="d-flex flex-column gap-1 align-items-center mb-2">
                    <div><span class="fw-bold fs-2"><?php echo $fetch_all_orders ?></span></div>
                    <div class="">Orders Placed</div>
                </div>
            </div>
            <div class="col-lg-3 px-3 py-1 border rounded shadow-sm text-white" style="background-color: #F3D9B5;">
                <div class="d-flex justify-content-between align-items-end">
                    <div> </div>
                    <div> <i class="bi bi bi-wallet2 fs-5"></i></div>
                </div>

                <div class="d-flex flex-column gap-1 align-items-center mb-2">
                    <div><span class="fw-bold fs-2"><?php echo $fetch_payed_ticket ?></span></div>
                    <div class="">Payed Orders</div>
                </div>
            </div>
            <div class="col-lg-3 px-3 py-1 border rounded shadow-sm text-white" style="background-color: #CF8D51;">
                <div class="d-flex justify-content-between align-items-end">
                    <div> </div>
                    <div> <i class="bi bi-ticket-detailed fs-5"></i></div>
                </div>

                <div class="d-flex flex-column gap-1 align-items-center mb-2">
                    <div><span class="fw-bold fs-2"><?php echo $fetch_payed_ticket ?></span></div>
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

<?php include(SHARED_PATH . "/organizer_footer.php"); ?>




</php>