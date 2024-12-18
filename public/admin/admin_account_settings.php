<?php
include("../../private/initialize.php");
include(SHARED_PATH . "/admin_header.php");

?>

<div class="border col-md-12 col-lg-9 d-flex flex-column shadow-sm rounded  p-5">
    <div class="card-body">
        <form action="" method="POST" enctype="multipart/form-data">
            <div id="account_settings">
                <div class="form-group mb-3">
                    <label for="account_settings_email" class="required">Name</label>
                    <input type="text" id="admin_name" name="admin[admin_name] " class="form-control ">
                </div>

                <div class="form-group mb-3">
                    <label for="account_settings_username" class="required">Mobile Number</label>
                    <input type="text" id="admin_phone" name="admin[admin_phone]" class="form-control ">
                </div>

                <div class="form-group mb-3">
                    <label for="account_settings_password" class="required">Email</label>
                    <input type="email" id="admin_email" name="admin[admin_email]" class="form-control ">
                </div>

                <div class="form-group col-12 mb-2">
                    <label for="event_event" class="mb-3" require>Upload Events Image</label>
                    <input type="file" name="image" id="upload" class="account-file-input form-control p-2" name="event[image]" maxlength="100" />
                </div>


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

<?php include(SHARED_PATH . "/organizer_footer.php"); ?>