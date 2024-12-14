<?php
include("../../private/initialize.php");
include(SHARED_PATH . "/organizer_header.php");

$errors = [];

if (isset($_POST['add_new_event'])) {
    $args = $_POST['event'];
    $event = new Event($args);
    $result = $event->create_new_event();

    if ($result === true) {
        echo "<script>
            document.addEventListener('DOMContentLoaded', function() {
                swal.fire({
                    title: 'Success!',
                    text: 'Event added successfully!',
                    icon: 'success',
                    confirmButtonText: 'OK'
                }).then(function() {                
                    window.location.href = 'organizer_dashboard.php';                
                });
            });
        </script>";
    } else {
        $msg = "Error: ";
        $msg .= $database->error;
        exit($msg);
    }
} ?>

<form action="save_venue.php" method="POST">
    <div class="form-group">
        <label for="autocomplete">Venue Address</label>
        <input id="autocomplete" type="text" name="venue_address" class="form-control" placeholder="Enter venue address" autocomplete="off">
    </div>

    <div id="map" style="height: 300px; width: 100%; margin-bottom: 20px;"></div>

    <div class="form-group">
        <label for="venue_name">Venue Name</label>
        <input type="text" id="venue_name" name="venue_name" class="form-control" placeholder="Enter venue name" required>
    </div>

    <!-- Hidden Fields to Store Coordinates -->
    <input type="hidden" id="latitude" name="latitude">
    <input type="hidden" id="longitude" name="longitude">

    <button type="submit" class="btn btn-primary">Save Venue</button>
</form>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAvmO1nQOx3Dfuef4Zn7SlLmzSp-6_wvlU&libraries=places"></script>
<!-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAvmO1nQOx3Dfuef4Zn7SlLmzSp-6_wvlU"></script> -->


<script>
    function initAutocomplete() {
        const map = new google.maps.Map(document.getElementById('map'), {
            center: {
                lat: 5.6037,
                lng: -0.187
            }, // Default to Accra, Ghana
            zoom: 12,
        });

        const input = document.getElementById('autocomplete');
        const autocomplete = new google.maps.places.Autocomplete(input);

        const marker = new google.maps.Marker({
            map: map,
        });

        autocomplete.addListener('place_changed', () => {
            const place = autocomplete.getPlace();

            if (!place.geometry) {
                alert("No details available for the selected location.");
                return;
            }

            // Update the map and marker
            map.setCenter(place.geometry.location);
            map.setZoom(15);

            marker.setPosition(place.geometry.location);
            marker.setVisible(true);
            
            document.getElementById('latitude').value = place.geometry.location.lat();
            document.getElementById('longitude').value = place.geometry.location.lng();
        });
    }

    // Initialize the map when the page loads
    google.maps.event.addDomListener(window, 'load', initAutocomplete);
</script>