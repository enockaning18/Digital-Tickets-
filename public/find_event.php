<?php require_once('../private/initialize.php');
require_once('../private/shared/index_loader.php');
require_once('../private/shared/index_header.php');
$event = Event::find_event_published();
error_reporting(E_ALL);
ini_set('display_errors', 1);

?>
<div class="box shadow-none bg-gray mb-4">
    <div class="row">
        <div class="col-sm-12 col-lg-6 text-center text-lg-left mb-3 mb-lg-0">
            <span class="center-lg-y text-muted">35 event(s) found</span>
        </div>
        <div class="col-sm-12 col-lg-6 text-center text-lg-right">
            <a href="#events-calendar" class="btn btn-primary has-tooltip" data-toggle="collapse" title="" aria-expanded="false" aria-controls="events-calendar" data-original-title="Show events calendar"><i class="far fa-calendar fa-fw"></i></a>
            <a href="https://ayatickets.com/rss" class="btn btn-primary" data-toggle="tooltip" title="" target="_blank" data-original-title="Events RSS feed"><i class="fas fa-rss fa-fw"></i></a>
        </div>
    </div>
</div>


<!-- main container starts here -->
<div class="row">
    <aside class="col-lg-3 order-2 order-lg-1">
        <div class="card card-filter">
            <form method="get">
                <article class="card-group-item">
                    <header class="card-header">
                        <a href="#" data-toggle="collapse" data-target="#filter-keyword">
                            <i class="icon-action fa fa-chevron-down"></i>
                            <h6 class="title">Keyword</h6>
                        </a>
                    </header>
                    <div class="filter-content collapse show" id="filter-keyword">
                        <div class="card-body">
                            <input id="keyword" name="keyword" type="text" class="form-control" value="">
                        </div>
                    </div>
                </article>
                <article class="card-group-item">
                    <header class="card-header">
                        <a href="#" data-toggle="collapse" data-target="#filter-category">
                            <i class="icon-action fa fa-chevron-down"></i>
                            <h6 class="title">Category</h6>
                        </a>
                    </header>
                    <div class="filter-content collapse show" id="filter-category">
                        <div class="card-body">
                            <div class="select2-container select2" id="s2id_category"><a href="javascript:void(0)" class="select2-choice select2-default" tabindex="-1"> <span class="select2-chosen" id="select2-chosen-1">Select an option</span><abbr class="select2-search-choice-close"></abbr> <span class="select2-arrow" role="presentation"><b role="presentation"></b></span></a><label for="s2id_autogen1" class="select2-offscreen"></label><input class="select2-focusser select2-offscreen" type="text" aria-haspopup="true" role="button" aria-labelledby="select2-chosen-1" id="s2id_autogen1">
                                <div class="select2-drop select2-display-none select2-with-searchbox">
                                    <div class="select2-search"> <label for="s2id_autogen1_search" class="select2-offscreen"></label> <input type="text" autocomplete="off" autocorrect="off" autocapitalize="off" spellcheck="false" class="select2-input" role="combobox" aria-expanded="true" aria-autocomplete="list" aria-owns="select2-results-1" id="s2id_autogen1_search" placeholder=""> </div>
                                    <ul class="select2-results" role="listbox" id="select2-results-1"> </ul>
                                </div>
                            </div><select id="category" name="category" class="select2 select2-offscreen" data-sort-options="1" tabindex="-1" title="">
                                <option value="">&nbsp;</option>
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
                    </div>
                </article>
                <article class="card-group-item">
                    <header class="card-header">
                        <a href="#" data-toggle="collapse" data-target="#filter-date">
                            <i class="icon-action fa fa-chevron-down"></i>
                            <h6 class="title">Date</h6>
                        </a>
                    </header>
                    <div class="filter-content collapse show" id="filter-date">
                        <div class="card-body">
                            <div class="form-check">
                                <div class="float-left custom-control custom-radio form-check-input">
                                    <input type="radio" class="custom-control-input" id="date-today" name="startdate" value="today">
                                    <label class="custom-control-label" for="date-today">Today</label>
                                </div>
                                <span class="float-right form-check-label">
                                    <span class="badge badge-light round">0</span>
                                </span>
                                <div class="clearfix"></div>
                            </div>
                            <div class="form-check">
                                <div class="float-left custom-control custom-radio form-check-input">
                                    <input type="radio" class="custom-control-input" id="date-tomorrow" name="startdate" value="tomorrow">
                                    <label class="custom-control-label" for="date-tomorrow">Tomorrow</label>
                                </div>
                                <span class="float-right form-check-label">
                                    <span class="badge badge-light round">6</span>
                                </span>
                                <div class="clearfix"></div>
                            </div>
                            <div class="form-check">
                                <div class="float-left custom-control custom-radio form-check-input">
                                    <input type="radio" class="custom-control-input" id="date-thisweekend" name="startdate" value="thisweekend">
                                    <label class="custom-control-label" for="date-thisweekend">
                                        This weekend
                                    </label>
                                </div>
                                <span class="float-right form-check-label">
                                    <span class="badge badge-light round">9</span>
                                </span>
                                <div class="clearfix"></div>
                            </div>
                            <div class="form-check">
                                <div class="float-left custom-control custom-radio form-check-input">
                                    <input type="radio" class="custom-control-input" id="date-thisweek" name="startdate" value="thisweek">
                                    <label class="custom-control-label" for="date-thisweek">
                                        This week
                                    </label>
                                </div>
                                <span class="float-right form-check-label">
                                    <span class="badge badge-light round">10</span>
                                </span>
                                <div class="clearfix"></div>
                            </div>
                            <div class="form-check">
                                <div class="float-left custom-control custom-radio form-check-input">
                                    <input type="radio" class="custom-control-input" id="date-nextweek" name="startdate" value="nextweek">
                                    <label class="custom-control-label" for="date-nextweek">
                                        Next week
                                    </label>
                                </div>
                                <span class="float-right form-check-label">
                                    <span class="badge badge-light round">14</span>
                                </span>
                                <div class="clearfix"></div>
                            </div>
                            <div class="form-check">
                                <div class="float-left custom-control custom-radio form-check-input">
                                    <input type="radio" class="custom-control-input" id="date-thismonth" name="startdate" value="thismonth">
                                    <label class="custom-control-label" for="date-thismonth">
                                        This month
                                    </label>
                                </div>
                                <span class="float-right form-check-label">
                                    <span class="badge badge-light round">21</span>
                                </span>
                                <div class="clearfix"></div>
                            </div>
                            <div class="form-check">
                                <div class="float-left custom-control custom-radio form-check-input">
                                    <input type="radio" class="custom-control-input" id="date-nextmonth" name="startdate" value="nextmonth">
                                    <label class="custom-control-label" for="date-nextmonth">
                                        Next month
                                    </label>
                                </div>
                                <span class="float-right form-check-label">
                                    <span class="badge badge-light round">4</span>
                                </span>
                                <div class="clearfix"></div>
                            </div>
                            <div class="form-check">
                                <div class="float-left custom-control custom-radio form-check-input">
                                    <input type="radio" class="custom-control-input datepicker" id="date-pickadate" name="startdate" value="all">
                                    <label class="custom-control-label" for="date-pickadate">
                                        Pick a date
                                    </label>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                </article>
                <article class="card-group-item">
                    <header class="card-header">
                        <a href="#" data-toggle="collapse" data-target="#filter-price">
                            <i class="icon-action fa fa-chevron-down"></i>
                            <h6 class="title">Ticket price</h6>
                        </a>
                    </header>
                    <div class="filter-content collapse show" id="filter-seated-guests">
                        <div class="card-body">

                            <div class="custom-control custom-checkbox form-check-input ml-0 mb-4">
                                <input type="checkbox" class="custom-control-input" id="free-events-only" name="freeonly" value="1">
                                <label class="custom-control-label" for="free-events-only">
                                    Free events only
                                </label>
                            </div>

                            <div class="events-price-range-slider-wrapper">
                                <div class="range-slider mb-3 noUi-target noUi-ltr noUi-horizontal" data-min="0" data-max="10000" data-start-left="0" data-start-right="10000">
                                    <div class="noUi-base">
                                        <div class="noUi-connects">
                                            <div class="noUi-connect" style="transform: translate(0%, 0px) scale(1, 1);"></div>
                                        </div>
                                        <div class="noUi-origin" style="transform: translate(-1000%, 0px); z-index: 5;">
                                            <div class="noUi-handle noUi-handle-lower" data-handle="0" tabindex="0" role="slider" aria-orientation="horizontal" aria-valuemin="0.0" aria-valuemax="10000.0" aria-valuenow="0.0" aria-valuetext="0">
                                                <div class="noUi-touch-area"></div>
                                            </div>
                                        </div>
                                        <div class="noUi-origin" style="transform: translate(0%, 0px); z-index: 4;">
                                            <div class="noUi-handle noUi-handle-upper" data-handle="1" tabindex="0" role="slider" aria-orientation="horizontal" aria-valuemin="0.0" aria-valuemax="10000.0" aria-valuenow="10000.0" aria-valuetext="10000">
                                                <div class="noUi-touch-area"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row ranger-slider-inputs">
                                    <div class="col-12 col-sm-6">
                                        <label for="pricemin">Min</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">₵</span>
                                            </div>
                                            <input id="pricemin" name="pricemin" type="text" class="form-control range-slider-min-input" value="" placeholder="Min">
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <label for="pricemax">Max</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">₵</span>
                                            </div>
                                            <input id="pricemax" name="pricemax" type="text" class="form-control range-slider-max-input" value="" placeholder="Max">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </article>
                <article class="card-group-item">
                    <div class="card-body">
                        <button class="btn btn-block btn-outline-primary"><i class="fas fa-search"></i> Search</button>
                    </div>
                </article>
            </form>
        </div>
    </aside>
    <div class="col-lg-9 order-1 order-lg-2">
        <div class="row">



            <?php foreach ($event as $event) {
                $event_name_slug = slugify($event->event_name); ?>

                <div class="col-12 col-sm-6 col-lg-6 mb-3">
                    <div class="card-event shadow-sm" onclick="window.location.href='view_event.php?event=<?php echo urlencode($event_name_slug) ?>&event_reference_id=<?php echo $event->event_reference_id ?>'" style="cursor: pointer;">

                        <div class="position-relative event-image" style="background-image: url('organizer/uploads/<?php echo $event->image ?>');">
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
            </style>


            <?php include('../private/shared/index_footer.php'); ?>


            </body>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

            </html>