<?php
session_start();
// If already logged in, redirect based on role
if(isset($_SESSION['user_id'])) {
    if($_SESSION['user_role'] == 'admin') {
        header("Location: admin_page.php");
    } else {
        header("Location: member_page.php");
    }
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
        <h2>Student Login</h2>
        
        <?php if(isset($_GET['error'])): ?>
            <p style="color:red;">❌ Invalid credentials. Try admin/123 or member/123</p>
        <?php endif; ?>
        
        <?php if(isset($_GET['registered'])): ?>
            <p style="color:green;">✅ Registration successful! Login with your Student ID and password: 123</p>
        <?php endif; ?>
        
        <form action="login_control.php" method="POST">
            <label>Student ID:</label><br>
            <input type="text" name="loginId" required><br><br>
            
            <label>Password:</label><br>
            <input type="password" name="loginPass" required><br><br>
            
            <button type="submit">Login</button>
        </form>
        <p>Don't have an account? <a href="signup.php">Sign up here</a></p>
        <hr>
        <p style="font-size: 12px; color: #888;">Demo Accounts:<br>
        Admin: admin / 123<br>
        Member: member / 123</p>
    </div>
</body>
</html>