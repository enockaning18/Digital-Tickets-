<?php
include("../../private/initialize.php");
include(SHARED_PATH . "/attendee_header.php");


if (isset($_POST['save'])) {
    $args = $_POST['attendee'];
    $attendee = new Attendee($args);
    $result = $attendee->create_new_attendee();
    if ($result === true) {
        echo "Attendee added successfully!";
        // header('Location: account_settings.php');
    } else {
        $msg = "error :";
        $msg .= $database->error;
        exit($msg);
    }
} else {

?>

    <div class="border col-md-12 col-lg-9 d-flex flex-column shadow-sm rounded  p-5">
        <div class="card-body">
            <form action="" method="POST" enctype="multipart/form-data">
                <div id="account_settings">

                    <div class="form-group mb-3">
                        <label for="account_settings_name" class="required">Name</label>
                        <input type="text" id="account_settings_name" name="attendee[name]" class="form-control">
                    </div>

                    <div class="form-group mb-3">
                        <label for="account_settings_username" class="required">Username</label>
                        <input type="text" id="account_settings_username" name="attendee[username]" class="form-control">
                    </div>

                    <div class="form-group mb-3">
                        <label for="account_settings_email" class="required">Email</label>
                        <input type="email" id="account_settings_email" name="attendee[email]" class="form-control">
                    </div>

                    <div class="form-group mb-3">
                        <label for="account_settings_phone">Phone number</label>
                        <input type="number" id="account_settings_phone" name="attendee[phone]" class="form-control">
                    </div>

                    <div class="form-group mb-3 d-none">
                        <label for="account_settings_password hidden" class="required">Password</label>
                        <input type="hidden" id="account_settings_password" name="attendee[password]" class="form-control">
                    </div>

                    <div class="form-group ">
                        <button type="submit" id="account_settings_save" name="save" class="btn btn-primary btn">Save Changes</button>
                    </div>
            </form>
        </div>


        <?php
        $modal_id = 'modal_' . preg_replace('/[^A-Za-z0-9\_]/', '', '661661122');
        ?>

        <div class="row">
            <!-- Modal -->
            <div class="modal fade" id="<?php echo $modal_id; ?>" aria-hidden="true" aria-labelledby="<?php echo $modal_id; ?>message" tabindex="-1">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="<?php echo $modal_id; ?>message">Contact Organizer</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <p>Contact form or organizer details go here.</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Button -->
            <div class="col-md-6 mb-4 d-none d-md-block">
                <div class="card shadow-sm border-0">
                    <div class="card-body p-4">
                        <span class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#<?php echo $modal_id; ?>">Contact Organizer
                        </span>
                    </div>
                </div>
            </div>
        </div>




    </div>
    </section>
    </div>
    </container>
<?php } ?>

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<?php include(SHARED_PATH . "/attendee_footer.php"); ?>