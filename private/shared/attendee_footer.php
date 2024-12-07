<style>
    /* Default sidebar link style */
    .sidebar-link {
        color: #212529;
        text-decoration: none;
        transition: all 0.5s ease;
    }

    /* Active link style */
    .sidebar-link.active {
        background-color: #C3063F;
        color: #fff;
        font-weight: bold;
        border-radius: 5px;

    }
</style>
<script>
    document.addEventListener('DOMContentLoaded', () => {
        // Get all sidebar links
        const links = document.querySelectorAll('.sidebar-link');

        // On page load, set the active link based on the current URL
        const currentUrl = window.location.href;
        links.forEach(link => {
            // If the link's href matches the current URL
            if (link.href === currentUrl) {
                // Add 'active' class to the link
                link.classList.add('active');
            }
        });

        // Add click event listener for visual feedback (optional)
        links.forEach(link => {
            link.addEventListener('click', function() {
                // Remove 'active' class from all links
                links.forEach(l => l.classList.remove('active'));

                // Add 'active' class to the clicked link
                this.classList.add('active');
            });
        });
    });
</script>