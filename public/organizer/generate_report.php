<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>Team Event</title>
    <link rel="icon" type="image/ico" sizes="50x50" href="../qr-code.ico">
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Exo+2:wght@100..900&display=swap" rel="stylesheet">

    <!-- Flatpickr CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">

    <!-- Flatpickr JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
</head>

<body>

    <?php
    include("../../private/initialize.php");
    require_login();

    // Report generator logic
    if (isset($_POST['generate_report'])) {
        if (empty($_POST['report_type']) || empty($_POST['report_type'])) {
            echo "<p style='color: red;'>Oops! Choose a Report Type & Event </p>";
        } else {
            $start_date = $_POST['start_date'];
            $end_date = $_POST['end_date'];
            $report_type = trim($_POST['report_type']);
            $event_reference_id = trim($_POST['reference_id']);

            // Handle report types
            if ($report_type === "ticket_sales_list") {
                require_once('reports/ticket_sales_list_report.php');
            } elseif ($report_type === "ticket_report") {
                require_once('reports/sales_report.php');
            } else {
                echo "<p style='color: red;'>Oops! You are not authorized to view this page.</p>";
                echo "<p>No Information Found!!!</p>";
            }
        }
    }
    ?>

</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        var myModal = new bootstrap.Modal(document.getElementById('eventModal'), {
            backdrop: 'static', // Prevent closing when clicking outside
            keyboard: false // Prevent closing with ESC key
        });
        myModal.show();
    });

    function printContent(el) {
        var restorepage = $('body').html();
        var printcontent = $('#' + el).clone();
        $('body').empty().html(printcontent);
        window.print();
        $('body').html(restorepage);
    }
</script>



</html>