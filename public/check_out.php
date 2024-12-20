<?php
require_once('../private/initialize.php');
require_once('../private/shared/index_header.php');
?>



<section class="mt-5 m-0 row d-flex justify-content-around ">
    <div class=" col-sm-12 col-lg-6 p-0 ">
        <div class="rounded rounded-bottom-0 text-white ps-4 py-2" style="background-color: #C3073F">
            <h5> Payment Summary</h5>
        </div>
        <hr class="m-0 p-0">
        <div class="card-body rounded shadow rounded p-3">
            <div class="">
                <table class="table table-hover">
                    <thead class="text-muted">
                        <tr>
                            <th style="width:55%;">Event / Ticket</th>
                            <th style="width:15%;" class="d-none d-sm-table-cell" width="100">Price</th>
                            <th style="width:15%;" class="d-none d-sm-table-cell text-center" width="100">Quantity</th>
                            <th style="width:15%;" class="d-none d-sm-table-cell text-right" width="100">Subtotal</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td width="55%">
                                <figure class="d-flex gap-3">
                                    <div class="col-3 my-auto">
                                        <img src="organizer/uploads/6763578d0c6583.71458037.jpg" class="img-thumbnail img-sm img-lazy-load b-loaded">
                                        <dl class="text-center mt-2">
                                            <dd class="">Regular</dd>
                                        </dl>
                                    </div>
                                    <figcaption class="my-auto">
                                        <a href="/en/event/party-shop-media-xmas-trip-to-cape-coast" class="text-decoration-none">
                                            <h6 style="color:C3073F;">Party Shop Media</h6>
                                        </a>
                                        <dl class="mb-0 small">
                                            <dt>When</dt>
                                            <dd>Mon 02 Dec 2024, 4:00 AM GMT</dd>
                                        </dl>
                                        <dl class="mb-0 small">
                                            <dt>Where</dt>
                                            <dd>University Of Cape Coast</dd>
                                        </dl>
                                        <dl class="mb-0 small">
                                            <dt>Organized by</dt>
                                            <dd><a href="/en/organizer/party-shop-media" style="color:C3073F;" class="text-decoration-none" target="_blank">Party Shop Media</a></dd>
                                        </dl>
                                    </figcaption>
                                </figure>
                            </td>
                            <td width="15%" class="d-none d-sm-table-cell">
                                <span>₵250</span>
                            </td>
                            <td width="15%" class="text-center d-none d-sm-table-cell">
                                1
                            </td>
                            <td width="15%" class="d-none d-sm-table-cell text-right">
                                <span>₵250</span>
                            </td>
                        </tr>
                    </tbody>
                </table>

            </div>
        </div>

        <form name="checkout" method="post" class="" novalidate="novalidate">

            <div class="card mt-4 rounded shadow border-0">
                <div class="card-header border-bottom-0" style="background-color:#F1F3F7;">
                    <h5 class="mb-0">Send Ticket to Email</h5>
                </div>
                <div class="card-body">
                    <form name="checkout" method="post" class="" novalidate="novalidate">
                        <div class="mb-3">
                            <label for="checkout_email" class="form-label required">Enter your Email Address</label>
                            <input type="email" id="checkout_email" name="checkout[email]" class="form-control" placeholder="example@mail.com" required>
                            <small class="text-muted">We'll send your ticket to this email.</small>
                        </div>
                    </form>
                </div>
            </div>

            <div class="card mt-4 rounded shadow border-0">
                <div class="card-header border-bottom-0" style="background-color:#F1F3F7;">
                    <h5 class="b mb-0">Pay With</h5>
                </div>
                <div class="card-body">
                    <div class="form-row">
                        <div class="col-12 form-group">
                            <div class="custom-control custom-radio custom-control-inline">
                                <input class="custom-control-input" id="paystack_checkout" type="radio" name="payment_gateway" value="paystack_checkout" checked="checked">
                                <label class="custom-control-label required my-auto" for="paystack_checkout">
                                    <img src="../bootstrap-config/images/64f0f53a3bc46248573985.png" class="img-80-80 mr-3 ml-3">
                                    Mobile Money, Bank Card
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mt-4">
                <button id="checkout_submit" type="submit" class="btn text-white w-100 p-2" style="background-color: C3073F;">
                    <i class="bi bi-wallet2 me-2"></i>Pay Now
                </button>
            </div>


        </form>
    </div>

    <div class="border col-sm-12 col-lg-4 d-flex flex-column border border-0  p-0">

        <div class="rounded  text-white ps-4 py-2 mb-3" style="background-color: #C3073F">
            <h5> Payment Info</h5>
        </div>

        <div class="sticky-top sticky-sidebar">

            <div class="d-flex my-4 justify-content-between">
                <div>
                    <h4>Total</h4>
                </div>
                <div class="">
                    <h4> ₵200 </h4>
                </div>
            </div>
            <!-- Left-aligned message about the processing fee below the total, shown only if there's an amount -->
            <div class="text-left text-danger">
                <small>* A processing fee will be applied during payment.</small>
            </div>

            <dl class="dlist-align h5" id="amountInDollar" style="display: none">
                <dt>Total in (USD)</dt>
                <dd class="text-right ml-5"><strong>$24.00</strong></dd>
            </dl>

            <div class="row" id="paystack">
                <div class="col">
                    <img src="../bootstrap-config//images/paystack.png" class="width-auto img-fluid" />
                </div>
            </div>
        </div>

    </div>





    <!-- </div> -->
</section>
</div>
</container>


</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>



</php>