<?php
include("../../private/initialize.php");
include(SHARED_PATH . "/attendee_header.php");
attendee_require_login();

$reference = $_GET['reference'] ?? '';
$attendee_id = $attendee_session->attendee_id;


$modal_id = 'modal_' . preg_replace('/[^A-Za-z0-9\_]/', '',  $reference); ?>


<?php if ($reference != null) {
    $query_command = " SELECT event.image, event.id, event.event_name, amount, event.ticket_name, attendee_orders.created_at, ";
    $query_command .= " event.event_venue, ticket_payments.reference, ticket_payments.email, event.ticket_price, organizer.organizer_name, ";
    $query_command .= " attendee_orders.quantity, amount_payed, transaction_status, event_date_time_start ";
    $query_command .= " FROM attendee_orders JOIN event ON attendee_orders.ticket_id = event.id ";
    $query_command .= "  JOIN organizer ON event.organizer_id = organizer.id ";
    $query_command .= " JOIN attendee ON attendee_orders.attendee_id = attendee.id ";
    $query_command .= " JOIN ticket_payments ON attendee_orders.reference = ticket_payments.reference ";
    $query_command .= "  WHERE attendee_orders.reference ='" . $reference . "'";

    $reference_data = $database->execute_query($query_command);

    while ($reference_result = mysqli_fetch_assoc($reference_data)) { ?>
        <div class="border border-0 col-md-12 col-lg-9 flex-column rounded ">

            <div class="card-body rounded shadow p-3 mb-4 card-hover">
                <div class="card-body p-4 text-center">
                    <div class="success-icon mb-3">
                        <i class="bi bi-check-circle-fill" style="color: #0ba; font-weight: 900px; font-size: 3rem;"></i>
                    </div>

                    <h3 class="mb-3">Thank you for your order!</h3>
                    <p class="lead mb-2">Reference ID: <span class="font-weight-bold"><?php echo $reference_result['reference'] ?></span></p>

                    <div class="custom-alert mt-3" style="background-color: #FD6C5D; color: white; padding: 15px; border-radius: 5px;">
                        <i class="bi bi-envelope-fill me-1"></i> Your ticket has been sent to:
                        <strong><?php echo $reference_result['email'] ?></strong>
                    </div>

                    <p class="text-muted mt-2">
                        <i class="bi bi-info-circle-fill me-1"></i> Please check your inbox or spam folder if you can't find it.
                    </p>
                </div>
            </div>



            <div class="row">
                <div class="modal fade" id="<?php echo $modal_id; ?>" aria-hidden="true" aria-labelledby="<?php echo $modal_id; ?>message" tabindex="-1">
                    <div class="modal-dialog modal-lg modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="<?php echo $modal_id; ?>message">Order # <?php echo $reference_result['reference'] . ": " ?>Contact Organizer</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="" method="POST">
                                    <input type="hidden" name="_csrf_token" value="19Pp8n2jmBRpyZo3tMJCB9Pm_QNpz3v6iM0OYy3zGMs">

                                    <div class="form-group">
                                        <label for="message" class="form-label required">Your Message</label>
                                        <textarea name="message" id="message" class="form-control" rows="5" required=""></textarea>
                                    </div>
                                    <button type="submit" class="btn text-white btn-block mt-4 w-100" style="background: #C3063F;">
                                        <i class="bi bi-send-check-fill me-2"></i></i> Send Message
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 mb-4 d-none d-md-block">

                </div>

                <div class="col-md-6 mb-4 d-none d-md-block ">
                    <div class="card shadow-sm border-0 justify-center card-hover">
                        <div class="card-body p-4">
                            <button type="button" class="btn btn-contact w-100" data-bs-toggle="modal" data-bs-target="#<?php echo $modal_id; ?>">
                                <i class="bi bi-envelope-fill me-1"></i> Contact Organizer
                            </button>

                        </div>
                    </div>
                </div>
            </div>



            <div class="card shadow-sm border-0 mb-4 card-hover">
                <div class="card-header bg-white border-0 ">
                    <h5 class="mb-0">
                        <i class="bi bi-ticket-detailed-fill me-1 justify-center text-center" style="color: #C3063F;"></i></i> Your Tickets
                    </h5>
                </div>

                <div class="card-body p-0">
                    <div class="accordion" id="accordionOrderElements">
                        <div class="ticket-card">
                            <div class="ticket-header" id="heading1">
                                <div class="d-flex justify-content-between align-items-center p-3">
                                    <div>
                                        <h6 class="mb-1">Order Element #1</h6>
                                    </div>
                                    <div class="text-right">
                                        <span class="badge badge-primary rounded-0 p-2" style="background:#C3063F;"><?php echo $reference_result['quantity'] ?> ticket(s)</span>
                                    </div>
                                </div>
                            </div>

                            <div id="collapse1" class="collapse show" aria-labelledby="heading1" data-parent="#accordionOrderElements">
                                <div class="ticket-body p-3 border-top">
                                    <div class="row">
                                        <!-- Left Content -->
                                        <div class="col-md-8">
                                            <div class="event-preview h-100">
                                                <div class="d-flex align-items-center gap-3">
                                                    <div class="flex-shrink-0">
                                                        <img src="../../public/organizer/uploads/<?php echo htmlspecialchars($reference_result['image']); ?>" style="max-width:80px; max-height:80px;" loading="lazy" class="img-thumbnail rounded">
                                                    </div>
                                                    <div class="flex-grow-1">
                                                        <a href="#" class="text-decoration-none">
                                                            <h6 class="m-0"><?php echo " " . $reference_result['organizer_name']; ?></h6>
                                                        </a>
                                                        <dl class="dlist-inline small mb-1">
                                                            <dd class="m-0 p-0"><?php echo " " . $reference_result['ticket_name']; ?></dd>
                                                        </dl>
                                                        <dl class="dlist-inline small mb-1">
                                                            <span><strong>When:</strong><?php echo " " . $reference_result['event_date_time_start']; ?></span>

                                                        </dl>
                                                        <dl class="dlist-inline small mb-1">
                                                            <span><strong>Where:</strong><?php echo " " . $reference_result['event_venue']; ?></span>

                                                        </dl>
                                                        <dl class="dlist-inline small mb-0">
                                                            <span><strong>Organized by:</strong>
                                                                <?php echo $reference_result['event_name']; ?>
                                                            </span>

                                                        </dl>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Right Content -->
                                        <div class="col-md-4">
                                            <div class="ticket-details h-100 d-flex flex-column justify-content-between">
                                                <div>
                                                    <div class="d-flex justify-content-between mb-2">
                                                        <span class="text-muted">Quantity:</span>
                                                        <span class="fw-medium"><?php echo $reference_result['quantity'] ?></span>
                                                    </div>
                                                    <div class="d-flex justify-content-between mb-2">
                                                        <span class="text-muted">Price per Ticket:</span>
                                                        <span class="fw-medium"><?php echo $reference_result['ticket_price'] ?></span>
                                                    </div>
                                                </div>
                                                <div class="d-flex justify-content-between pt-2 border-top">
                                                    <span class="fw-bold">Total:</span>
                                                    <span class="fw-bold">₵ <?php echo $reference_result['amount_payed'] ?></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <style>
                                .ticket-details {
                                    min-height: 100%;
                                    display: flex;
                                    flex-direction: column;
                                    justify-content: space-between;
                                }

                                .btn-contact {
                                    border-color: #C3063F;
                                    color: #C3063F;
                                    background-color: transparent;
                                    transition: 0.3s ease;
                                }

                                .btn-contact:hover {
                                    background-color: #C3063F;
                                    color: white;
                                }

                                .card-hover {
                                    transition: all 0.3s ease;
                                    cursor: pointer;
                                }

                                .card-hover:hover {
                                    box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
                                    transform: translateY(-5px);
                                    background-color: #f8f9fa;
                                    /* Optional: light background on hover */
                                }
                            </style>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php
    } ?>
    <?php } else {


    // $event = Event::find_by_reference_id($organizer_id);
    $query_command = " SELECT event.image,event.id, event.event_name, amount, event.ticket_name,attendee_orders.`created_at`,event.event_venue, ticket_payments.reference, ticket_payments.email, ";
    $query_command .= " event.id,event.ticket_price, attendee_orders.quantity, amount_payed, transaction_status, event_date_time_start";
    $query_command .= " FROM attendee_orders ";
    $query_command .= " JOIN `event` ON attendee_orders.ticket_id = event.id ";
    $query_command .= " JOIN `attendee` ON attendee_orders.attendee_id = attendee.id ";
    $query_command .= " JOIN `ticket_payments` ON attendee_orders.reference = ticket_payments.reference ";
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
                                    <figure class="d-flex gap-3 d-none d-md-flex">
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
                                                    <dd><?php echo htmlspecialchars($purchased_data['ticket_name']); ?>(<?php echo htmlspecialchars($purchased_data['quantity']); ?>)</dd>
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
                                    <div class="d-md-none">

                                        <div class="card mb-3 shadow-sm">
                                            <div class="card-body">
                                                <div class="d-flex align-items-center">
                                                    <img src="../../public/organizer/uploads/<?php echo htmlspecialchars($purchased_data['image']); ?>" class="rounded me-3" width="60" alt="<?php echo htmlspecialchars($purchased_data['event_name']); ?>">
                                                    <div>
                                                        <h6 class="text-danger"> <?php echo htmlspecialchars($purchased_data['event_name']); ?></h6>
                                                        <small><?php echo htmlspecialchars($purchased_data['ticket_name']); ?> (<?php echo htmlspecialchars($purchased_data['quantity']); ?>)</small>
                                                        <br>
                                                        <small><i class="bi bi-calendar-event"></i> <?php echo htmlspecialchars($purchased_data['event_date_time_start']); ?></small>
                                                        <br>
                                                        <small><i class="bi bi-geo-alt"></i> <?php echo htmlspecialchars($purchased_data['event_venue']); ?></small>
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="d-flex justify-content-between">
                                                    <span class="small">Order Date: <?php echo $purchased_data['created_at']; ?></span>
                                                    <span class="badge bg-<?php echo ($purchased_data['transaction_status'] === 'success') ? 'success' : 'secondary'; ?>">
                                                        <?php echo ($purchased_data['transaction_status'] === 'success') ? 'Paid' : 'Pending'; ?>
                                                    </span>
                                                </div>
                                                <div class="mt-3 text-center">
                                                    <button class="btn btn-outline-danger btn-sm">View Details</button>
                                                    <button class="btn btn-outline-secondary btn-sm">Print Ticket</button>
                                                </div>
                                            </div>
                                        </div>

                                    </div>


                                </td>

                                <td width="15%" class="d-none d-sm-table-cell ">
                                    <span><?php echo $purchased_data['created_at']; ?></span>
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
                                            <span class="dropdown-item" data-bs-target="#exampleModalToggle" data-bs-toggle="modal" class="bx bx-edit-alt me-1"> <i class="bi bi-ticket-detailed-fill me-2"></i>Payment Details</span>
                                            <a class="dropdown-item" href=""><i class="bx bx-edit-alt me-1"></i><i class="bi bi-printer-fill me-2"></i> Print Ticket</a>
                                            <a class="dropdown-item" href="my_ticket.php?reference=<?php echo $purchased_data['reference'] ?>"><i class="bx bx-edit-alt me-1"></i><i class="bi bi-file-spreadsheet-fill me-2"></i> Details</a>
                                            <span class="dropdown-item" data-bs-toggle="modal" data-bs-target="#<?php echo $modal_id; ?>"> <i class=" bi bi-envelope-fill me-2"></i>Contact Organizer</span>
                                        </div>
                                    </div>
                                </td>

                            </tr>

                            <!-- details modal here -->
                            <div class="modal fade" id="exampleModalToggle" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalToggleLabel"><?php echo $purchased_data['reference'] . " - " ?> Order Payment Details</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body flex-row justify-center">
                                            <div class="d-flex justify-content-center ">
                                                <img src="../../bootstrap-config/images/purchased.jpg" class="mb-3" style="max-height: 70px; max-width:70px;" alt="">
                                            </div>
                                            <p>Payment ID:<?php echo " " . $purchased_data['reference'] ?></p>
                                            <p>Amount: <?php echo "GHC " . $purchased_data['amount'] ?></p>
                                            <p>Status: Captured</p>
                                            <p>Client Email: <?php echo " " . $purchased_data['email'] ?></p>
                                            <p>Description: Tickets for: <?php echo $purchased_data['event_name'] . "(x" . $purchased_data['quantity'] . ")" ?> </p>
                                            <p>Buyer: <?php echo " " . $purchased_data['email'] . " | Platform: Team Event" ?></p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="" name="" class="btn text-white" data-bs-target="#exampleModalToggle" data-bs-toggle="modal" style="background-color: #C3063F;">Close</button>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <!-- details modal ends here -->




                            <!-- send message modal here -->
                            <div class="modal fade" id="<?php echo $modal_id; ?>" aria-hidden="true" aria-labelledby="<?php echo $modal_id; ?>message" tabindex="-1">
                                <div class="modal-dialog modal-lg modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="<?php echo $modal_id; ?>message">Order # <?php echo $purchased_data['reference'] . ": " ?>Contact Organizer</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="" method="POST">
                                                <input type="hidden" name="_csrf_token" value="19Pp8n2jmBRpyZo3tMJCB9Pm_QNpz3v6iM0OYy3zGMs">

                                                <div class="form-group">
                                                    <label for="message" class="form-label required">Your Message</label>
                                                    <textarea name="message" id="message" class="form-control" rows="5" required=""></textarea>
                                                </div>
                                                <button type="submit" class="btn text-white btn-block mt-4 w-100" style="background: #C3063F;">
                                                    <i class="bi bi-send-check-fill me-2"></i></i> Send Message
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- send message modal ends here -->
                        <?php
                        } ?>
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
<?php } ?>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<?php include(SHARED_PATH . "/attendee_footer.php"); ?>
</php>