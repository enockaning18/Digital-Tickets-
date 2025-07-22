<?php require_once('../private/initialize.php');
require_once('../private/shared/index_loader.php');
require_once('../private/shared/index_header.php');
$event = Event::find_event_published();
error_reporting(E_ALL);
ini_set('display_errors', 1);

?>
<div class="card shadow-sm border-0 mb-5 p-3 bg-light">
    <div class="row align-items-center justify-content-between">
        <!-- Left: Event Count -->
        <div class="col-12 col-lg-6 text-center text-lg-start mb-2 mb-lg-0">
            <span class="text-muted fw-semibold fs-6">🎉 48 event(s) found</span>
        </div>

        <!-- Right: Buttons -->
        <div class="col-12 col-lg-6 text-center text-lg-end d-flex justify-content-center justify-content-lg-end gap-2">
            <!-- Calendar View Toggle -->
            <button class="btn btn-outline-primary" data-bs-toggle="collapse" data-bs-target="#events-calendar" aria-expanded="false" aria-controls="events-calendar" title="Toggle Calendar View">
                <i class="bi bi-calendar3"></i> Calendar
            </button>

            <div id="loadingSpinner" style="display:none;" class="text-center">
                <div class="spinner-border text-primary" role="status">
                    <span class="visually-hidden">Loading...</span>
                </div>
            </div>

            <!-- RSS Feed -->
            <a href="https://ayatickets.com/rss" target="_blank" class="btn btn-outline-secondary" title="Events RSS Feed">
                <i class="bi bi-rss-fill"></i> RSS
            </a>
        </div>
    </div>
</div>



