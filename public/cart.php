<?php
require_once('../private/initialize.php');

$cartItems = Cart::getCartItems();
?>
<!DOCTYPE html>
<html>

<head>
    <title>Cart</title>
</head>

<body>
    <h1>Your Cart</h1>
    <table>
        <thead>
            <tr>
                <th>Event</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Subtotal</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $total = 0;
            foreach ($cartItems as $ticketId => $quantity) :
                $event = Event::find_reference_at_view($ticketId);
                $subtotal = $event->ticket_price * $quantity;
                $total += $subtotal;
            ?>
                <tr>
                    <td><?php echo $event->event_name; ?></td>
                    <td>
                        <form method="POST" action="cart_action.php">
                            <input type="hidden" name="ticket_id" value="<?php echo $ticketId; ?>">
                            <input type="number" name="quantity" value="<?php echo $quantity; ?>" min="1">
                            <button type="submit" name="action" value="update_cart">Update</button>
                        </form>
                    </td>
                    <td>₵<?php echo $event->ticket_price; ?></td>
                    <td>₵<?php echo $subtotal; ?></td>
                    <td>
                        <form method="POST" action="cart_action.php">
                            <input type="hidden" name="ticket_id" value="<?php echo $ticketId; ?>">
                            <button type="submit" name="action" value="remove_from_cart">Remove</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <h2>Total: ₵<?php echo $total; ?></h2>
    <form method="POST" action="cart_action.php">
        <button type="submit" name="action" value="clear_cart">Clear Cart</button>
    </form>
    <a href="checkout.php">Proceed to Checkout</a>
</body>

</html>