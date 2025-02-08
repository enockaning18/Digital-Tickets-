<?php
include("../../private/initialize.php");
include(SHARED_PATH . "/attendee_header.php");
attendee_require_login();
$attendee_id = $attendee_session->attendee_id;
// $event = Event::find_by_reference_id($organizer_id);
$query_command = " SELECT * FROM attendee_orders ";
$query_command .= " JOIN `event` ON attendee_orders.ticket_id = event.id ";
$query_command .= " JOIN `attendee` ON attendee_orders.attendee_id = attendee.id ";
$query_command .= " JOIN `ticket_payments` ON attendee_orders.reference =ticket_payments.reference ";
$query_command .= " WHERE attendee_orders.attendee_id = '" . $attendee_id . "'";
$result = $database->execute_query($query_command);

if ($result && mysqli_num_rows($result) > 0) { ?>
    <div class="border border-0 col-md-12 col-lg-9 flex-column  rounded ">
        <div class="card-body rounded shadow rounded p-3">
            <table class="table table-hover">
                <thead class="text-muted">
                    <tr>
                        <th style="width:55%;">Event / Ticket</th>
                        <figure class="d-block ">
                            <th style="width:15%;" class="d-none d-sm-table-cell" width="100">Order Date</th>
                            <th style="width:15%;" class="d-none d-sm-table-cell text-center" width="100">Status</th>
                            <th style="width:15%;" class="d-none d-sm-table-cell text-center" width="100">Action</th>
                        </figure>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($purchased_data = mysqli_fetch_assoc($result)) { ?>

                        <tr>
                            <td width="55%">
                                <figure class="d-flex gap-3">
                                    <!-- Event Image -->
                                    <div class="col-2 my-auto">
                                        <img src="../../public/organizer/uploads/<?php echo htmlspecialchars($purchased_data['image']); ?>" class="img-thumbnail img-sm img-lazy-load b-loaded" alt="<?php echo htmlspecialchars($$purchased_data['event_name']); ?>">
                                        <dl class="text-center mt-2">

                                        </dl>

                                    </div>
                                    <div>
                                        <!-- Event Details -->
                                        <figcaption class="my-auto">
                                            <a href="/en/event/party-shop-media-xmas-trip-to-cape-coast" class="text-decoration-none">
                                                <h6 style="color:#C3073F;"><?php echo htmlspecialchars($purchased_data['event_name']); ?></h6>
                                            </a>
                                            <dl class="mb-0 small">
                                                <dd><?php echo htmlspecialchars($purchased_data['ticket_name']); ?></dd>
                                            </dl>
                                            <dl class="mb-0 small">
                                                <dd>When <?php echo htmlspecialchars($purchased_data['event_date_time_start']);  ?></dd>
                                            </dl>
                                            <dl class="mb-0 small">
                                                <dd> Where<?php echo htmlspecialchars($purchased_data['event_venue']); ?></dd>
                                            </dl>
                                            <dl class="mb-0 small">
                                                <dd>
                                                    Organized by<a href="/en/organizer/party-shop-media" class="text-decoration-none" target="_blank" style="color:#C3073F;">
                                                        <?php echo htmlspecialchars($purchased_data['event_name']); ?>
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
                                        <input type="hidden" name="ticket_id" value="<?php echo htmlspecialchars($purchased_data['event_id']); ?>">

                                        <div class="d-flex align-items-center mt-2 justify-content-center">
                                            <!-- Price -->
                                            <div class="text-center" style="flex-grow: 1;">
                                                GH₵ <?php echo htmlspecialchars($purchased_data['ticket_price']); ?>
                                            </div>

                                            <!-- Quantity Input -->
                                            <div class="text-center" style="flex-grow: 1; max-width: 120px;">
                                                <input type="number" id="quantity" name="quantity" value="<?php echo htmlspecialchars($purchased_data['attendee_orders.quantity'] ?? 1); ?>" min="1" class="form-control touchspin-integer bg-white eventdate-ticket-qte" data-min="0" data-max="10" onchange="updateSubtotal()" style="max-width: 80px; margin: 0 auto;">
                                            </div>

                                            <!-- Subtotal -->
                                            <div class="text-center" style="flex-grow: 1;">
                                                <?php echo htmlspecialchars($purchased_data['amount_payed'] ?? 0); ?>
                                            </div>

                                        </div>

                                    </form>
                                </div>


                            </td>

                            <td width="15%" class="d-none d-sm-table-cell ">
                                <span><?php echo $purchased_data['created_at']; ?>.00</span>
                            </td>
                            <td width="15%" class="text-center d-none d-sm-table-cell">
                                <span class="bg-success py-1 px-3 text-white"><?php if ($purchased_data['transaction_status'] === 'success') {
                                                                                    echo "Paid";
                                                                                } else {
                                                                                    echo 'none';
                                                                                }  ?></span>
                            </td>
                            <td width="15%" class="d-none d-sm-table-cell text-center">
                                <div class="dropdown">
                                    <button type="button" class="btn p-0" data-bs-toggle="dropdown">
                                        <i class="bi bi-gear-fill"></i>
                                    </button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href=""><i class="bx bx-edit-alt me-1"></i><i class="bi bi-ticket-detailed-fill me-2"></i></i> Details</a>
                                        <a class="dropdown-item" href=""><i class="bx bx-edit-alt me-1"></i><i class="bi bi-printer-fill me-2"></i> Print Ticket</a>
                                        <a class="dropdown-item" href=""><i class="bx bx-edit-alt me-1"></i><i class="bi bi-receipt-cutoff me-2"></i> Payment Details</a>
                                    </div>
                                </div>
                            </td>

                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>

<?php } else { ?>


    <div class="border border-0 col-md-12 col-lg-9 flex-column  rounded ">
        <div class="d-block d-md-flex  align-items-center  py-3 px-4 border rounded shadow-sm text-white" style="background-color:#C3073F">
            <i class="bi bi-info-circle-fill me-2"></i>No Ticket found
        </div>
    </div>
<?php } ?>
</section>
</div>
</container>


</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>


<?php include(SHARED_PATH . "/attendee_footer.php"); ?>


<!-- Sidebar code remains the same -->

</php>