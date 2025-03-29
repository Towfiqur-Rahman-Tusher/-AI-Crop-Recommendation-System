<?php
session_start();
session_unset();
session_destroy();
header("refresh:2; url=login_form.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logout - FarmSmarter</title>
    <link rel="stylesheet" href="login.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
    <!-- Header -->
    <header>
        <img src="pic/LOGO.png" alt="FarmSmarter Logo" class="logo">
        <h1>FarmSmarter with AI</h1>
        <div class="auth-buttons">
            <a href="login_form.php" class="button">Login</a>
            <a href="signupform.php" class="button">Sign Up</a>
        </div>
    </header>

    <!-- Navigation -->
    <nav>
        <button class="navbar-toggle" aria-label="Toggle navigation">
            <i class="fas fa-bars"></i>
        </button>
        <ul class="navbar-nav">
        <li><a href="home3.html">Home</a></li>
            <li><a href="aboutus.html">About</a></li>
            <li><a href="services.html">Services</a></li>
            <li><a href="blogmain.html">Blog</a></li>
        </ul>
    </nav>

    <!-- Logout Message -->
    <main class="logout-section">
        <div class="logout-container">
            <div class="logout-card">
                <div class="logout-icon">
                    <i class="fas fa-check-circle"></i>
                </div>
                <h2 class="logout-title">Successfully Logged Out</h2>
                <p class="logout-message">You have been securely disconnected from your account.</p>
                <div class="logout-redirect">
                    <p>Redirecting to login page...</p>
                    <a href="login_form.php" class="primary-btn">
                        <i class="fas fa-sign-in-alt"></i>
                        Login Again
                    </a>
                </div>
            </div>
        </div>
    </main>

    <!-- Footer -->
    <footer>
        <div class="footer-content">
            <div class="footer-section">
                <h4>Contact Us</h4>
                <p><i class="fas fa-envelope"></i> info@smartfarming.com</p>
                <p><i class="fas fa-phone"></i> +123 456 7890</p>
            </div>
            <div class="footer-section">
                <h4>Follow Us</h4>
                <div class="social-links">
                    <a href="#"><i class="fab fa-facebook"></i></a>
                    <a href="#"><i class="fab fa-twitter"></i></a>
                    <a href="#"><i class="fab fa-instagram"></i></a>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <p>&copy; 2023 FarmSmarter. All rights reserved</p>
        </div>
    </footer>

    <script src="script.js"></script>
</body>
</html>