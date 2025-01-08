<?php
require_once('../private/initialize.php');

$cartItems = Cart::getCartItems();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Checkout</title>
</head>
<body>
    <h1>Checkout</h1>
    <table>
        <thead>
            <tr>
                <th>Event</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Subtotal</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            $total = 0;
            foreach ($cartItems as $ticketId => $quantity): 
                $event = Event::find_reference_at_view($ticketId);
                $subtotal = $event->ticket_price * $quantity;
                $total += $subtotal;
            ?>
                <tr>
                    <td><?php echo $event->event_name; ?></td>
                    <td><?php echo $quantity; ?></td>
                    <td>₵<?php echo $event->ticket_price; ?></td>
                    <td>₵<?php echo $subtotal; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <h2>Total: ₵<?php echo $total; ?></h2>
    <form action="payment_gateway.php" method="POST">
        <button type="submit">Make Payment</button>
    </form>
</body>
</html>
