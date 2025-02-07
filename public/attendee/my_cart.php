<?php
include("../../private/initialize.php");
include(SHARED_PATH . "/attendee_header.php");
$cartItems = Cart::getCartItems();
?>

<?php if ($cartItems && $cartItems > 0) { ?>


    <div class="border border-0 col-md-12 col-lg-9 flex-column  rounded ">
        <div class="card-body rounded shadow rounded p-3">
            <table class="table table-hover">
                <thead class="text-muted">
                    <tr>
                        <th style="width:55%;">Event / Ticket</th>
                        <figure class="d-block ">
                            <th style="width:15%;" class="d-none d-sm-table-cell" width="100">Price</th>
                            <th style="width:15%;" class="d-none d-sm-table-cell text-center" width="100">Quantity</th>
                            <th style="width:15%;" class="d-none d-sm-table-cell text-right" width="100">Subtotal</th>
                        </figure>
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
                            <td width="55%">
                                <figure class="d-flex gap-3">
                                    <!-- Event Image -->
                                    <div class="col-2 my-auto">
                                        <img src="../../public/organizer/uploads/<?php echo htmlspecialchars($event->image); ?>" class="img-thumbnail img-sm img-lazy-load b-loaded" alt="<?php echo htmlspecialchars($event->event_name); ?>">
                                        <dl class="text-center mt-2">

                                        </dl>

                                    </div>
                                    <div>
                                        <!-- Event Details -->
                                        <figcaption class="my-auto">
                                            <a href="/en/event/party-shop-media-xmas-trip-to-cape-coast" class="text-decoration-none">
                                                <h6 style="color:#C3073F;"><?php echo htmlspecialchars($event->event_name); ?></h6>
                                            </a>
                                            <dl class="mb-0 small">
                                                <dd><?php echo htmlspecialchars($event->ticket_name); ?></dd>
                                            </dl>
                                            <dl class="mb-0 small">
                                                <dd>When <?php echo htmlspecialchars($event->event_date_time_start);  ?></dd>
                                            </dl>
                                            <dl class="mb-0 small">
                                                <dd> Where<?php echo htmlspecialchars($event->event_venue); ?></dd>
                                            </dl>
                                            <dl class="mb-0 small">
                                                <dd>
                                                    Organized by<a href="/en/organizer/party-shop-media" class="text-decoration-none" target="_blank" style="color:#C3073F;">
                                                        <?php echo htmlspecialchars($event->organizer_name); ?>
                                                    </a>
                                                </dd>
                                            </dl>
                                        </figcaption>
                                </figure>

                                <!-- Responsive Pricing Section -->
                                <div class="d-block d-sm-none mt-3">
                                    <div class="d-flex justify-content-between">
                                        <div class="text-center" style="flex-grow: 1;">Price</div>
                                        <div class="text-center" style="flex-grow: 1;">Quantity</div>
                                        <div class="text-center" style="flex-grow: 1;">Subtotal</div>
                                    </div>

                                    <form method="POST" action="../cart_action.php">
                                        <input type="hidden" name="ticket_id" value="<?php echo htmlspecialchars($ticketId); ?>">

                                        <div class="d-flex align-items-center mt-2 justify-content-center">
                                            <!-- Price -->
                                            <div class="text-center" style="flex-grow: 1;">
                                                GH₵ <?php echo htmlspecialchars($event->ticket_price); ?>
                                            </div>

                                            <!-- Quantity Input -->
                                            <div class="text-center" style="flex-grow: 1; max-width: 120px;">
                                                <input type="number" id="quantity" name="quantity" value="<?php echo htmlspecialchars($quantity ?? 1); ?>" min="1" class="form-control touchspin-integer bg-white eventdate-ticket-qte" data-min="0" data-max="10" onchange="updateSubtotal()" style="max-width: 80px; margin: 0 auto;">
                                            </div>

                                            <!-- Subtotal -->
                                            <div class="text-center" style="flex-grow: 1;">
                                                <?php echo htmlspecialchars($subtotal ?? 0); ?>
                                            </div>

                                            <button type="submit" name="action" value="remove_from_cart" class="btn btn-sm text-white px-3" style="background-color: #C3073F;">
                                                <i class="bi bi-trash3"></i>
                                            </button>
                                        </div>

                                        <!-- Action Buttons -->
                                        <div class="d-flex flex-row flex-sm-column gap-2 mt-2 justify-content-center">
                                            <button type="submit" name="action" value="update_cart" class="btn btn-sm text-white px-3" style="background-color: #C3073F;">
                                                Update
                                            </button>

                                        </div>
                                    </form>
                                </div>


                            </td>

                            <td width="15%" class="d-none d-sm-table-cell ">
                                GH₵ <span><?php echo $event->ticket_price; ?></span>
                            </td>
                            <td width="15%" class="text-center d-none d-sm-table-cell">
                                <form method="POST" action="../cart_action.php">
                                    <input type="hidden" name="ticket_id" value="<?php echo $ticketId; ?>">
                                    <input type="number" id="quantity" name="quantity" value="<?php echo $quantity; ?>" min="1" class="form-control touchspin-integer bg-white eventdate-ticket-qte" data-min="0" data-max="10" value="1">
                                    <div class="d-flex flex-row flex-sm-column gap-2 mt-2">
                                        <button type="submit" name="action" value="update_cart" class="btn btn-sm text-white px-3" style="background-color: #C3073F;">
                                            Update
                                        </button>
                                        <button type="submit" name="action" value="clear_cart" class="btn btn-sm text-white px-3" style="background-color: #C3073F;">
                                            <i class="bi bi-trash3"></i>
                                        </button>
                                    </div>
                                </form>
                            </td>
                            <td width="15%" class="d-none d-sm-table-cell text-right">
                                <span>GH₵ <?php echo $subtotal; ?>.00</span>
                            </td>

                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
    </div>

<?php } else { ?>
    <div class="border border-0 col-md-12 col-lg-9 flex-column  rounded ">
        <div class="d-block d-md-flex  align-items-center  py-3 px-4 border rounded shadow-sm text-white" style="background-color:#C3073F">
            <i class="bi bi-info-circle-fill me-2"></i>No orders found
        </div>
    </div>
<?php } ?>
</section>
</div>
</container>


</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
    // JavaScript to dynamically update the subtotal
    document.addEventListener("DOMContentLoaded", function() {
        // Select all quantity inputs
        const quantityInputs = document.querySelectorAll('.eventdate-ticket-qte');

        quantityInputs.forEach(input => {
            input.addEventListener('input', function() {
                const ticketId = this.id.split('-')[1]; // Extract ticket ID
                const quantity = parseInt(this.value) || 1; // Default to 1 if invalid

                // Optionally calculate subtotal if needed
                const pricePerTicket = <?php echo $pricePerTicket; ?>; // Set this server-side
                const subtotal = pricePerTicket * quantity;

                // Update subtotal in the UI if applicable
                const subtotalElement = document.querySelector(`#subtotal-${ticketId}`);
                if (subtotalElement) {
                    subtotalElement.textContent = `$${subtotal.toFixed(2)}`;
                }


                fetch('cart_action.php', {
                        method: 'POST',
                        body: new URLSearchParams({
                            ticket_id: ticketId,
                            quantity: quantity,
                            action: 'update_cart'
                        })
                    }).then(response => response.text())
                    .then(data => {
                        console.log('Cart updated:', data);
                    });

            });
        });
    });
</script>


<?php include(SHARED_PATH . "/attendee_footer.php"); ?>


<!-- Sidebar code remains the same -->

</php>