<?php
session_start();
// If already logged in, redirect to review page
if(isset($_SESSION['user_id'])) {
    header("Location: review.php");
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Student Login</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <div id="loginPage">
            <h2>Student Login</h2>
            
            <?php if(isset($_GET['error'])): ?>
                <p style="color:red;">❌ Invalid credentials. Please try again.</p>
            <?php endif; ?>
            
            <?php if(isset($_GET['registered'])): ?>
                <p style="color:green;">✅ Registration successful! Please login with your Student ID and password: <strong>123</strong></p>
            <?php endif; ?>
            
            <form action="login_control.php" method="POST">
                <label>Student ID or Email:</label><br>
                <input type="text" name="loginId" required><br><br>
                
                <label>Password:</label><br>
                <input type="password" name="loginPass" required><br><br>
                
                <button type="submit">Login</button>
            </form>
            <p>Don't have an account? <a href="signup.php">Sign up here</a></p>
        </div>
    </div>
</body>
</html>