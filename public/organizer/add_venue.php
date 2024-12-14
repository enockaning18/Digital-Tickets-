<?php include("../../private/initialize.php");
include(SHARED_PATH . "/organizer_header.php");
require_login();
$erros = [];
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $args = $_POST['venue'];
    if (empty($args['venue_name'])) {
        $erros[] = "Venue Name can't be empty";
    }
    if (empty($args['venue_address'])) {
        $erros[] = "Venue Address can't be empty";
    }
    if (empty($args['venue_city'])) {
        $erros[] = "Venue Name can't be empty";
    }
    if (empty($args['venue_region'])) {
        $erros[] = "Venue Name can't be empty";
    }
    if (empty($erros)) {
        $venue = new Venue($args);
        $result = $venue->create();
        if ($result === true) {
            echo "<script>
            document.addEventListener('DOMContentLoaded', function() {
                swal.fire({
                    title: 'Success!',
                    text: 'Venue added successfully!',
                    icon: 'success',
                    confirmButtonText: 'OK'
                }).then(function() {                
                    window.location.href = 'my_venue.php';                
                });
            });
        </script>";
        } else {
            $msg = "Error: ";
            $msg .= $database->error;
            exit($msg);
        }
    }
} else {
?>



    <div class="border col-md-12 col-lg-9 flex-column shadow-sm rounded 0-0 p-md-5">

        <?php if (!empty($erros)) { ?>

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
                                <?php foreach ($erros as $erros) { ?>
                                    <li><?php echo $erros; ?></li>
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
        <div class="card-body">
            <form id="venueForm" action="" method="POST" enctype="multipart/form-data">
                <h2 class="mb-4">Add a new venue</h2>
                <label for="venue_street" class="required mb-2">Venue Name</label>
                <input type="text" id="venue_translations_en_name" name="venue[venue_name]"  maxlength="70" pattern=".{1,}" class="form-control">

                <div class="form-section my-3">
                    <h4 class="section-title mb-3">Address Details</h4>
                    <div class="row">
                        <div class="form-group col-md-12 col-lg-6 mb-2">
                            <label for="venue_street" class="required mb-1">Venue Address</label>
                            <input type="text" id="venue_street" name="venue[venue_address]" class="form-control">
                        </div>

                        <div class="form-group col-md-12 col-lg-6 mb-2">
                            <label for="venue_city" class="required mb-1">City</label>
                            <input type="text" id="venue_city" name="venue[venue_city]" class="form-control">
                        </div>

                        <div class="form-group col-md-12 col-lg-6 mb-2">
                            <label for="venue_state" class="required mb-1">Region</label>
                            <input type="text" id="venue_state" name="venue[venue_region]" class="form-control">
                        </div>

                    </div>
                    <div class="form-group mt-4">
                        <button style="background-color:#C3063F" type="submit" id="venue_save" name="venue[save]" class="btn text-white">Add Venue</button>
                    </div>
                </div>
            </form>
        </div>

    </div>
    </section>
    </div>
    </container>

<?php }
?>
</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<style>
    .toggle-div {
        opacity: 0;
        max-height: 0;
        overflow: hidden;
        transition: opacity 0.5s ease, max-height 0.5s ease;
    }

    .toggle-div.show {
        opacity: 1;
        max-height: 500px;
        /* Set a max height for smooth transition */
    }
</style>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const modal = new bootstrap.Modal(document.getElementById('exampleModalToggle'));
        modal.show();
    });
</script>
<?php include(SHARED_PATH . "/organizer_footer.php"); ?>


</php>