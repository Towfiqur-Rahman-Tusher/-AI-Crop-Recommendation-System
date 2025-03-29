document.addEventListener('DOMContentLoaded', function() {
    const navbarToggle = document.querySelector('.navbar-toggle');
    const navbarNav = document.querySelector('.navbar-nav');
    
    if(navbarToggle && navbarNav) {
        // Toggle menu on button click
        navbarToggle.addEventListener('click', function(e) {
            e.preventDefault();
            navbarNav.classList.toggle('active');
            this.classList.toggle('active');
        });

        // Close menu when resizing to desktop
        window.addEventListener('resize', () => {
            if(window.innerWidth > 768) {
                navbarNav.classList.remove('active');
                navbarToggle.classList.remove('active');
            }
        });
    }
});