<body>
    <?php

    $details = Event::find_event_by_id($event_reference_id);
    if ($details == true) {
        // calculate number of tickets bought
        $ticket_bought_query_command = " SELECT SUM(quantity) AS quantity, total_tickets   FROM `attendee_orders` INNER JOIN event ON attendee_orders.ticket_id = event.id WHERE ticket_id = '" . $details->id . "' AND reference != 'NULL'; ";
        $bought_ticket = $database->execute_query($ticket_bought_query_command);

        $amount_bought = " SELECT SUM(amount_payed) AS amount_payed   FROM `attendee_orders` WHERE ticket_id = '" . $details->id . "' AND reference != 'NULL'; ";
        $bought_amount = $database->execute_query($amount_bought); ?>


        <div class="modal fade show modal-xl" id="eventModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="false">
            <div class="modal-dialog">
                <div class="modal-content col">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel"><?php echo $details->event_name ?> Details: </h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="table-responsive">
                                    <table class="table table-borderless table-striped table-hover table-sm">
                                        <thead>
                                            <tr>
                                                <th colspan="2"><i class="fas fa-file-alt fa-fw text-muted"></i> General information</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td width="30%">Status</td>
                                                <td><?php if ($details->status === '1') { ?>

                                                        <span class="badge bg-success">Published</span>
                                                    <?php } else {  ?>
                                                        <span class="badge bg-danger" style="background-color: #f39c12;">Not Published</span>
                                                    <?php } ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td width="30%">Title</td>
                                                <td><?php echo $details->event_name ?></td>
                                            </tr>
                                            <tr>
                                                <td>Reference</td>
                                                <td><?php echo $details->id ?></td>
                                            </tr>
                                            <tr>
                                                <td>Creation date</td>
                                                <td><?php echo $details->event_date_time_start ?></td>
                                            </tr>
                                            <tr>
                                                <td>Update date</td>
                                                <td><?php echo $details->event_date_time_start ?></td>
                                            </tr>
                                            <tr>
                                                <td>Views</td>
                                                <td>0 view(s)</td>
                                            </tr>
                                            <tr>
                                                <td>Added to favorites by</td>
                                                <td>0 user(s)</td>
                                            </tr>
                                            <tr>
                                                <td>Category</td>
                                                <td><?php echo $details->event_category ?></td>
                                            </tr>
                                            <tr>
                                                <td>Publicly show attendees</td>
                                                <td>No</td>
                                            </tr>
                                            <tr>
                                                <td>Allow attendees to leave reviews</td>
                                                <td>No</td>
                                            </tr>
                                        </tbody>

                                    </table>
                                </div>
                            </div>
                            <div class="col-lg-6 ">
                                <div class="table-responsive">
                                    <table class="table table-borderless table-striped table-hover table-sm">
                                        <thead>
                                            <tr>
                                                <th colspan="2"><i class="fas fa-image fa-fw text-muted"></i> Images</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td width="30%">Main image</td>
                                                <td>
                                                    <a class="fancybox" href="/event/public/organizer/uploads/<?php echo $details->image ?>" data-toggle="tooltip" title="Enlarge">
                                                        <img src="uploads/<?php echo $details->image ?>" class="img-thumbnail" style="width: 240px; ">
                                                    </a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Gallery</td>
                                                <td>
                                                    1 image(s)
                                                </td>
                                            </tr>
                                        </tbody>

                                    </table>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="table-responsive">
                                    <table class="table table-borderless table-sm ">
                                        <thead>
                                            <tr class="row d-flex">
                                                <th class="col-lg-6"><i class="fas fa-calendar fa-fw text-muted px-1 "></i> Event dates</th>
                                                <th class="col-lg-6"><i class="fas fa-ticket-alt fa-fw text-muted  px-1 "></i> Tickets</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr class="row">
                                                <td class="col-12 col-lg-6 p-3">
                                                    <h6>Event date </h6>
                                                    <div class="table-responsive">
                                                        <table class="table table-borderless table-striped table-hover table-sm">
                                                            <tbody>
                                                                <tr>
                                                                    <td width="30%">Status</td>
                                                                    <td>
                                                                        <?php if ($details->status === '1') { ?>
                                                                            <span class="badge bg-success">Published</span>
                                                                        <?php } else {  ?>
                                                                            <span class="badge bg-danger" style="background-color: #f39c12;">Not Published</span>
                                                                        <?php } ?>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Sales (Amount)</td>
                                                                    <?php while ($total_amount = mysqli_fetch_array($bought_amount)) { ?>
                                                                        <td>
                                                                            GH₵ <?php echo $total_amount['amount_payed'] ?>
                                                                        </td>
                                                                    <?php } ?>
                                                                </tr>
                                                                <tr>
                                                                    <td>Reference</td>
                                                                    <td><?php echo $details->id ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <td width="50%">Venue</td>
                                                                    <td><?php echo $details->event_venue ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Address</td>
                                                                    <td> Kumasi, Ghana00233 , Ghana</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Tickets types</td>
                                                                    <td>1</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Start date</td>
                                                                    <td><?php echo $details->event_date_time_start ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>End date</td>
                                                                    <td><?php echo $details->event_date_time_end ?></td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </td>
                                                <td class="col-12 col-lg-6 p-3">
                                                    <h6>Ticket (<?php echo $details->ticket_name ?>)</h6>
                                                    <div class="table-responsive">
                                                        <table class="table table-borderless table-striped table-hover table-sm">
                                                            <tbody>
                                                                <tr>
                                                                    <td width="30%">Status</td>
                                                                    <td>
                                                                        <?php if ($details->status === '1') { ?>
                                                                            <span class="badge bg-success">Published</span>
                                                                        <?php } else {  ?>
                                                                            <span class="badge bg-danger" style="background-color: #f39c12;">Not Published</span>
                                                                        <?php } ?>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Sales</td>
                                                                    <?php while ($ticket = mysqli_fetch_array($bought_ticket)) { ?>
                                                                        <td>
                                                                            <?php echo $ticket['quantity'] ?> / <?php echo $ticket['total_tickets'] ?>
                                                                        </td>
                                                                    <?php } ?>
                                                                </tr>
                                                                <tr>
                                                                    <td>Price</td>
                                                                    <td>
                                                                        <?php echo $details->ticket_price ?>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Quantity</td>
                                                                    <td><?php if ($details->ticket_quantity === '0') {
                                                                            echo 'Out of Stock';
                                                                        } ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Reference</td>
                                                                    <td><?php echo $details->id ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Name</td>
                                                                    <td><?php echo $details->ticket_name ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Currently in cart</td>
                                                                    <td>0</td>
                                                                </tr>

                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="well col-xs-10 col-sm-10 col-md-6 col-xs-offset-1 col-sm-offset-1 col-md-offset-3">
                        <button id="print" onclick="printContent('eventModal');" class="btn btn-success btn-lg text-justify btn-block">
                            Print Now<span class="fas fa-print"></span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    <?php } else {
        echo "cant display data";
    }
    ?>

</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        var myModal = new bootstrap.Modal(document.getElementById('eventModal'), {
            backdrop: 'static', // Prevent closing when clicking outside
            keyboard: false // Prevent closing with ESC key
        });
        myModal.show();
    });
</script>