<?php
include("../../private/initialize.php");
include(SHARED_PATH . "/attendee_header.php");
attendee_require_login()
?>

<div class="border border-0 col-md-12 col-lg-9 flex-column  rounded ">
    <div class="d-block d-md-flex  align-items-center  py-3 px-4 border rounded shadow-sm text-white" style="background-color:#C3073F">
        <i class="bi bi-info-circle-fill me-2"></i>No Ticket found
        <?php echo $attendee_session->attendee_id ?? null ?>
    </div>



</div>
</section>
</div>
</container>


</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>


<?php include(SHARED_PATH . "/attendee_footer.php"); ?>


<!-- Sidebar code remains the same -->

</php>