<?php
session_start();

if(!isset($_SESSION['user_name'])){
    header('location:login_form.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard - FarmSmarter</title>
    <link rel="stylesheet" href="login.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
    <!-- Header -->
    <header>
        <img src="pic/LOGO.png" alt="FarmSmarter Logo" class="logo">
        <h1>FarmSmarter with AI</h1>
        <div class="auth-buttons">
            <a href="logout.php" class="button">Logout</a>
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

    <!-- Main Content -->
    <main class="dashboard-section">
        <div class="dashboard-container">
            <div class="dashboard-card">
                <h2 class="dashboard-title">Welcome, <?php echo $_SESSION['user_name']; ?></h2>
                
                <div class="tool-grid">
                    <a href="#" class="tool-card">
                        <div class="tool-icon">
                            <i class="fas fa-calculator"></i>
                        </div>
                        <h3>Agricultural Calculator</h3>
                        <p>Calculate crop yields, fertilizer needs, and more</p>
                    </a>
                    
                    <a href="http://localhost:5000" class="tool-card"> 
                        <div class="tool-icon">
                            <i class="fas fa-chart-line"></i>
                        </div>
                        <h3>Prediction Tool</h3>   
                        <p>Get AI-powered crop predictions and recommendations</p>
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