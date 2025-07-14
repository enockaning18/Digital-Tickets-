<?php

use Google\Service\Analytics\Resource\Data;

include("../../private/initialize.php");
include(SHARED_PATH . "/organizer_header.php");

require_login();
$organizer_id = $_SESSION['id'] ?? $_SESSION['user_token'];
// $event = Event::find_by_reference_id($organizer_id);
$query_command = " SELECT event.id, event_name FROM `event`  ";
$query_command .= " INNER JOIN `organizer` ON organizer_id  = organizer.id ";
$query_command .= " WHERE organizer_id = '" . $organizer_id . "'";
$result = $database->execute_query($query_command);



if ($result && mysqli_num_rows($result) > 0) { ?>

    <div class="border col-md-12 col-lg-9 flex-column shadow-sm rounded 0-0 p-md-5">
        <form id="searchForm"  method="POST" enctype="multipart/form-data">

            <div class="d-block d-md-flex  justify-content-between align-items-center  py-3 px-4 border rounded shadow-sm" style="background-color: #ffffff;">
                <!-- Results Found -->
                <div class="text-muted mb-2 mb-md-0">
                    <strong></strong> result(s) found
                </div>

                <div class="d-flex align-items-center mb-2 mb-md-0">
                    <label for="event_category" class="mb-0 me-2 fw-bold text-secondary">Sort by:</label>
                    <select class="form-select form-select-sm" id="order" name="order" style="width: 200px; background-color: #F1F3F7;">
                        <option value="ASC">Creation Date (asc)</option>
                        <option value="DESC">Creation Date (desc)</option>
                    </select>
                </div>

                <div class=" d-flex gap-md-3 gap-5 align-items-center ">
                    <div>
                        <a href="system_report.php" class="btn btn-danger d-flex align-items-center gap-2 text-decoration-none">
                            <i class="bi bi-file-earmark-spreadsheet me-1"></i>
                            System Report
                        </a>
                    </div>

                    <!-- <div>
                        <button type="button" class="btn btn-danger d-flex align-items-center" onclick="toggleTargetDiv()">
                            <i class="bi bi-dash fw-bold"></i>
                        </button>
                    </div> -->
                </div>
            </div>

            <div id="targetDiv" class="toggle-div">
                <div class="container">
                    <div class="row g-3 mt-3">
                        <!-- Event Name -->
                        <div class="col-12 col-sm-6 col-md-3">
                            <label for="event_title" class="mb-2">Event Name</label>
                            <select class="form-select p-2" id="event_id" name="event_id">
                                <option value="">All</option>
                                <?php while ($event = mysqli_fetch_assoc($result)) { ?>
                                    <option value="<?php echo $event['id'] ?>"> <?php echo $event['event_name'] ?> </option>
                                <?php } ?>
                            </select>
                        </div>

                        <!-- Reference Number -->
                        <div class="col-12 col-sm-6 col-md-3">
                            <label for="reference" class="mb-2">Reference Number</label>
                            <input type="text" name="reference" id="reference" class="form-control ">
                        </div>

                        <!-- Start Date -->
                        <div class="col-12 col-sm-6 col-md-3">
                            <label for="start_date" class="mb-2">Start Date</label>
                            <input type="date" name="start_date" id="start_date" class="form-control ">
                        </div>

                        <!-- End Date -->
                        <div class="col-12 col-sm-6 col-md-3">
                            <label for="end_date" class="mb-2">End Date</label>
                            <input type="date" name="end_date" id="end_date" class="form-control ">
                        </div>

                        <!-- Search Button -->
                        <div class="col-2 text-center mt-3">
                            <button type="submit" class="btn text-white w-100 w-md-auto" style="background-color: #c3073f;">
                                Search
                            </button>
                        </div>
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
    $(document).ready(function() {
        $('#searchForm').on('submit', function(e) {
            e.preventDefault(); // Prevent the form from submitting normally

            // Debugging: Check if form event is triggered
            console.log("Search form submitted!");

            // Collect form data
            var event_id = $('#event_id').val();
            var start_date = $('#start_date').val();
            var end_date = $('#end_date').val();
            var reference = $('#reference').val();
            var order = $('#order').val();

            console.log("Submitting data:", {
                event_id,
                start_date,
                end_date,
                reference,
                order
            }); // Debugging

            // Perform the AJAX request
            $.ajax({
                url: 'fetch_search.php',
                method: 'POST',
                data: {
                    event_id: event_id,
                    start_date: start_date,
                    end_date: end_date,
                    reference: reference,
                    order: order
                },
                success: function(response) {
                    console.log("Response received:", response); // Debugging
                    $('#studentTableWrapper').show();
                    $('#studentTableBody').html(response);
                },
                error: function(xhr, status, error) {
                    console.error("AJAX error:", error); // Debugging
                }
            });
        });
    });
</script>
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

    /* Table wrapper to control height and scrolling */
    .table-wrapper {
        max-height: 100px;
        /* Adjust as needed */
        overflow-y: auto;
        /* Enable vertical scrolling */
        display: block;
    }

    /* Table styling */
    .table {
        width: 100%;
        border-collapse: collapse;
        text-align: center;
        /* Center-align text */
    }

    /* Ensure rows and cells do not exceed max width */
    tr {
        max-width: 100%;
        white-space: nowrap;
        overflow: hidden;
    }

    /* Center align and justify content in table cells */
    td,
    th {
        max-width: 200px;
        /* Adjust width as needed */
        text-align: center;
        /* Center align text */
        vertical-align: middle;
        /* Align content in the middle */
        padding: 10px;
        /* Add some spacing */
        word-break: break-word;
        /* Allow long words to wrap */
    }

    /* Ensure text inside spans is aligned and doesn't overflow */
    td span {
        display: block;
        max-width: 100%;
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap;
        text-align: center;
        /* Center-align text */
    }
</style>



<?php include(SHARED_PATH . "/organizer_footer.php"); ?>


</php>