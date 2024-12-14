<?php include("../../private/initialize.php");
include(SHARED_PATH . "/organizer_header.php");
$id = $_GET['id'] ?? 'null';
$venue = Venue::find_all();


?>


<div class="border col-md-12 col-lg-9 flex-column shadow-sm rounded 0-0 p-md-5">
    <div class="d-block d-md-flex  justify-content-between align-items-center  py-3 px-4 border rounded shadow-sm" style="background-color: #ffffff;">
        <!-- Results Found -->
        <div class="text-muted mb-2 mb-md-0">
            <strong>1</strong> result(s) found
        </div>

        <div class="d-flex align-items-center mb-2 mb-md-0">
            <label for="event_category" class="mb-0 me-2 fw-bold text-secondary">Sort by:</label>
            <select class="form-select form-select-sm" style="width: 200px; background-color: #F1F3F7;">
                <option selected>Creation Date (asc)</option>
                <option>Creation Date (desc)</option>
            </select>
        </div>

        <div class=" d-flex gap-md-3 gap-5 align-items-center ">
            <div>
                <a href="add_venue.php" class="btn btn-danger d-flex align-items-center gap-2 text-decoration-none">
                    <i class="bi bi-plus fw-bold"></i>
                    <span>Add New Venue</span>
                </a>
            </div>

            <div>
                <button type="button" class="btn btn-danger d-flex align-items-center" onclick="toggleTargetDiv()">
                    <i class="bi bi-dash fw-bold"></i>
                </button>
            </div>
        </div>
    </div>

    <div id="targetDiv" class="toggle-div">
        <div class="d-flex justify-content-between mt-3">

            <div class="d-flex flex-column">
                <div class="mb-4">
                    <label for="event_title" class="mb-3" require>Search Venue</label>
                    <input type="text" style="background-color: #F1F3F7;" id="venue_name" name="venue_name" required="required" maxlength="100" class="form-control">
                </div>
                <div class="d-flex gap-4">
                    <button type="button" class="btn text-white" style="background-color: #c3073f">
                        <i class="bi bi-search"></i>
                    </button>
                    <button type="button" class="btn text-white" style="background-color: #c3073f">
                        <i class="bi bi-x-octagon"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>



    <div class="card-body mt-3">
        <div class="table-responsive text-nowrap">
            <table class="table table-hover text-center align-middle">
                <thead>
                    <tr class="flex-row align-items-center ms-auto fs-5 text-center">
                        <th class="fw-normal text-start">Name</th>
                        <th class="fw-normal">Address</th>
                        <th class="fw-normal">Event Count</th>
                        <th class="fw-normal">Status</th>
                        <th><i class="bi bi-gear-wide-connected"></i></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <!-- Event Column -->
                        <?php foreach ($venue as $venue) { ?>
                            <td>
                                <span class="" style="color: #c3073f;"><a href="view_venue.php?id=<?php echo $venue->id ?>" class="text-decoration-none text-black"><?php echo $venue->venue_name ?></a></span>
                            </td>

                            <td>
                                <span class="emp_name text-truncate" style="color: #;"><?php echo $venue->venue_address ?></span>
                            </td>

                            <td>
                                <span>0</span>
                            </td>

                            <td>
                                <span class="badge bg-success fs-6">Visible</span>
                            </td>


                            <td>
                                <div class="dropdown">
                                    <button type="button" class="btn p-0" data-bs-toggle="dropdown">
                                        <i class="bi bi-stack" style="color: #c3073f"> Options</i>
                                    </button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="my_venue.php?id=<?php echo $venue->id ?>"><i class="bx bx-edit-alt me-1 "></i><i class="bi bi-pencil-square me-2"></i> Edit</a>
                                        <a class="dropdown-item" href=""><i class="bx bx-edit-alt me-1"></i> <i class="bi bi-trash me-2"></i>Delete</a>
                                    </div>
                                </div>
                            </td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
        <?php
        $id = $_GET['id'] ?? 'null';
        if (isset($id)) {
            $venue_details = Venue::find_by_id($id);
            if (isset($_POST['update_venue'])) {
                $args = $_POST['venue'];
                $venue_details->merge_object_data($args);
                $result = $venue_details->update();
                if ($result === true) {
                    echo "<script>
                            document.addEventListener('DOMContentLoaded', function() {
                                swal.fire({
                                    title: 'Success!',
                                    text: 'Details Updated.',
                                    icon: 'success',
                                    confirmButtonText: 'OK'
                                }).then(function() {                
                                    window.location.href = 'my_venue.php';                
                                });
                            });
                        </script>";
                } else {
                    echo "Database Error: " . $database->error;
                }
            }
            if ($venue_details == true) { ?>
                <div class="modal fade modal-md" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Edit: <?php echo $venue_details->venue_name ?> </h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form id="venueForm" action="" method="POST" enctype="multipart/form-data">
                                    <h4 class="mb-4">Edit Venue</h4>
                                    <label for="venue_street" class="required mb-2">Venue Name</label>
                                    <input type="text" id="venue_translations_en_name" name="venue[venue_name]" value="<?php echo $venue_details->venue_name ?>" maxlength="70" pattern=".{1,}" class="form-control">

                                    <div class="form-section my-3">
                                        <h4 class="section-title mb-3">Address Details</h4>
                                        <div class="row">
                                            <div class="form-group col-12 mb-2">
                                                <label for="venue_street" class="required mb-1">Venue Address</label>
                                                <input type="text" id="venue_street" name="venue[venue_address]" value="<?php echo $venue_details->venue_address ?>" class="form-control">
                                            </div>

                                            <div class="form-group col-12 mb-2">
                                                <label for="venue_city" class="required mb-1">City</label>
                                                <input type="text" id="venue_city" name="venue[venue_city]" value="<?php echo $venue_details->venue_city ?>" class="form-control">
                                            </div>

                                            <div class="form-group col-12 mb-2">
                                                <label for="venue_state" class="required mb-1">Region</label>
                                                <input type="text" id="venue_state" name="venue[venue_region]" value="<?php echo $venue_details->venue_region ?>" class="form-control">
                                            </div>

                                        </div>
                                        <div class="form-group mt-4">
                                            <button style="background-color:#C3063F" type="submit" id="venue_save" name="update_venue" class="btn text-white">Update Venue</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
        <?php }
        }
        ?>
    </div>

</div>
</section>
</div>
</container>


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
    function toggleTargetDiv() {
        const targetDiv = document.getElementById('targetDiv');
        if (targetDiv.classList.contains('show')) {
            targetDiv.classList.remove('show'); // Hide the div
        } else {
            targetDiv.classList.add('show'); // Show the div
        }
    }

    document.addEventListener("DOMContentLoaded", function() {
        var exampleModal = new bootstrap.Modal(document.getElementById('exampleModal'), {
            keyboard: true
        });
        exampleModal.show(); // Show the modal
    });
</script>
<?php include(SHARED_PATH . "/organizer_footer.php"); ?>


</php>