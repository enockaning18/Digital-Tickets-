<?php
require_once('../private/initialize.php');
attendee_require_login();

$cartItems = Cart::getCartItems();
$errors = [];
$message = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Validate and sanitize input
    $email = trim($_POST['email_address'] ?? '');
    $phone_number = trim($_POST['phone_number'] ?? '');
    $quantity = intval($_POST['quantity'] ?? 0);

    if (empty($email) || empty($phone_number) || $quantity <= 0) {
        $errors[] = "All fields are required, and quantity must be greater than 0.";
    }

    if (empty($errors)) {
        $payment_mode = "Paystack";
        $attendee_id = $attendee_session->attendee_id ?? $attendee_session->token;

        // Insert payment details
        $query = "INSERT INTO payment_info (attendee_id, attendee_email, attendee_phone_number, payment_method) VALUES (?, ?, ?, ?)";
        $stmt = $database->prepare($query);
        $stmt->bind_param('isss', $attendee_id, $email, $phone_number, $payment_mode);

        if ($stmt->execute()) {
            // Process cart items
            $totalAmount = 0;

            foreach ($cartItems as $ticketId => $cartQuantity) {
                $event = Event::find_reference_at_view($ticketId);
                $ticket_name = $event->ticket_name;
                $unit_price = $event->ticket_price;
                $ticket_id = $event->id;
                $amount_payed = $unit_price * $quantity;
                $totalAmount += $amount_payed;

                $bar_code = rand(1000, 10000);
                $query_command = " INSERT INTO attendee_orders(bar_code, ticket_id, ticket_name, unit_price, quantity, amount_payed, attendee_id, payment_mode) ";
                $query_command .= " VALUES ( '" . $bar_code . "', '" . $ticket_id . "', '" . $ticket_name . "', '" . $unit_price . "', ";
                $query_command .= " '" . $quantity . "', '" . $amount_payed . "', '" . $attendee_id . "', '" . $payment_mode . "' )  ";
                $result = $database->query($query_command);
            }

            // Convert total amount to kobo (Paystack requirement)
            $subtotal = $totalAmount * 100; ?>
            <?php if ($subtotal > 0) : ?>
                <script src="https://js.paystack.co/v2/inline.js"></script>
                <script>
                    document.addEventListener("DOMContentLoaded", function() {
                        var handler = PaystackPop.setup({
                            key: 'pk_test_e4e35e500bb182e12d452d0bac32a039e540438c', // Replace with your public key
                            email: '<?php echo htmlspecialchars($email); ?>',
                            amount: <?php echo $subtotal; ?>,
                            currency: 'GHS',
                            callback: function(response) {
                                window.location.href = 'verify_paystack_payment.php?reference=' + response.reference;
                            },
                            onClose: function() {
                                alert('Payment was not completed.');
                                window.location.href = 'index.php';
                            }
                        });
                        handler.openIframe();
                    });
                </script>
            <?php else : ?>
                <p>Error: Unable to process payment. Invalid total amount.</p>
            <?php endif; ?>
<?php
        } else {
            $errors[] = "Error saving payment details. Please try again.";
        }
    }
}

// Display errors
if (!empty($errors)) {
    foreach ($errors as $error) {
        echo "<p class='error'>{$error}</p>";
    }
}
?>