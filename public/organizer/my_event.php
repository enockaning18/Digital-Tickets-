<?php include("../../private/initialize.php");
include(SHARED_PATH . "/organizer_header.php");
require_login();
$organizer_id = $_SESSION['id'];
$event = Event::find_by_reference_id($organizer_id);

if ($event) { ?>


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
                    <a href="add_event.php" class="btn btn-danger d-flex align-items-center gap-2 text-decoration-none">
                        <i class="bi bi-plus fw-bold"></i>
                        <span>Add New Event</span>
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
                        <label for="event_title" class="mb-3" require>Event</label>
                        <input type="text" style="background-color: #F1F3F7;" id="event_name" name="event_name" required="required" maxlength="100" class="form-control">
                    </div>

                    <div class="mb-4">
                        <div class="form-check form-check-outline">
                            <input class="form-check-input" type="radio" name="filter" id="inlineRadio1" value="option1" checked>
                            <label class="form-check-label" for="inlineRadio1">All</label>
                        </div>
                        <div class="form-check form-check-outline">
                            <input class="form-check-input" type="radio" name="filter" id="inlineRadio2" value="option2">
                            <label class="form-check-label" for="inlineRadio2">Published Only</label>
                        </div>
                        <div class="form-check form-check-outline">
                            <input class="form-check-input" type="radio" name="filter" id="inlineRadio3" value="option3">
                            <label class="form-check-label" for="inlineRadio3">Draft Only</label>
                        </div>
                    </div>
                </div>

                <div class="d-flex flex-column">
                    <div class="mb-4">
                        <label for="event_title" class="mb-3" require>Category</label>
                        <input type="text" style="background-color: #F1F3F7;" id="category_name" name="category_name" required="required" maxlength="100" class="form-control">
                    </div>
                    <div class="mb-4">
                        <div class="form-check form-check-outline">
                            <input class="form-check-input" type="radio" name="category_filter" id="inlineRadio1" value="option1" checked>
                            <label class="form-check-label" for="inlineRadio1">All</label>
                        </div>
                        <div class="form-check form-check-outline">
                            <input class="form-check-input" type="radio" name="category_filter" id="inlineRadio2" value="option2">
                            <label class="form-check-label" for="inlineRadio2">Published Only</label>
                        </div>
                        <div class="form-check form-check-outline">
                            <input class="form-check-input" type="radio" name="category_filter" id="inlineRadio3" value="option3">
                            <label class="form-check-label" for="inlineRadio3">Draft Only</label>
                        </div>
                    </div>
                </div>

                <div class="d-flex flex-column">
                    <div class="mb-4">
                        <label for="event_title" class="mb-3" require>Venue</label>
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
                            <th class="fw-normal text-start">Event</th>
                            <th class="fw-normal">Sales</th>
                            <th class="fw-normal">Status</th>
                            <th class="fw-normal">Attendance</th>
                            <th><i class="bi bi-gear-wide-connected"></i></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <!-- Event Column -->

                            <td>
                                <div class="d-flex justify-content-start align-items-center">
                                    <div class="avatar-wrapper">
                                        <div class="avatar me-2 rounded">
                                            <img src="uploads/<?php echo $event->image ?>" alt="Avatar" class="rounded-circle" style="width: 50px; height: 50px;">
                                        </div>
                                    </div>
                                    <div class="d-flex flex-column">
                                        <span class="emp_name text-truncate" style="color: #c3073f;"><?php echo $event->event_name ?></span>
                                    </div>
                                </div>
                            </td>

                            <td>
                                <div>
                                    <div><strong>20%</strong></div>
                                    <small class="text-muted">0 tickets sold</small>
                                </div>
                                <div class="progress progress-xs" style=" height: 5px;">
                                    <div class="progress-bar bg-yellow" role="progressbar" style="width: 20%; background-color: #f39c12;" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </td>

                            <td>
                                <span class="p-2 fs-6 fs-md-5" style="background-color: #f39c12;"> Not published</span>
                            </td>

                            <td>
                                <span>0%</span>
                            </td>


                            <td>
                                <div class="dropdown">
                                    <button type="button" class="btn p-0" data-bs-toggle="dropdown">
                                        <i class="bi bi-stack" style="color: #c3073f"> Options</i>
                                    </button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="my_event.php?id=<?php echo $event->id ?>"><i class="bx bx-edit-alt me-1">
                                                <i class="bx bx-edit-alt me-1 mb-2"></i>
                                                <i class="bi bi-file-earmark-text me-2"></i> Details
                                        </a>
                                        <a class="dropdown-item" href="edit_event.php?id=<?php echo $event->id ?>"><i class="bx bx-edit-alt me-1"></i><i class="bi bi-pencil-square me-2"></i> Edit</a>
                                        <a class="dropdown-item" href=""><i class="bx bx-edit-alt me-1"></i><i class="bi bi-eye me-2"></i> Publish(Go Live)</a>
                                        <a class="dropdown-item" href=""><i class="bx bx-edit-alt me-1"></i> <i class="bi bi-trash me-2"></i>Delete</a>
                                    </div>
                                </div>
                            </td>
                        </tr>

                    </tbody>
                </table>
            </div>
            <?php
            $id = $_GET['id'] ?? 'null';
            if (isset($id)) {
                $details = Event::find_by_id($id);
                if ($details == true) { ?>
                    <div class="modal fade modal-xl" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel"><?php echo $details->event_name ?> Details: </h1>
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
<?php } else { ?>
    <div class="border border-0 col-md-12 col-lg-9 flex-column  rounded ">
        <div class="d-block d-md-flex  align-items-center  py-3 px-4 border rounded shadow-sm text-white" style="background-color:#C3073F">
            <i class="bi bi-info-circle-fill me-2"></i>No orders found
        </div>



    </div>

<?php } ?>

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


    function loadEventDetails(button) {
        const eventId = button.getAttribute('data-id');

        // Make an AJAX call to fetch event details
        fetch(`/event/public/organizer/event_details.php?id=${eventId}`)
            .then(response => response.json())
            .then(data => {
                // Populate the modal with the event details
                document.getElementById('recipient-name').value = data.event_name;
                document.getElementById('message-text').innerText = data.description || "No description available.";
            })
            .catch(error => {
                console.error("Error fetching event details:", error);
            });

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