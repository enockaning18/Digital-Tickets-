<?php
require_once('../private/initialize.php');
require '../vendor/autoload.php'; // Load PHPMailer

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

attendee_require_login();
$cartItems = Cart::getCartItems();

if (!isset($_GET['reference'])) {
    die("No reference supplied.");
}

$reference = $_GET['reference'];
$barcode = htmlspecialchars($_GET['barcode'], ENT_QUOTES, 'UTF-8'); // Prevent XSS
$secretKey = 'sk_test_42b24c01bafc378c48675c405a11458a912083c9';

// Initialize cURL
$curl = curl_init();
curl_setopt_array($curl, [
    CURLOPT_URL => "https://api.paystack.co/transaction/verify/" . urlencode($reference),
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
    die("Transaction verification failed: " . htmlspecialchars($result['message']));
}

$transactionData = $result['data'];
if ($transactionData['status'] == 'success') {
    $amount = $transactionData['amount'] / 100;
    $transaction_status = $transactionData['status'];
    $customerEmail = $transactionData['customer']['email'];
    $reference = $transactionData['reference'];
    $paymentDate = $transactionData['paid_at'];

    // Insert payment record securely
    $query = "INSERT INTO ticket_payments (reference, email, amount, payment_date, transaction_status) VALUES (?, ?, ?, ?, ?)";
    $stmt = $database->prepare($query);
    $stmt->bind_param("ssdss", $reference, $customerEmail, $amount, $paymentDate, $transaction_status);
    $stmt->execute();

    // Secure barcode update
    $query_command = "UPDATE attendee_orders SET reference = ? WHERE bar_code = ?";
    $stmt = $database->prepare($query_command);
    $stmt->bind_param("ss", $reference, $barcode);
    $stmt->execute();

    // Ensure cart items is an array
    if (!is_array($cartItems)) {
        die("Error: Cart items is not an array.");
    }

    // Deduct ticket quantities securely
    $eventQuantities = [];
    foreach ($cartItems as $ticketId => $cartQuantity) {
        $event = Event::find_reference_at_view($ticketId);
        if ($event) {
            $event_id = $event->event_reference_id;
            $eventQuantities[$event_id] = ($eventQuantities[$event_id] ?? 0) + $cartQuantity;
        } else {
            echo "Error: Ticket ID $ticketId not found.<br>";
        }
    }

    foreach ($eventQuantities as $event_id => $totalQuantity) {
        $query_command = "UPDATE `event` SET ticket_quantity = ticket_quantity - ? WHERE event_reference_id = ?";
        $stmt = $database->prepare($query_command);
        $stmt->bind_param("is", $totalQuantity, $event_id);

        if ($stmt->execute()) {
            unset($_SESSION['cart']); // Clear cart session

            try {
                $mail = new PHPMailer(true);
                $mail->isSMTP();
                $mail->Host = 'smtp.gmail.com';
                $mail->SMTPAuth = true;
                $mail->Username = 'enockaning18@gmail.com'; // Use environment variable
                $mail->Password = 'zrwy kvks fxxp jizd'; // Use App Password
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
                $mail->Port = 587;
                
                $mail->setFrom('enockaning18@gmail.com', 'Event Team');
                $mail->addAddress($customerEmail);

                // Email content
                $mail->isHTML(true);
                $mail->Subject = 'Payment Confirmation - Your Ticket Purchase';
                $mail->Body = "<h3>Dear Customer,</h3>
<p>Thank you for your payment! Your ticket purchase was successful.</p>
<ul>
    <li>Transaction Reference: <b>$reference</b></li>
    <li>Amount Paid: <b>GHS $amount</b></li>
    <li>Payment Date: <b>$paymentDate</b></li>
</ul>
<p>Best Regards,<br><strong>Your Event Team</strong></p>";

                $mail->send();
                echo "Email confirmation sent.";
            } catch (Exception $e) {
                echo "Email could not be sent. Mailer Error: " . $mail->ErrorInfo;
            }

            // SweetAlert for success message
            echo "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>";
            echo "<script>
    document.addEventListener('DOMContentLoaded', function() {
        Swal.fire({
            title: 'Success! 🎉',
            text: 'Payment Successful!',
            icon: 'success',
            confirmButtonText: 'OK'
        }).then(function() {
            window.location.href = 'attendee/my_ticket.php';
        });
    });
</script>";
        } else {
            echo "Error updating quantity: " . $stmt->error . "<br>";
        }
    }
} else {
    die("Payment was not successful.");
}
