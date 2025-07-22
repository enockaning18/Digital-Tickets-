<?php
include("../../private/initialize.php");
require '../../vendor/autoload.php'; // Load PHPMailer

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

if (isset($_POST['send_message'])) {
    $message = $_POST['message_text_area'];
    $sender_reference = $_POST['ticket_reference'];
    $event_name = $_POST['event_name'];
    $reply_email = $_POST['reply_email'];
    $reply_number = $_POST['reply_number'];



    $mailer_info = '
    <div class="container">
    <p class="header">' . htmlspecialchars($message) . '</p>

    <div class="order-box">
    <table class="order-summary">
    <tr>
    <th>Reply to :' . htmlspecialchars($reply_email) . '</th>
    <th>Call on :' . htmlspecialchars($reply_number) . '</th>
    </tr>';

    $mail = new PHPMailer(true);
    try {
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'enockaning18@gmail.com'; // Use environment variable
        $mail->Password = 'zrwy kvks fxxp jizd'; // Use App Password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        $mail->setFrom('enockaning18@gmail.com', 'Event Team');
        $mail->addAddress('hackforlife100@gmail.com');


        // Email content
        $mail->isHTML(true);
        $mail->Subject = 'Mail sent with reference ' . $sender_reference . '  on purchase of ' . $event_name;
        $mail->Body =  '<!DOCTYPE html>
        <html lang="en">
        <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Event Ticket Confirmation</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
        </head>
        <body>' . $mailer_info . '</body>
        </html>';


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
                text: 'Email Sent Successful!',
                icon: 'success',
                confirmButtonText: 'OK'
            }).then(function() {
                window.location.href = 'my_ticket.php?reference=$sender_reference'
            });
            });
            </script>";
} else {
    echo " An error happened";
}
