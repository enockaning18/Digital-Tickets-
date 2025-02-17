<!DOCTYPE html>
<html lang="en">

<head>
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

        .order-summary th,
        .order-summary td {
            padding: 8px;
            border-bottom: 1px solid #ddd;
        }

        .btn-primary {
            background-color: #007bff;
            border: none;
            padding: 10px 15px;
            border-radius: 5px;
            color: white;
            text-decoration: none;
            display: inline-block;
            font-weight: bold;
        }

        .highlight-box {
            background-color: #fff3cd;
            padding: 10px;
            border-radius: 5px;
            text-align: center;
            font-weight: bold;
            margin-top: 10px;
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
</head>

<body>
    <div class="container">
        <p class="header">Hi ' . $customerName . '!</p>
        <p>Your order for <strong>' . $eventName . '</strong> has been successfully processed. Below are your ticket details:</p>

        <div class="order-box">
            <table class="order-summary">
                <tr>
                    <th>Order #' . $orderId . '</th>
                    <th class="text-end">' . $orderDate . '</th>
                </tr>
                <tr>
                    <td>' . $ticketType1 . '</td>
                    <td class="text-end">GHS ' . $ticketPrice1 . '</td>
                </tr>
                <tr>
                    <td>' . $ticketType2 . '</td>
                    <td class="text-end">GHS ' . $ticketPrice2 . '</td>
                </tr>
                <tr>
                    <td>Subtotal:</td>
                    <td class="text-end">GHS ' . $subtotal . '</td>
                </tr>
                <tr>
                    <td>Org Fee:</td>
                    <td class="text-end">GHS ' . $orgFee . '</td>
                </tr>
                <tr>
                    <td>Membership Discount:</td>
                    <td class="text-end text-danger">-GHS ' . $discount . '</td>
                </tr>
                <tr>
                    <td><strong>Total:</strong></td>
                    <td class="text-end"><strong>GHS ' . $total . '</strong></td>
                </tr>
                <tr>
                    <td>Payment Method:</td>
                    <td class="text-end">' . $paymentMethod . ' (****' . $last4Card . ')</td>
                </tr>
            </table>
            <div class="text-center mt-3">
                <a href="' . $ticketUrl . '" class="btn btn-primary">VIEW TICKETS</a>
            </div>
        </div>

        <div class="highlight-box">
            This charge will appear on your statement as <strong>' . $billingReference . '</strong>.
        </div>

        <h5 class="mt-4">📅 ' . $eventName . '</h5>
        <p><strong>' . $eventDate . '</strong> from <strong>' . $eventTime . '</strong></p>
        <p>📍 <strong>' . $venueName . '</strong><br>' . $venueAddress . '</p>
        <p><a href="' . $mapsLink . '" target="_blank">View on Google Maps</a></p>

        <div class="qr-code">
            <p>Please present this QR code at the event for entry:</p>
            <img src="' . $qrCodeUrl . '" alt="QR Code" width="150">
        </div>

        <div class="footer">
            <p>For any inquiries, contact our support team.</p>
            <p><strong>Your Event Team</strong></p>
        </div>
    </div>
</body>

</html>