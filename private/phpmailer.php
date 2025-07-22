<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../vendor/autoload.php'; // Make sure PHPMailer is installed via Composer

$mail = new PHPMailer(true);
$reference = "21231312";
$amount = "20.00";
$paymentDate = "january 1st";

try {
    // Server settings
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com'; 
    $mail->SMTPAuth = true;
    $mail->Username = 'enockaning18@mail.com'; 
    $mail->Password = 'Mr.Okyere@2003'; 
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; 
    $mail->Port = 587; // 465 for SSL

    // Recipients
    $mail->setFrom('enockaning18@mail.com', 'Your Event Team');
    $mail->addAddress($customerEmail); // Send to the customer

    // Content
    $mail->isHTML(true);
    $mail->Subject = 'Payment Confirmation for Your Ticket Purchase';
    $mail->Body = "
        <html>
        <head>
            <title>Payment Confirmation</title>
        </head>
        <body>
            <h3>Dear Customer,</h3>
            <p>Thank you for your payment! Your ticket purchase was successful.</p>
            <p><strong>Payment Details:</strong></p>
            <ul>
                <li>Transaction Reference: <b>$reference</b></li>
                <li>Amount Paid: <b>GHS $amount</b></li>
                <li>Payment Date: <b>$paymentDate</b></li>
            </ul>
            <p>You can now access your ticket in your account.</p>
            <p>Best Regards,</p>
            <p><strong>Your Event Team</strong></p>
        </body>
        </html>
    ";

    $mail->send();
    echo "Email has been sent.";
} catch (Exception $e) {
    echo "Email could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
