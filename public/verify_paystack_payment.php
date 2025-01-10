<?php
require_once('../private/initialize.php');
attendee_require_login();
$cartItems = Cart::getCartItems();

if (!isset($_GET['reference'])) {
    die("No reference supplied.");
}

$reference = $_GET['reference'];
$secretKey = 'sk_test_42b24c01bafc378c48675c405a11458a912083c9';

// Initialize cURL
$curl = curl_init();
curl_setopt_array($curl, [
    CURLOPT_URL => "https://api.paystack.co/transaction/verify/" . $reference,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_HTTPHEADER => [
        "Authorization: Bearer " . $secretKey,
        "Content-Type: application/json"
    ]
]);

$response = curl_exec($curl);
$http_code = curl_getinfo($curl, CURLINFO_HTTP_CODE);
curl_close($curl);

if (curl_errno($curl)) {
    die("cURL error occurred: " . curl_error($curl));
}

$result = json_decode($response, true);
if ($http_code !== 200 || !$result['status']) {
    die("Transaction verification failed: " . $result['message']);
}

$transactionData = $result['data'];
if ($transactionData['status'] == 'success') {
    $amount = $transactionData['amount'] / 100;
    $customerEmail = $transactionData['customer']['email'];
    $reference = $transactionData['reference'];
    $paymentDate = $transactionData['paid_at'];

    $query = "INSERT INTO ticket_payments (reference, email, amount, payment_date) VALUES (?, ?, ?, ?)";
    $stmt = $database->prepare($query);
    $stmt->bind_param("ssds", $reference, $customerEmail, $amount, $paymentDate);
    unset($_SESSION['cart']);

    if ($stmt->execute()) {
        echo "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>";
        echo "<script>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                title: 'Success! 🎉',
                text: 'Payment Successful!',
                icon: 'success',
                confirmButtonText: 'OK'
            }).then(function() {                
                window.location.href = 'index.php';                
            });
        });
        </script>";
    } else {
        echo "Database error: Could not log payment.";
    }
} else {
    die("Payment was not successful.");
}
