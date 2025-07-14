<div id="index_loader" style="display: block;">
    <div class="skeleton-header">
        <div class="skeleton-logo"></div>
        <div class="skeleton-nav"></div>
        <p class="skeleton-text mb-2" style="font-size: 1.25rem; color: #555; max-width: 800px; margin: 0 auto;"></p>
    </div>

    <div class="hero-section text-center container-xl mx-auto" style=" padding: 50px 20px;">
        <p class="skeleton-title mb-2" style="font-size: 1.25rem; color: #555; max-width: 700px; margin: 0 auto;"></p>
        <p class="skeleton-text" style="font-size: 1.25rem; color: #555; max-width: 700px; margin: 0 auto;"></p>
        <h1 class="skeleton-events-title " style="font-size: 3rem; color: #333; margin-bottom: 20px;"></h1>
        <div class="skeleton-button"></div>
    </div>



    <section class="mt-1 m-0 container-xl mx-auto">


        <!-- Skeleton Loader -->
        <div id="skeleton-loader" style="display: flex;" class="row justify-content-around gap-1 align-items-center p-0">
            <?php for ($i = 0; $i < 6; $i++) { ?>
                <li class="card col-10 col-sm-5 col-md-5 col-lg-3 mb-4 p-0  border-1">
                    <div>
                        <div class="skeleton-image"></div>
                        <div class="card-body">
                            <div class="skeleton-text short mb-2"></div>
                            <div class="skeleton-text mb-1"></div>
                            <div class="skeleton-text mb-1"></div>
                            <div class="skeleton-text mb-3"></div>
                            <div class="skeleton-button"></div>
                        </div>
                    </div>
                </li>
            <?php } ?>
        </div>
    </section>

    <footer class="text-black pt-5 pb-4 " style="background-color: #F1F3F7;">
        <div class="container">
            <div class="row">
                <!-- About Section -->
                <div class="col-md-3 col-sm-6">
                    <h5 class="fw-bold mb-4 skeleton-text"></h5>
                    <p class="skeleton-text"></p>
                    <p class="skeleton-text"></p>
                    <p class="skeleton-text"></p>
                </div>

                <!-- Quick Links -->
                <div class="col-md-3 col-sm-6">
                    <h5 class="fw-bold mb- skeleton-text4 "></h5>
                    <ul class="list-unstyled">
                        <li class="skeleton-text mb-2"><a href="#" class="text-black text-decoration-none "></a></li>
                        <li class="skeleton-text mb-2"><a href="#" class="text-black text-decoration-none "></a></li>
                        <li class="skeleton-text mb-2"><a href="#" class="text-black text-decoration-none "></a></li>
                    </ul>
                </div>

                <!-- Contact Us -->
                <div class="col-md-3 col-sm-6">
                    <h5 class="fw-bold mb-4 skeleton-events-title mt-0"></h5>
                    <p class="skeleton-text mt-0"></i> </p>
                    <p class="skeleton-events-title mt-0"></i> </p>
                </div>
            </div>

            <div class="row mt-4">
                <div class="col text-center">
                    <p class="text-black-50">© 2025 EventHub. All rights reserved.</p>
                </div>
            </div>
        </div>
    </footer>



</div>
</div>
</container>




<style>
    .skeleton-image {
        width: 100%;
        height: 14rem;
        border-radius: 8px 8px 0 0;
        background: #e0e0e0;
    }

    .skeleton-text {
        height: 12px;
        background: #e0e0e0;
        border-radius: 4px;
    }

    .skeleton-text.short {
        width: 60%;
    }

    .skeleton-text,
    .skeleton-button {
        background: linear-gradient(to right, #eeeeee 8%, #dddddd 18%, #eeeeee 33%);
        background-size: 800px 104px;
        animation: shimmer 1.2s infinite linear;
    }

    .skeleton-button {
        width: 100%;
        height: 36px;
        border-radius: 5px;
    }

    @keyframes shimmer {
        0% {
            background-position: -468px 0;
        }

        100% {
            background-position: 468px 0;
        }
    }
</style>

<style>
    .skeleton-header,
    .skeleton-nav,
    .skeleton-search,
    .skeleton-title,
    .skeleton-subtitle,
    .skeleton-button,
    .skeleton-events-title,
    .skeleton-card,
    .skeleton-logo {
        background: linear-gradient(100deg, #e0e0e0 30%, #f0f0f0 50%, #e0e0e0 70%);
        background-size: 400% 100%;
        animation: shimmer 1.5s infinite linear;
        border-radius: 4px;
    }

    @keyframes shimmer {
        0% {
            background-position: -400px 0;
        }

        100% {
            background-position: 400px 0;
        }
    }

    .skeleton-header {
        display: flex;
        justify-content: space-between;
        padding: 20px;
    }

    .skeleton-logo {
        width: 100px;
        height: 30px;
    }

    .skeleton-nav {
        width: 300px;
        height: 20px;
    }

    .skeleton-search {
        margin: 20px auto;
        width: 50%;
        height: 35px;
    }

    .skeleton-hero-text {
        text-align: center;
        margin-top: 40px;
    }

    .skeleton-title {
        width: 60%;
        height: 25px;
        margin: 10px auto;
    }

    .skeleton-subtitle {
        width: 80%;
        height: 20px;
        margin: 10px auto;
    }

    .skeleton-button {
        width: 150px;
        height: 35px;
        margin: 20px auto;
    }

    .skeleton-events-title {
        width: 250px;
        height: 20px;
        margin: 40px auto 20px;
    }

    .skeleton-event-cards {
        display: flex;
        justify-content: center;
        gap: 20px;
        margin-bottom: 50px;
    }

    .skeleton-card {
        width: 250px;
        height: 300px;
        border-radius: 8px;
    }
</style>

<script>
    window.addEventListener('DOMContentLoaded', () => {
        setTimeout(() => {
            document.getElementById('skeleton-loader').style.display = '';
            document.getElementById('real-events').style.display = 'block';
            document.getElementById('index_loader').style.display = 'none';
            document.getElementById('main_loader').style.display = 'block';
            document.getElementById('section_main_loader').style.display = 'block';
            document.getElementById('index_page_header').style.display = 'block';
            document.getElementById('index_footer').style.display = 'block';
        }, 2000); // 2 seconds delay for demonstration
    });
</script>
</body>

</html>