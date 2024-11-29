<?php
include("../../private/initialize.php");
include(SHARED_PATH . "/attendee_header.php");

if (isset($_POST['save'])) {
    $args = [];
    $args['email'] = $_POST['email'] ?? NULL;
    $args['username'] = $_POST['username'] ?? NULL;
    $args['name'] = $_POST['name'] ?? NULL;
    $args['phone'] = $_POST['phone'] ?? NULL;
    $args['birthdate'] = $_POST['birthdate'] ?? NULL;

    $attendee = new Attendee($args);
    $result = $attendee->create();
    if ($result === true) {
        echo "added";
        // $new_id = $attendee->attendee_id;
        // $_SESSION['message'] = "New Attendee Added";

    } else {
        // show error
    }
}
?>

<div class="border col-md-12 col-lg-9 d-flex flex-column shadow-sm rounded  p-5">
    <div class="card-body">

        <form action="" method="POST" enctype="multipart/form-data">
            <div id="account_settings">
                <div class="form-group mb-3">
                    <label for="account_settings_email" class="required">Email</label>
                    <input type="email" id="account_settings_email" name="email" required="required" class="form-control">
                </div>

                <div class="form-group mb-3">
                    <label for="account_settings_username" class="required">Username</label>
                    <input type="text" id="account_settings_username" name="username" required="required" class="form-control">
                </div>

                <div class="form-group mb-3">
                    <label for="account_settings_firstname" class="required">Name</label>
                    <input type="text" id="account_settings_firstname" name="name" required="required" class="form-control">
                </div>

                <div class="form-group mb-3">
                    <label for="account_settings_phone">Phone number</label>
                    <input type="number" id="account_settings_phone" name="phone" class="form-control">
                </div>

                <div class="form-group mb-3">
                    <label for="account_settings_birthdate">Birthdate</label>
                    <input type="date" id="account_settings_birthdate" name="birthdate" class="datepicker form-control">
                </div>

                <!-- <div class="form-group mb-3">
                    <label class="col-form-label">Profile picture</label>
                    <div class="">
                        <input type="file" name="image" id="upload" class="account-file-input form-control p-2" required="required" maxlength="100" />
                    </div>
                </div> -->

                <div class="form-group ">
                    <button type="submit" id="account_settings_save" name="save" class="btn btn-primary btn">Save Changes</button>
                </div>
        </form>
    </div>




</div>
</section>
</div>
</container>


</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<?php include(SHARED_PATH . "/attendee_footer.php"); ?>





</php>