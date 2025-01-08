<?php
class Cart
{
    public static function addToCart($ticketId, $quantity)
    {
        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = [];
        }
        if (isset($_SESSION['cart'][$ticketId])) {
            $_SESSION['cart'][$ticketId] += $quantity;
        } else {
            $_SESSION['cart'][$ticketId] = $quantity;
        }
    }

    public static function removeFromCart($ticketId)
    {
        if (isset($_SESSION['cart'][$ticketId])) {
            unset($_SESSION['cart'][$ticketId]);
        }
    }

    public static function updateQuantity($ticketId, $quantity)
    {
        if (isset($_SESSION['cart'][$ticketId])) {
            $_SESSION['cart'][$ticketId] = $quantity;
        }
    }

    public static function clearCart()
    {
        $_SESSION['cart'] = [];
    }

    public static function getCartItems()
    {
        return $_SESSION['cart'] ?? [];
    }
}
