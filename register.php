<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>REGISTER</title>
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css'>
  <link rel="stylesheet" href="./css/style1.css">
  <link rel="stylesheet" href="./css/style.css">
</head>
  
<body>
<!-- Navigation Bar -->
<nav class="navbar">
    <div class="navbar-container">
        <input type="checkbox" name="" id="checkbox">
        <div class="hamburger-lines">
            <span class="line line1"></span>
            <span class="line line2"></span>
            <span class="line line3"></span>
        </div>
        <ul class="menu-items">
            <li><a href="index.html">Home</a></li>
            <li><a href="shops.html">Shop</a></li>
            <li><a href="cart.html">Cart</a></li>
        </ul>
        <div class="logo">
            <h1 style="padding-left: 30px;">SHOPPING KNIGHT</h1>
        </div>
    </div>
</nav>

<!-- Registration Form -->
<div class="container" id="container">
    <div class="form-container sign-up-container">
        <form action="register.php" method="post">
            <h1>Create Account</h1>
            <div class="social-container">
                <a href="https://www.facebook.com" class="social"><i class="fab fa-facebook-f"></i></a>
                <a href="https://accounts.google.com" class="social"><i class="fab fa-google-plus-g"></i></a>
                <a href="https://www.linkedin.com/login" class="social"><i class="fab fa-linkedin-in"></i></a>
            </div>
            <span>or use your email for registration</span>
            <div class="password-container">
                <input type="text" placeholder="Name" name="name" required />
            </div>
            <div class="password-container">
                <input type="email" placeholder="Email" name="email" required />
            </div>
            <div class="password-container">
                <input type="password" placeholder="Password" id="password" name="password" required />
                <i class="far fa-eye" id="togglePassword" onclick="togglePasswordVisibility('password', 'togglePassword')"></i>
            </div>
            <div class="password-container">
                <input type="password" placeholder="Confirm Password" id="confirmPassword" name="confirmPassword" required />
                <i class="far fa-eye" id="toggleConfirmPassword" onclick="togglePasswordVisibility('confirmPassword', 'toggleConfirmPassword')"></i>
            </div>
            <button type="submit">Sign Up</button>
        </form>
    </div>
</div>

<!-- PHP Registration Handling -->
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "reg";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if form data is set
if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['confirmPassword'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirmPassword'];

    if ($password !== $confirmPassword) {
        die("Passwords do not match.");
    }

    // Hash the password
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Insert data into database
    $sql = "INSERT INTO register (name, email, password) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    if ($stmt === false) {
        die("Error preparing statement: " . $conn->error);
    }

    $stmt->bind_param("sss", $name, $email, $hashedPassword);

    if ($stmt->execute()) {
        echo "Registration successful!";
    } else {
        if ($stmt->errno === 1062) {
            echo "Error: Duplicate entry for email.";
        } else {
            echo "Error: " . $stmt->error;
        }
    }

    $stmt->close();
} else {
    echo "All fields are required.";
}

$conn->close();
?>

<script src="./js/script1.js"></script>
</body>
</html>
