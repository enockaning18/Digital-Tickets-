<?php include("../../private/initialize.php");
include(SHARED_PATH . "/admin_header.php");
$id = $_GET['id'] ?? 'null';
$organizer = Organizer::find_all();
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
                <a href="add_venue.php" class="btn btn-danger d-none d-flex align-items-center gap-2 text-decoration-none">
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
                    <label for="event_title" class="mb-3" require>Search Organizer</label>
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
                        <th class="fw-normal">Phone</th>
                        <th class="fw-normal">Email</th>
                        <th class="fw-normal">No. Event</th>
                        <th><i class="bi bi-gear-wide-connected"></i></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <!-- Event Column -->
                        <?php foreach ($organizer as $organizer) { ?>
                            <td>
                                <div class="d-flex justify-content-start align-items-center">
                                    <div class="avatar-wrapper">
                                        <div class="avatar me-2 rounded">
                                            <img src="uploads/<?php echo $organizer->image ?>" alt="Avatar" class="rounded-circle" style="width: 50px; height: 50px;">
                                        </div>
                                    </div>
                                    <div class="d-flex flex-column">
                                        <span class="" style="color: #c3073f;"><a href="admin_venue.php?id=<?php echo $organizer->id ?>" class="text-decoration-none text-black"><?php echo $organizer->organizer_name ?></a></span>
                                    </div>
                                </div>
                            </td>

                            <td>
                                <span class="emp_name text-truncate"><?php echo $organizer->organizer_phone ?></span>
                            </td>

                            <td>
                                <span class="emp_name text-truncate"><?php echo $organizer->organizer_email ?></span>
                            </td>

                            <td>
                                <span class="emp_name text-truncate">Null</span>
                            </td>


                            <td>
                                <div class="dropdown">
                                    <button type="button" class="btn p-0" data-bs-toggle="dropdown">
                                        <i class="bi bi-stack" style="color: #c3073f"> Options</i>
                                    </button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="admin_organizers.php?id=<?php echo $organizer->id ?>">
                                            <i class="bi bi-file-earmark-text me-2"></i> Details
                                        </a>

                                        <a class="dropdown-item" href="admin_organizers.php?id=<?php echo $organizer->id ?>">
                                            <i class="bi bi-pencil-square me-2"></i> Edit
                                        </a>

                                        <a class="dropdown-item" href="">
                                            <i class="bi bi-trash me-2"></i>Delete
                                        </a>

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
        $details_id = $_GET['id'] ?? 'null';
        if (isset($id)) {
            $organizer_details = Organizer::find_by_id($id);
            if (isset($_POST['update_organizer'])) {
                $args = $_POST['organizer'];
                $organizer_details->merge_object_data($args);
                $result = $organizer_details->update();
                if ($result === true) {
                    echo "<script>
                            document.addEventListener('DOMContentLoaded', function() {
                                swal.fire({
                                    title: 'Success!',
                                    text: 'Details Updated.',
                                    icon: 'success',
                                    confirmButtonText: 'OK'
                                }).then(function() {                
                                    window.location.href = 'admin_organizers.php';                
                                });
                            });
                        </script>";
                } else {
                    echo "Database Error: " . $database->error;
                }
            }
            if ($organizer_details == true) { ?>
                <div class="modal fade modal-md" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Edit: <?php echo $organizer_details->organizer_name ?> </h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form id="venueForm" action="" method="POST" enctype="multipart/form-data">
                                    <label for="venue_street" class="required mb-2">Organizer Name</label>
                                    <input type="text" id="venue_translations_en_name" name="organizer[organizer_name]" value="<?php echo $organizer_details->organizer_name ?>" maxlength="70" pattern=".{1,}" class="form-control">

                                    <div class="form-section my-3">
                                        <div class="row">
                                            <div class="form-group col-12 mb-3">
                                                <label for="venue_street" class="required mb-1">Organizer Email</label>
                                                <input type="text" id="venue_street" name="organizer[organizer_email]" value="<?php echo $organizer_details->organizer_email ?>" class="form-control">
                                            </div>

                                            <div class="form-group col-12 mb-3">
                                                <label for="venue_city" class="required mb-1">Organizer Phone Number</label>
                                                <input type="text" id="venue_city" name="organizer[organizer_phone]" value="<?php echo $organizer_details->organizer_phone ?>" class="form-control">
                                            </div>

                                            <div class="form-group col-12 mb-3">
                                                <label for="event_event" class="mb-1" require>Update Image</label>
                                                <input type="file" name="image" id="upload" class="account-file-input form-control p-2" name="organizer[organizer]" maxlength="100" />
                                            </div>

                                        </div>
                                        <div class="form-group mt-3">
                                            <button style="background-color:#C3063F" type="submit" id="update_organizer" name="update_organizer" class="btn text-white">Update Organizer</button>
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

        <?php

        if (isset($details_id)) {
            $details = Organizer::find_by_id($details_id);
            if ($details == true) { ?>
                <div class="modal fade modal-xl" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModal2Label" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModal2Label"><?php echo $details->event_name ?> Details: </h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="table-responsive">
                                            <table class="table table-borderless table-striped table-hover table-sm">
                                                <thead>
                                                    <tr>
                                                        <th colspan="2"><i class="fas fa-file-alt fa-fw text-muted"></i> General information</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td width="30%">Status</td>
                                                        <td><span class="badge bg-danger">Event is not published</span></td>
                                                    </tr>
                                                    <tr>
                                                        <td width="30%">Title</td>
                                                        <td><?php echo $details->event_name ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Reference</td>
                                                        <td><?php echo $details->id ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Creation date</td>
                                                        <td><?php echo $details->event_date_time_start ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Update date</td>
                                                        <td><?php echo $details->event_date_time_start ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Views</td>
                                                        <td>0 view(s)</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Added to favorites by</td>
                                                        <td>0 user(s)</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Category</td>
                                                        <td><?php echo $details->event_category ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Publicly show attendees</td>
                                                        <td>No</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Allow attendees to leave reviews</td>
                                                        <td>No</td>
                                                    </tr>
                                                </tbody>

                                            </table>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 ">
                                        <div class="table-responsive">
                                            <table class="table table-borderless table-striped table-hover table-sm">
                                                <thead>
                                                    <tr>
                                                        <th colspan="2"><i class="fas fa-image fa-fw text-muted"></i> Images</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td width="30%">Main image</td>
                                                        <td>
                                                            <a class="fancybox" href="/event/public/organizer/uploads/<?php echo $details->image ?>" data-toggle="tooltip" title="Enlarge">
                                                                <img src="uploads/<?php echo $details->image ?>" class="img-thumbnail" style="width: 240px; ">
                                                            </a>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Gallery</td>
                                                        <td>
                                                            1 image(s)
                                                        </td>
                                                    </tr>
                                                </tbody>

                                            </table>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="table-responsive">
                                            <table class="table table-borderless table-sm ">
                                                <thead>
                                                    <tr class="row d-flex">
                                                        <th class="col-lg-6"><i class="fas fa-calendar fa-fw text-muted px-1 "></i> Event dates</th>
                                                        <th class="col-lg-6"><i class="fas fa-ticket-alt fa-fw text-muted  px-1 "></i> Tickets</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr class="row">
                                                        <td class="col-12 col-lg-6 p-3">
                                                            <h6>Event date </h6>
                                                            <div class="table-responsive">
                                                                <table class="table table-borderless table-striped table-hover table-sm">
                                                                    <tbody>
                                                                        <tr>
                                                                            <td width="30%">Status</td>
                                                                            <td>
                                                                                <span class="badge bg-danger">Event is not published</span>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>Sales</td>
                                                                            <td>
                                                                                0
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>Reference</td>
                                                                            <td><?php echo $details->id ?></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td width="50%">Venue</td>
                                                                            <td><?php echo $details->event_venue ?></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>Address</td>
                                                                            <td> Kumasi, Ghana00233 , Ghana</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>Tickets types</td>
                                                                            <td>1</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>Start date</td>
                                                                            <td><?php echo $details->event_date_time_start ?></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>End date</td>
                                                                            <td><?php echo $details->event_date_time_end ?></td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </td>
                                                        <td class="col-12 col-lg-6 p-3">
                                                            <h6>Ticket 1</h6>
                                                            <div class="table-responsive">
                                                                <table class="table table-borderless table-striped table-hover table-sm">
                                                                    <tbody>
                                                                        <tr>
                                                                            <td width="30%">Status</td>
                                                                            <td>
                                                                                <span class="badge bg-danger">Event is not published</span>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>Sales</td>
                                                                            <td>
                                                                                0
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>Price</td>
                                                                            <td>
                                                                                <?php echo $details->ticket_price ?>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>Quantity</td>
                                                                            <td><?php echo $details->ticket_quantity ?></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>Reference</td>
                                                                            <td><?php echo $details->id ?></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>Name</td>
                                                                            <td><?php echo $details->ticket_name ?></td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>Currently in cart</td>
                                                                            <td>0</td>
                                                                        </tr>

                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
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
    document.addEventListener("DOMContentLoaded", function() {
        var exampleModal2 = new bootstrap.Modal(document.getElementById('exampleModal2'), {
            keyboard: true
        });
        exampleModal2.show(); // Show the modal
    });
</script>
<?php include(SHARED_PATH . "/organizer_footer.php"); ?>


</php>