<!-- main container starts here -->
<div class="row">
    <aside class="col-lg-3 order-2 order-lg-1">
        <div class="card shadow-sm border-0 p-3">
            <form id="filterForm">
                <!-- Keyword -->
                <div class="mb-4">
                    <label for="keyword" class="form-label fw-semibold text-muted">Keyword</label>
                    <input id="keyword" name="keyword" type="text" class="form-control" placeholder="Search by keyword...">
                </div>

                <!-- Category -->
                <div class="mb-4">
                    <label for="category" class="form-label fw-semibold text-muted">Category</label>
                    <select id="category" name="category" class="form-select">
                        <option value="">Select a category</option>
                        <option value="business-professional">Business / Professional</option>
                        <option value="charity-causes">Charity / Causes</option>
                        <option value="cinema-theatre-movies">Cinema / Theatre / Movies</option>
                        <option value="community-culture">Community / Culture</option>
                        <option value="conference-seminar-networking">Conference / Seminar / Networking</option>
                        <option value="family-education">Family / Education</option>
                        <option value="fashion-beauty">Fashion / Beauty</option>
                        <option value="festivals-spectacle">Festivals / Spectacle</option>
                        <option value="food-drink">Food / Drink</option>
                        <option value="game-competition">Game / Competition</option>
                        <option value="museum-monument">Museum / Monument</option>
                        <option value="music-concerts-live-shows">Music / Concerts / Live Shows</option>
                        <option value="other">Other</option>
                        <option value="performing-visual-arts">Performing / Visual Arts</option>
                        <option value="religion-spirituality">Religion / Spirituality</option>
                        <option value="sports-fitness-health-and-wellness">Sports / Fitness / Health and Wellness</option>
                        <option value="travel-outdoor-camp">Travel / Outdoor / Camp</option>
                        <option value="workshop-training">Workshop / Training</option>
                    </select>
                </div>

                <!-- Date -->
                <div class="mb-4">
                    <label class="form-label fw-semibold text-muted">Date</label>
                    <div class="form-check">
                        <input type="radio" class="form-check-input" id="today" name="startdate" value="today">
                        <label class="form-check-label" for="today">Today</label>
                    </div>
                    <div class="form-check">
                        <input type="radio" class="form-check-input" id="tomorrow" name="startdate" value="tomorrow">
                        <label class="form-check-label" for="tomorrow">Tomorrow</label>
                    </div>
                    <div class="form-check">
                        <input type="radio" class="form-check-input" id="thisweekend" name="startdate" value="thisweekend">
                        <label class="form-check-label" for="thisweekend">This Weekend</label>
                    </div>
                    <div class="form-check">
                        <input type="radio" class="form-check-input" id="thismonth" name="startdate" value="thismonth">
                        <label class="form-check-label" for="thismonth">This Month</label>
                    </div>
                    <div class="form-check">
                        <input type="radio" class="form-check-input" id="pickadate" name="startdate" value="all">
                        <label class="form-check-label" for="pickadate">Pick a Date</label>
                    </div>
                </div>

                <!-- Price Range -->
                <div class="mb-4">
                    <label class="form-label fw-semibold text-muted">Ticket Price</label>
                    <div class="form-check mb-2">
                        <input type="checkbox" class="form-check-input" id="free-events-only" name="freeonly" value="1">
                        <label class="form-check-label" for="free-events-only">Free Events Only</label>
                    </div>
                    <div class="d-flex gap-2">
                        <input type="number" name="pricemin" class="form-control" placeholder="Min ₵">
                        <input type="number" name="pricemax" class="form-control" placeholder="Max ₵">
                    </div>
                </div>

                <!-- Search Button -->
                <div>
                    <button type="submit" class="btn btn-primary w-100">
                        <i class="fas fa-search me-1"></i> Search
                    </button>
                </div>
            </form>
        </div>
    </aside>



    <div class="col-lg-9 order-1 order-lg-2">
        <div class="row" id="eventResults">



            <?php foreach ($event as $event) {
                $event_name_slug = slugify($event->event_name); ?>

                <div class="col-12 col-sm-6 col-lg-6 mb-3">
                    <div class="card-event shadow-sm" onclick="window.location.href='view_event.php?event=<?php echo urlencode($event_name_slug) ?>&event_reference_id=<?php echo $event->event_reference_id ?>'" style="cursor: pointer;">

                        <div class="position-relative event-image" loading="lazy" style="background-image: url('organizer/uploads/<?php echo $event->image ?>');">
                            <a href="view_event.php?event=<?php echo urlencode($event_name_slug) ?>&event_reference_id=<?php echo $event->event_reference_id ?>" class="stretched-link"></a>
                            <div class="date-badge"> <?php echo $event->event_date_time_start ?></div>
                        </div>

                        <div class="info-wrap">
                            <!-- EVENT NAME -->
                            <h5 class="mb-2 text-truncate" title="<?php echo $event->event_name ?>"><?php echo $event->event_name ?></h5>

                            <!-- Venue -->
                            <div class="venue text-muted mb-1">
                                <span class="d-inline-block text-truncate" style="max-width: 100%;" title="<?php echo $event->event_venue ?>"><?php echo $event->event_venue ?></span>
                            </div>

                            <div class="organizer text-muted small mb-2">
                                Hosted by <span class="fw-bold"><?php echo $event->organizer_name ?></span>
                            </div>

                            <!-- PRICE & USSD row -->
                            <div class="d-flex align-items-center justify-content-between mt-3">
                                <span class="badge-price"><?php echo $event->ticket_price ?>.00</span>
                                <a href="tel:*365*88*757#" class="ussd-code" onclick="event.stopPropagation();">*365*88*757#</a>
                            </div>

                        </div>
                    </div>
                </div>
            <?php } ?>
            <style>
                .card-event {
                    width: 340px;
                    margin: 1rem auto;
                    background-color: #fff;
                    border-radius: 1rem;
                    overflow: hidden;
                    position: relative;
                    transition: transform 0.3s, box-shadow 0.3s;
                }

                .card-event:hover {
                    transform: translateY(-5px);
                    box-shadow: 0 15px 30px rgba(0, 0, 0, 0.15);
                }

                .card-event a.stretched-link {
                    position: absolute;
                    inset: 0;
                    z-index: 1;
                    text-decoration: none;
                }

                /* TOP IMAGE */
                .event-image {
                    height: 200px;
                    background-size: cover;
                    background-position: center;
                    position: relative;
                    border-radius: 1rem 1rem 0 0;
                }

                /* DATE BADGE */
                .date-badge {
                    position: absolute;
                    top: 0.75rem;
                    left: 0.75rem;
                    font-size: 0.75rem;
                    padding: 0.3rem 0.6rem;
                    font-weight: bold;
                    backdrop-filter: blur(6px);
                    background-color: rgba(0, 0, 0, 0.7);
                    color: #fff;
                    border-radius: 0.5rem;
                    z-index: 2;
                }

                /* INFO WRAP */
                .info-wrap {
                    padding: 1rem 1rem 1.5rem;
                    position: relative;
                    z-index: 2;
                }

                .venue {
                    font-size: 0.9rem;
                    line-height: 1.2;
                    margin-bottom: 0.25rem;
                }

                .venue .text-truncate {
                    overflow: hidden;
                    white-space: nowrap;
                    text-overflow: ellipsis;
                }

                .organizer {
                    font-size: 0.85rem;
                    color: #6c757d;
                }

                /* BADGES */
                .badge-free {
                    background-color: #198754;
                    color: #fff;
                    padding: 0.3rem 0.6rem;
                    font-size: 0.85rem;
                    border-radius: 0.4rem;
                }

                .badge-price {
                    background: #FD6C5D;
                    color: #fff;
                    padding: 0.3rem 0.6rem;
                    font-size: 0.85rem;
                    border-radius: 0.4rem;
                }

                .badge-warning {
                    background: #ffc107;
                    color: #333;
                    padding: 0.3rem 0.6rem;
                    font-size: 0.85rem;
                    border-radius: 0.4rem;
                }

                .badge-danger {
                    background-color: #dc3545;
                    color: #fff;
                }

                /* USSD CODE */
                .ussd-code {
                    background: #a00b34;
                    /* darker than #c3073f */
                    color: #fff;
                    border-radius: 1rem;
                    padding: 0.3rem 0.75rem;
                    font-size: 0.8rem;
                    white-space: nowrap;
                    font-weight: 500;
                    text-decoration: none;
                }

                .ussd-code:hover {
                    background: #bf0a30;
                    color: #fff;
                    transition: background-color 0.3s ease;
                }

                /* ORDER REFERENCE */
                .order-reference a {
                    font-size: 0.8rem;
                    text-decoration: none;
                }

                /* FLEX HELPERS */
                .d-flex {
                    display: flex !important;
                }

                .align-items-center {
                    align-items: center !important;
                }

                .justify-content-between {
                    justify-content: space-between !important;
                }

                .mt-3 {
                    margin-top: 1rem !important;
                }

                .text-truncate {
                    overflow: hidden;
                    white-space: nowrap;
                    text-overflow: ellipsis;
                }

                .card-filter label {
                    font-size: 0.9rem;
                    color: #555;
                }

                .card-filter .form-control,
                .card-filter .form-select {
                    border-radius: 0.375rem;
                }

                .card-filter .form-check-label {
                    font-weight: 500;
                    color: #333;
                }

                .card.bg-light {
                    background-color: #f8f9fa !important;
                    border-radius: 0.75rem;
                }

                .btn-outline-primary,
                .btn-outline-secondary {
                    border-width: 1.5px;
                }

                .text-muted.fs-6 {
                    font-size: 1rem;
                }
            </style>

            <script>
                document.getElementById('filterForm').addEventListener('submit', function(e) {
                    e.preventDefault();

                    const formData = new FormData(this);
                    const queryString = new URLSearchParams(formData).toString();

                    document.getElementById('loadingSpinner').style.display = 'block';

                    fetch('../private/shared/filter_events.php?' + queryString)
                        .then(response => response.text())
                        .then(html => {
                            document.getElementById('eventResults').innerHTML = html;
                        })
                        .catch(error => console.error('Error:', error))
                        .finally(() => {
                            document.getElementById('loadingSpinner').style.display = 'none';
                        });
                });
            </script>



            <?php include('../private/shared/index_footer.php'); ?>


            </body>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

            </html>