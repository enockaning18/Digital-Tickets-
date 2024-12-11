<?php
include("../../private/initialize.php");
include(SHARED_PATH . "/organizer_header.php");

// Get venue ID from the URL
$id = $_GET['id'] ?? null;

if (!$id) {
    echo "Venue ID is missing.";
    exit;
}

// Fetch the venue details using the Venue class
$venue = Venue::find_by_id($id);

if (!$venue) {
    echo "Venue not found.";
    exit;
}
?>

<div class="container mt-5">
    <h2 class="mb-4"><?php echo h($venue->venue_name); ?></h2>

    <div id="map" style="height: 400px; width: 100%;"></div>

    <h4 class="mt-4">Venue Details</h4>
    <p><strong>Address:</strong> <?php echo h($venue->venue_address); ?></p>
    <p><strong>City:</strong> <?php echo h($venue->venue_city); ?></p>
    <p><strong>Region:</strong> <?php echo h($venue->venue_region); ?></p>
</div>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAvmO1nQOx3Dfuef4Zn7SlLmzSp-6_wvlU"></script>
<script>
    function initMap() {
        // Set the latitude and longitude from PHP variables
        const latitude = <?php echo json_encode($venue->latitude); ?>;
        const longitude = <?php echo json_encode($venue->longitude); ?>;

        // Initialize the map
        const map = new google.maps.Map(document.getElementById("map"), {
            center: {
                lat: parseFloat(latitude),
                lng: parseFloat(longitude)
            },
            zoom: 15,
        });

        // Add a marker to the map
        const marker = new google.maps.Marker({
            position: {
                lat: parseFloat(latitude),
                lng: parseFloat(longitude)
            },
            map: map,
            title: "<?php echo h($venue->venue_name); ?>",
        });
    }

    // Initialize the map when the page loads
    window.onload = initMap;
</script>