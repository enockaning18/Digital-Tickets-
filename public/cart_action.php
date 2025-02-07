<script src="../bootstrap-config/sweetalert2/jquery-3.7.1.min.js"></script>
<script src="../bootstrap-config/sweetalert2/sweetalert2.all.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<?php
require_once('../private/initialize.php');

// Check if a valid user or guest session exists
$ticketId = $_POST['ticket_id'] ?? $_GET['ticket_id'] ?? null;
if (!$session->is_logged_in()) {
    if (isset($_SESSION['attendee_id']) || isset($_GET['attendee_id'])) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' || $_SERVER['REQUEST_METHOD'] === 'GET') {
            $action = $_POST['action'] ?? 'add_to_cart';
            $ticketId;
            $quantity = (int)($_POST['quantity'] ?? 1);

            if (!$ticketId) {
                echo "Invalid ticket ID.";
                echo $ticketId;
                exit();
            }

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
                default:
                    echo "Invalid action.";
                    exit();
            }

            // Ensure session updates before redirection
            session_write_close();
            header('Location: check_out.php');
            exit();
        }
    } else {
        $ticketId = $_POST['ticket_id'];
        header("Location: guest_user.php?ticket_id=" . $ticketId);
        exit();
    }
} else {
    echo "<script>
            document.addEventListener('DOMContentLoaded', function() {
                swal.fire({
                    title: 'Error ❌!',
                    text: 'Unable to add cart sign in with an attendee account!',
                    icon: 'error',
                    confirmButtonText: 'OK'
                }).then(function() {                
                    window.location.href = 'index.php';                
                });
            });
        </script>";
}
