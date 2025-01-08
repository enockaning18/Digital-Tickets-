<?php
require_once('../private/initialize.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'] ?? 'add_to_cart';
    $ticketId = $_POST['ticket_id'] ?? null;
    $quantity = (int)($_POST['quantity'] ?? 1);

    switch ($action) {
        case 'add_to_cart':
            Cart::addToCart($ticketId, $quantity);
            break;
        case 'update_cart':
            Cart::updateQuantity($ticketId, $quantity);
            break;
        case 'remove_from_cart':
            Cart::removeFromCart($ticketId);
            break;
        case 'clear_cart':
            Cart::clearCart();
            break;
    }
}

header('Location: check_out.php');
exit();
