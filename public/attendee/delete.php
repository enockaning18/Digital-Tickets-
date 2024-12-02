<?php include("../../private/initialize.php");
include(SHARED_PATH . "/attendee_header.php");
$attendee_id = $_GET['attendee_id'];

$attendee = Attendee::find_by_id($attendee_id);

if (isset($_POST['delete'])) {
    $result = $attendee->delete();
    if ($result == true) {
        header("Location: /table.php");
    } else {
        $msg = "error :";
        $msg .= $database->error;
        exit($msg);
    }
} else {
}
?>




<div class="border col-md-12 col-lg-9 flex-column shadow-sm rounded 0-0 p-md-5">
    <div class="d-block d-md-flex  justify-content-between align-items-center  py-3 px-4 border rounded shadow-sm" style="background-color: #ffffff;">
        <!-- Results Found -->

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
            <?php echo $attendee->email ?>
        </div>

        <form action="" method="POST">
            <div class="form-group ">
                <button type="submit" id="account_settings_save" name="delete" class="btn btn-primary btn">Delete</button>
            </div>
        </form>
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
</script>

<?php include(SHARED_PATH . "/organizer_footer.php"); ?>


<!-- Sidebar code remains the same -->

</php>