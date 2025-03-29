<?php
@include 'config.php';

if (isset($_POST['submit'])) {
    // Form data sanitization
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $division = mysqli_real_escape_string($conn, $_POST['division']);
    $district = mysqli_real_escape_string($conn, $_POST['district']);
    $address = mysqli_real_escape_string($conn, $_POST['address']);
    $contact_number = mysqli_real_escape_string($conn, $_POST['contactNumber']);
    $user_type = mysqli_real_escape_string($conn, $_POST['user_type']);
    $pass = md5($_POST['password']);
    $cpass = md5($_POST['cpassword']);
    $pstation = mysqli_real_escape_string($conn, $_POST['policestation']);
    $postcode = mysqli_real_escape_string($conn, $_POST['postcode']);

    // Check if user already exists
    $select = "SELECT * FROM user_form WHERE email = '$email'";
    $result = mysqli_query($conn, $select);

    if (mysqli_num_rows($result) > 0) {
        $error[] = 'User already exists!';
    } else {
        if ($pass != $cpass) {
            $error[] = 'Passwords do not match!';
        } else {
            // Insert new user
            $insert = "INSERT INTO user_form(
                name, email, division, district, address, 
                contact_number, user_type, password, 
                cpassword, policestation, postcode
            ) VALUES(
                '$name', '$email', '$division', '$district', 
                '$address', '$contact_number', '$user_type', 
                '$pass', '$cpass', '$pstation', '$postcode'
            )";
            
            if (mysqli_query($conn, $insert)) {
                header('location:login_form.php');
                exit();
            } else {
                $error[] = 'Registration failed: ' . mysqli_error($conn);
            }
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - FarmSmarter</title>
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
                <!-- Logout button if logged in -->
            <?php else: ?>
                <a href="login_form.php" class="button">Login</a>
                <a href="signup_form.php" class="button">Sign Up</a>
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
    <!-- Registration Form -->
    <main class="form-section">
        <div class="form-container">
            <div class="form-card">
                <h2 class="form-title">Create Account</h2>
                
                <?php if(isset($error)): ?>
                    <div class="alert error">
                        <?php foreach($error as $err): ?>
                            <p><?= $err ?></p>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>

                <form method="POST" class="auth-form">
                    <!-- Personal Information -->
                    <div class="form-group">
                        <label for="name">Full Name</label>
                        <input type="text" id="name" name="name" required 
                               placeholder="Enter your full name" class="form-input">
                    </div>

                    <div class="form-group">
                        <label for="email">Email Address</label>
                        <input type="email" id="email" name="email" required 
                               placeholder="Enter your email" class="form-input">
                    </div>

      <!-- Division & District Selection -->
      <div class="form-row">
          <div class="form-group">
              <label for="division">Division:</label>
              <select name="division" id="division" required>
                  <option value="">Select Division</option>
                  <option value="Dhaka">Dhaka</option>
                  <option value="Chattogram">Chattogram</option>
                  <option value="Rajshahi">Rajshahi</option>
                  <option value="Khulna">Khulna</option>
                  <option value="Barishal">Barishal</option>
                  <option value="Sylhet">Sylhet</option>
                  <option value="Rangpur">Rangpur</option>
                  <option value="Mymensingh">Mymensingh</option>
              </select>
          </div>

          <div class="form-group">
              <label for="district">District:</label>
              <select name="district" id="district" required>
                  <option value="">Select District</option>
                  
                  <!-- Dhaka Division (13 Districts) -->
                  <optgroup label="Dhaka">
                      <option value="Dhaka">Dhaka</option>
                      <option value="Faridpur">Faridpur</option>
                      <option value="Gazipur">Gazipur</option>
                      <option value="Gopalganj">Gopalganj</option>
                      <option value="Kishoreganj">Kishoreganj</option>
                      <option value="Madaripur">Madaripur</option>
                      <option value="Manikganj">Manikganj</option>
                      <option value="Munshiganj">Munshiganj</option>
                      <option value="Narayanganj">Narayanganj</option>
                      <option value="Narsingdi">Narsingdi</option>
                      <option value="Rajbari">Rajbari</option>
                      <option value="Shariatpur">Shariatpur</option>
                      <option value="Tangail">Tangail</option>
                  </optgroup>

                  <!-- Chattogram Division (11 Districts) -->
                  <optgroup label="Chattogram">
                      <option value="Chattogram">Chattogram</option>
                      <option value="Bandarban">Bandarban</option>
                      <option value="Brahmanbaria">Brahmanbaria</option>
                      <option value="Chandpur">Chandpur</option>
                      <option value="Cumilla">Cumilla</option>
                      <option value="Cox's Bazar">Cox's Bazar</option>
                      <option value="Feni">Feni</option>
                      <option value="Khagrachhari">Khagrachhari</option>
                      <option value="Lakshmipur">Lakshmipur</option>
                      <option value="Noakhali">Noakhali</option>
                      <option value="Rangamati">Rangamati</option>
                  </optgroup>

                  <!-- Rajshahi Division (8 Districts) -->
                  <optgroup label="Rajshahi">
                      <option value="Bogura">Bogura</option>
                      <option value="Chapainawabganj">Chapainawabganj</option>
                      <option value="Joypurhat">Joypurhat</option>
                      <option value="Naogaon">Naogaon</option>
                      <option value="Natore">Natore</option>
                      <option value="Pabna">Pabna</option>
                      <option value="Rajshahi">Rajshahi</option>
                      <option value="Sirajganj">Sirajganj</option>
                  </optgroup>

                  <!-- Khulna Division (10 Districts) -->
                  <optgroup label="Khulna">
                      <option value="Bagerhat">Bagerhat</option>
                      <option value="Chuadanga">Chuadanga</option>
                      <option value="Jessore">Jessore</option>
                      <option value="Jhenaidah">Jhenaidah</option>
                      <option value="Khulna">Khulna</option>
                      <option value="Kushtia">Kushtia</option>
                      <option value="Magura">Magura</option>
                      <option value="Meherpur">Meherpur</option>
                      <option value="Narail">Narail</option>
                      <option value="Satkhira">Satkhira</option>
                  </optgroup>

                  <!-- Barishal Division (6 Districts) -->
                  <optgroup label="Barishal">
                      <option value="Barguna">Barguna</option>
                      <option value="Barishal">Barishal</option>
                      <option value="Bhola">Bhola</option>
                      <option value="Jhalokati">Jhalokati</option>
                      <option value="Patuakhali">Patuakhali</option>
                      <option value="Pirojpur">Pirojpur</option>
                  </optgroup>

                  <!-- Sylhet Division (4 Districts) -->
                  <optgroup label="Sylhet">
                      <option value="Habiganj">Habiganj</option>
                      <option value="Moulvibazar">Moulvibazar</option>
                      <option value="Sunamganj">Sunamganj</option>
                      <option value="Sylhet">Sylhet</option>
                  </optgroup>

                  <!-- Rangpur Division (8 Districts) -->
                  <optgroup label="Rangpur">
                      <option value="Dinajpur">Dinajpur</option>
                      <option value="Gaibandha">Gaibandha</option>
                      <option value="Kurigram">Kurigram</option>
                      <option value="Lalmonirhat">Lalmonirhat</option>
                      <option value="Nilphamari">Nilphamari</option>
                      <option value="Panchagarh">Panchagarh</option>
                      <option value="Rangpur">Rangpur</option>
                      <option value="Thakurgaon">Thakurgaon</option>
                  </optgroup>

                  <!-- Mymensingh Division (4 Districts) -->
                  <optgroup label="Mymensingh">
                      <option value="Jamalpur">Jamalpur</option>
                      <option value="Mymensingh">Mymensingh</option>
                      <option value="Netrokona">Netrokona</option>
                      <option value="Sherpur">Sherpur</option>
                  </optgroup>
              </select>
          </div>
      </div>

      <div class="form-group">
                        <label for="address">Full Address</label>
                        <input type="text" id="address" name="address" required 
                               placeholder="Enter your address" class="form-input">
                    </div>

       <!-- Contact & User Type -->
       <div class="form-row">
                        <div class="form-group">
                            <label for="contactNumber">Contact Number</label>
                            <input type="tel" id="contactNumber" name="contactNumber" required 
                                   placeholder="Enter contact number" class="form-input">
                        </div>
                        <div class="form-group">
                            <label for="user_type">Account Type</label>
                            <select name="user_type" id="user_type" required class="form-input">
                                <option value="user">User</option>
                                <option value="admin">Admin</option>
                            </select>
                        </div>
                    </div>

                    <!-- Password Fields -->
                    <div class="form-row">
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" id="password" name="password" required 
                                   placeholder="Enter password" class="form-input">
                        </div>
                        <div class="form-group">
                            <label for="cpassword">Confirm Password</label>
                            <input type="password" id="cpassword" name="cpassword" required 
                                   placeholder="Confirm password" class="form-input">
                        </div>
                    </div>

                    <!-- Location Details -->
                    <div class="form-row">
                        <div class="form-group">
                            <label for="policestation">Police Station</label>
                            <input type="text" id="policestation" name="policestation" required 
                                   placeholder="Enter police station" class="form-input">
                        </div>
                        <div class="form-group">
                            <label for="postcode">Postcode</label>
                            <input type="text" id="postcode" name="postcode" required 
                                   placeholder="Enter postcode" class="form-input">
                        </div>
                    </div>

                    <button type="submit" name="submit" class="primary-btn">
                        Register Now
                    </button>
                </form>

                <div class="form-footer">
                    <p>Already have an account? <a href="login_form.php">Login here</a></p>
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