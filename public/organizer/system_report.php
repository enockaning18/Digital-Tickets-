<?php

use Google\Service\Analytics\Resource\Data;

include("../../private/initialize.php");
include(SHARED_PATH . "/organizer_header.php");

require_login();
$organizer_id = $_SESSION['id'] ?? $_SESSION['user_token'];
// $event = Event::find_by_reference_id($organizer_id);
$query_command = " SELECT event.event_reference_id, event_name FROM `event`  ";
$query_command .= " INNER JOIN `organizer` ON organizer_id  = organizer.id ";
$query_command .= " WHERE organizer_id = '" . $organizer_id . "'";
$result = $database->execute_query($query_command);



if ($result && mysqli_num_rows($result) > 0) { ?>

    <div class="border col-md-12 col-lg-9 flex-column shadow-sm rounded 0-0 p-md-5">


        <div class="d-block d-md-flex  justify-content-between align-items-center  py-3 px-4 border rounded shadow-sm" style="background-color: #ffffff;">
            <!-- Results Found -->

            <div class="d-flex align-items-center mb-2 mb-md-0">
                <h>System Report</h>
            </div>

            <div class="text-muted mb-2 mb-md-0">
                <strong></strong> result(s) found
            </div>

            <div class=" d-flex gap-md-3 gap-5 align-items-center ">
                <div>
                    <a href="order_list.php" class="btn btn-danger d-flex align-items-center gap-2 text-decoration-none">
                        <i class="bi bi-cart3 me-1"></i>
                        <span>Order List</span>
                    </a>
                </div>

                <!-- <div>
                    <button type="button" class="btn btn-danger d-flex align-items-center" onclick="toggleTargetDiv()">
                        <i class="bi bi-dash fw-bold"></i>
                    </button>
                </div> -->
            </div>
        </div>

        <form id="searchForm" action="generate_report.php" method="POST" enctype="multipart/form-data">

            <div id="targetDiv" class="toggle-div">
                <div class="container">
                    <div class="row g-3 mt-3">
                        <!-- Event Name -->
                        <div class="col-12 col-sm-6 col-md-3">
                            <label for="event_title" class="mb-2">Event Name</label>
                            <select class="form-select p-2" id="reference_id" name="reference_id" require>
                                <option value="">All</option>
                                <?php while ($event = mysqli_fetch_assoc($result)) { ?>
                                    <option value="<?php echo $event['event_reference_id'] ?>"> <?php echo $event['event_name'] ?> </option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="col-12 col-sm-6 col-md-3">
                            <label for="event_title" class="mb-2">Report Type</label>
                            <select class="form-select p-2" id="report_type" name="report_type" required>
                                <option value="none">Select Report</option>
                                <option value="ticket_sales_list">Ticket Sales</option>
                                <option value="ticket_report">Ticket Report</option>
                            </select>
                        </div>

                        <!-- Reference Number
                        <div class="col-12 col-sm-6 col-md-3">
                            <label for="reference" class="mb-2">Reference Number</label>
                            <input type="text" name="reference" id="reference" class="form-control ">
                        </div> -->

                        <!-- Start Date -->
                        <div class="col-12 col-sm-6 col-md-3">
                            <label for="start_date" class="mb-2">Start Date</label>
                            <input type="date" name="start_date" id="start_date" class="form-control p-2" required>
                        </div>

                        <!-- End Date -->
                        <div class="col-12 col-sm-6 col-md-3">
                            <label for="end_date" class="mb-2">End Date</label>
                            <input type="date" name="end_date" id="end_date" class="form-control p-2" required>
                        </div>

                        <button type="submit" name="generate_report" class="btn text-white w-100 w-md-auto" style="background-color: #c3073f;">
                            Generate Report
                        </button>
                    </div>

                </div>

            </div>
        </form>

        <div id="studentTableWrapper" class="p-0" style="display:none;">
            <h5 class="card-header mb-4">Order Table</h5>
            <div class="table-responsive text-nowrap">
                <table class="table table-hover" id="studentTable">
                    <thead>
                        <tr>

                        </tr>
                    </thead>
                    <tbody id="studentTableBody">
                        <!-- Data from AJAX will be loaded here -->
                    </tbody>
                </table>
            </div>
        </div>

    </div>

    </section>
    </div>

<?php } ?>
</container>


</body>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>


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



<style>
    /* .toggle-div {
        opacity: 0;
        max-height: 0;
        overflow: hidden;
        transition: opacity 0.5s ease, max-height 0.5s ease;
    }

    .toggle-div.show {
        opacity: 1;
        height: auto;
        max-height: 500px;
    } */
</style>



<?php include(SHARED_PATH . "/organizer_footer.php"); ?>


</php>