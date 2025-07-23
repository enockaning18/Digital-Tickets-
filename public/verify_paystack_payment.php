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
    $payment_channel = $transactionData['authorization']['channel'];
    $payment_brand = $transactionData['authorization']['brand'];

    // Insert payment record securely
    $query = "INSERT INTO ticket_payments (reference, email, amount, payment_date, transaction_status, payment_channel, payment_brand) VALUES (?, ?, ?, ?, ?, ?, ?)";
    $stmt = $database->prepare($query);
    $stmt->bind_param("ssdssss", $reference, $customerEmail, $amount, $paymentDate, $transaction_status, $payment_channel, $payment_brand);
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

            // Generate QR Code with reference
            $qrCodePath = __DIR__ . "/qr-codes/$reference.png";
            generateQRCode($reference, $qrCodePath);

            // Fetch ticket details
            $query_command = "SELECT attendee.id, attendee.attendee_name, event.image, event.id, event.event_name, event.ticket_name, 
attendee_orders.created_at, event.event_venue, event.id, event.ticket_price, attendee_orders.quantity, 
amount_payed, transaction_status, event.event_date_time_start 
FROM attendee_orders 
JOIN event ON attendee_orders.ticket_id = event.id 
JOIN attendee ON attendee_orders.attendee_id = attendee.id 
JOIN ticket_payments ON attendee_orders.reference = ticket_payments.reference 
WHERE attendee_orders.reference = ?";
            $stmt = $database->prepare($query_command);
            $stmt->bind_param("s", $reference);
            $stmt->execute();
            $result = $stmt->get_result();

            $ticketDetailsHTML = "";
            while ($ticket_info = $result->fetch_assoc()) {
                $ticketDetailsHTML .= '
<div class="container">
<p class="header">Hi ' . htmlspecialchars($ticket_info['attendee_name']) . '!</p>
<p>Your order for <strong>' . htmlspecialchars($ticket_info['event_name']) . '</strong> has been successfully processed. Below are your ticket details:</p>

<div class="order-box">
<table class="order-summary">
<tr>
  <th>Order #' . htmlspecialchars($ticket_info['id']) . '</th>
  <th class="text-end">' . htmlspecialchars($ticket_info['created_at']) . '</th>
</tr>
<tr>
  <td>' . htmlspecialchars($ticket_info['ticket_name']) . '</td>
  <td class="text-end">GHS ' . htmlspecialchars($ticket_info['ticket_price']) . '</td>
</tr>
<tr>
  <td>Subtotal:</td>
  <td class="text-end">GHS ' . htmlspecialchars($ticket_info['amount_payed']) . '</td>
</tr>
<tr>
  <td>Org Fee:</td>
  <td class="text-end">GHS 0.00</td>
</tr>
<tr>
  <td>Membership Discount:</td>
  <td class="text-end text-danger">-GHS 0.00</td>
</tr>
<tr>
  <td><strong>Total:</strong></td>
  <td class="text-end"><strong>GHS ' . htmlspecialchars($ticket_info['amount_payed']) . '</strong></td>
</tr>
</table>
</div>

<h5 class="mt-4">📅 Event Date & Time: ' . htmlspecialchars($ticket_info['event_date_time_start']) . '</h5>
<p>📍 Venue: <strong>' . htmlspecialchars($ticket_info['event_venue']) . '</strong></p>

<div class="qr-code">
<p>Please present this QR code at the event for entry:</p>
<img src="https://d3a9-197-253-113-2.ngrok-free.app/event/public/qr-codes/' . htmlspecialchars($reference) . '"  alt="QR Code" width="150">
</div>

<div class="footer">
<p>For any inquiries, contact our support team.</p>
<p><strong>Your Event Team</strong></p>
</div>
</div>';
            }

            // Send email
            $mail = new PHPMailer(true);
            try {
                $mail->isSMTP();
                $mail->Host = 'smtp.gmail.com';
                $mail->SMTPAuth = true;
                $mail->Username = 'enockaning18@gmail.com'; // Use environment variable
                $mail->Password = 'zrwy kvks fxxp jizd'; // Use App Password
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
                $mail->Port = 587;

                $mail->setFrom('your-email@gmail.com', 'Event Team');
                $mail->addAddress($customerEmail);

                // Attach QR Code
                if (file_exists($qrCodePath)) {
                    $mail->addAttachment($qrCodePath, 'Your_Ticket_QR.png');
                }

                // Email content
                $mail->isHTML(true);
                $mail->Subject = 'Payment Confirmation - Your Ticket Purchase';
                $mail->Body = '<!DOCTYPE html>
<html lang="en">
<h___ead>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Event Ticket Confirmation</title>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
<style>
body {
background-color: #f8f9fa;
}
.container {
max-width: 600px;
margin: 20px auto;
background: #ffffff;
padding: 20px;
border-radius: 8px;
box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
}
.header {
font-size: 24px;
font-weight: bold;
}
.order-box {
background: #f5f5f5;
padding: 15px;
border-radius: 8px;
}
.order-summary {
width: 100%;
border-collapse: collapse;
}
.order-summary th, .order-summary td {
padding: 8px;
border-bottom: 1px solid #ddd;
}
.qr-code {
text-align: center;
margin: 20px 0;
}
.footer {
font-size: 12px;
color: #666;
text-align: center;
margin-top: 15px;
}
</style>
</h___ead>
<body>' . $ticketDetailsHTML . '</body></html>';

                $mail->send();
                // echo "Email confirmation sent with QR code.";
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
            text: 'Email confirmation sent with QR code!',
            icon: 'success',
            confirmButtonText: 'OK'
        }).then(function() {
            window.location.href = 'attendee/my_ticket.php?reference=$reference';

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
