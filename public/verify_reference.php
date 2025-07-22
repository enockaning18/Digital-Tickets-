<?php
require_once('../private/confi_scanner.php');

// Show all errors (for development only)
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Return JSON response
header('Content-Type: application/json');

$ref = $_GET['ref'] ?? '';
$response = ['found' => false];

if (!empty($ref)) {
    $safe_ref = mysqli_real_escape_string($database, $ref);

    // Check if reference exists
    $sql = "SELECT * FROM ticket_payments WHERE reference = '$safe_ref' LIMIT 1";
    $result = $database->execute_query($sql);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);

        if ($row['status'] === 'used') {
            $used_time = $row['scanned_at'] ?? 'Unknown time';

            $response = [
                'found' => true,
                'ref' => $ref,
                'status' => 'used',
                'message' => 'This code has already been used.',
                'scanned_at' => $used_time
            ];
        } else {
            // Update the status to 'used'
            $update_sql = "UPDATE ticket_payments SET `status` = 'used', scanned_at = NOW() WHERE reference = '$safe_ref'";
            $database->execute_query($update_sql);

            $response = [
                'found' => true,
                'ref' => $ref,
                'status' => 'new',
                'message' => 'Reference verified and marked as used.'
            ];
        }
    } else {
        $response = [
            'found' => false,
            'ref' => $ref,
            'message' => 'Reference not found.'
        ];
    }
} else {
    $response = [
        'found' => false,
        'message' => 'No reference provided.'
    ];
}

echo json_encode($response);
exit;
