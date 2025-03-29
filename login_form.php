<?php
@include 'config.php';
session_start();

if(isset($_POST['submit'])){
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = md5($_POST['password']);

    $select = "SELECT * FROM user_form WHERE email = '$email' AND password = '$password'";
    $result = mysqli_query($conn, $select);

    if(mysqli_num_rows($result) > 0){
        $row = mysqli_fetch_array($result);
        $_SESSION['user_name'] = $row['name'];
        $_SESSION['user_type'] = $row['user_type'];
        header('location:home.php');
        exit();
    } else {
        $error[] = 'Incorrect email or password!';
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - FarmSmarter</title>
    <link rel="stylesheet" href="login.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
    <!-- Header -->
    <header>
        <img src="pic/LOGO.png" alt="FarmSmarter Logo" class="logo">
        <h1>FarmSmarter with AI</h1>
        <div class="auth-buttons">
            <?php if(isset($_SESSION['user_name'])): ?>
                
            <?php else: ?>
                <a href="login_form.php" class="button">Login</a>
                <a href="signupform.php" class="button">Sign Up</a>
            <?php endif; ?>
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

    <!-- Login Form -->
    <main class="form-section">
        <div class="form-container">
            <div class="form-card">
                <h2 class="form-title">Account Login</h2>
                
                <?php if(isset($error)): ?>
                    <div class="alert error">
                        <?php foreach($error as $err): ?>
                            <p><?= $err ?></p>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>

                <form method="POST" class="auth-form">
                    <div class="form-group">
                        <label for="email">Email Address</label>
                        <input type="email" id="email" name="email" required 
                               placeholder="Enter your email" class="form-input">
                    </div>
                    
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" id="password" name="password" required 
                               placeholder="Enter your password" class="form-input">
                    </div>

                    <button type="submit" name="submit" class="primary-btn">
                        Sign In
                    </button>
                </form>

                <div class="form-footer">
                    <p>New to FarmSmarter? <a href="signupform.php">Create account</a></p>
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