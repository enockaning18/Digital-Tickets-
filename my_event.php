<?php include('organizer_shared/header.php') ?>

<div class="border col-md-12 col-lg-9 flex-column shadow-sm rounded 0-0 p-md-5">
    <div class="d-block d-md-flex  justify-content-between align-items-center  py-3 px-4 border rounded shadow-sm" style="background-color: #ffffff;">
        <!-- Results Found -->
        <div class="text-muted mb-2 mb-md-0">
            <strong>1</strong> result(s) found
        </div>

        <div class="d-flex align-items-center mb-2 mb-md-0">
            <label for="event_category" class="mb-0 me-2 fw-bold text-secondary">Sort by:</label>
            <select class="form-select form-select-sm" style="width: 200px; background-color: #F1F3F7;">
                <option selected>Creation Date (asc)</option>
                <option>Creation Date (desc)</option>
            </select>
        </div>

        <div class=" d-flex gap-md-3 gap-5 align-items-center ">
            <div>
                <a href="add_event.php" class="btn btn-danger d-flex align-items-center gap-2 text-decoration-none">
                    <i class="bi bi-plus fw-bold"></i>
                    <span>Add New Event</span>
                </a>
            </div>

            <div>
                <button type="button" class="btn btn-danger d-flex align-items-center" onclick="toggleTargetDiv()">
                    <i class="bi bi-dash fw-bold"></i>
                </button>
            </div>
        </div>
    </div>

    <div id="targetDiv" class="toggle-div">
        <div class="d-flex justify-content-between mt-3">
            <div class="d-flex flex-column">
                <div class="mb-4">
                    <label for="event_title" class="mb-3" require>Event</label>
                    <input type="text" style="background-color: #F1F3F7;" id="event_name" name="event_name" required="required" maxlength="100" class="form-control">
                </div>

                <div class="mb-4">
                    <div class="form-check form-check-outline">
                        <input class="form-check-input" type="radio" name="filter" id="inlineRadio1" value="option1" checked>
                        <label class="form-check-label" for="inlineRadio1">All</label>
                    </div>
                    <div class="form-check form-check-outline">
                        <input class="form-check-input" type="radio" name="filter" id="inlineRadio2" value="option2">
                        <label class="form-check-label" for="inlineRadio2">Published Only</label>
                    </div>
                    <div class="form-check form-check-outline">
                        <input class="form-check-input" type="radio" name="filter" id="inlineRadio3" value="option3">
                        <label class="form-check-label" for="inlineRadio3">Draft Only</label>
                    </div>
                </div>
            </div>

            <div class="d-flex flex-column">
                <div class="mb-4">
                    <label for="event_title" class="mb-3" require>Category</label>
                    <input type="text" style="background-color: #F1F3F7;" id="category_name" name="category_name" required="required" maxlength="100" class="form-control">
                </div>
                <div class="mb-4">
                    <div class="form-check form-check-outline">
                        <input class="form-check-input" type="radio" name="category_filter" id="inlineRadio1" value="option1" checked>
                        <label class="form-check-label" for="inlineRadio1">All</label>
                    </div>
                    <div class="form-check form-check-outline">
                        <input class="form-check-input" type="radio" name="category_filter" id="inlineRadio2" value="option2">
                        <label class="form-check-label" for="inlineRadio2">Published Only</label>
                    </div>
                    <div class="form-check form-check-outline">
                        <input class="form-check-input" type="radio" name="category_filter" id="inlineRadio3" value="option3">
                        <label class="form-check-label" for="inlineRadio3">Draft Only</label>
                    </div>
                </div>
            </div>

            <div class="d-flex flex-column">
                <div class="mb-4">
                    <label for="event_title" class="mb-3" require>Venue</label>
                    <input type="text" style="background-color: #F1F3F7;" id="venue_name" name="venue_name" required="required" maxlength="100" class="form-control">
                </div>
                <div class="d-flex gap-4">
                    <button type="button" class="btn text-white" style="background-color: #c3073f">
                        <i class="bi bi-search"></i>
                    </button>
                    <button type="button" class="btn text-white" style="background-color: #c3073f">
                        <i class="bi bi-x-octagon"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>



    <div class="card-body mt-3">
        <div class="table-responsive text-nowrap">
            <table class="table table-hover text-center align-middle">
                <thead>
                    <tr class="flex-row align-items-center ms-auto fs-5 text-center">
                        <th class="fw-normal text-start">Event</th>
                        <th class="fw-normal">Sales</th>
                        <th class="fw-normal">Status</th>
                        <th class="fw-normal">Attendance</th>
                        <th><i class="bi bi-gear-wide-connected"></i></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <!-- Event Column -->
                        <td>
                            <div class="d-flex justify-content-start align-items-center">
                                <div class="avatar-wrapper">
                                    <div class="avatar me-2 rounded">
                                        <img src="bootstrap-config/images/ball.jpeg" alt="Avatar" class="rounded-circle" style="width: 50px; height: 50px;">
                                    </div>
                                </div>
                                <div class="d-flex flex-column">
                                    <span class="emp_name text-truncate" style="color: #c3073f;">Accra Auto Extravaganza</span>
                                </div>
                            </div>
                        </td>

                        <td>
                            <div>
                                <div><strong>20%</strong></div>
                                <small class="text-muted">0 tickets sold</small>
                            </div>
                            <div class="progress progress-xs" style=" height: 5px;">
                                <div class="progress-bar bg-yellow" role="progressbar" style="width: 20%; background-color: #f39c12;" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </td>

                        <td>
                            <span class="p-2 fs-6 fs-md-5" style="background-color: #f39c12;">Event not published</span>
                        </td>

                        <td>
                            <span>0%</span>
                        </td>


                        <td>
                            <div class="dropdown">
                                <button type="button" class="btn p-0" data-bs-toggle="dropdown">
                                    <i class="bi bi-stack" style="color: #c3073f"> Options</i>
                                </button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href=""><i class="bx bx-edit-alt me-1"></i> Edit</a>
                                    <a class="dropdown-item" href=""><i class="bx bx-edit-alt me-1"></i> Delete</a>
                                </div>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

</div>
</section>
</div>
</container>


</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<style>
    .toggle-div {
        opacity: 0;
        max-height: 0;
        overflow: hidden;
        transition: opacity 0.5s ease, max-height 0.5s ease;
    }

    .toggle-div.show {
        opacity: 1;
        max-height: 500px;
        /* Set a max height for smooth transition */
    }
</style>

<script>
    function toggleTargetDiv() {
        const targetDiv = document.getElementById('targetDiv');
        if (targetDiv.classList.contains('show')) {
            targetDiv.classList.remove('show'); // Hide the div
        } else {
            targetDiv.classList.add('show'); // Show the div
        }
    }
</script>

<?php include('organizer_shared/footer.php') ?>


<!-- Sidebar code remains the same -->

</php>