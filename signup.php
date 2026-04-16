<?php
session_start();
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
    <title>Student Sign Up - Taiwan</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h2>Taiwan Student Sign Up Form</h2>
        
        <?php if(isset($_GET['error'])): ?>
            <p style="color:red;">Student ID already exists or form incomplete!</p>
        <?php endif; ?>
        
        <form action="signup_control.php" method="POST">
            <label>Full Name:</label><br>
            <input type="text" name="name" required><br><br>
            
            <label>Date of Birth:</label><br>
            <input type="date" name="dob" required><br><br>
            
            <label>Age:</label><br>
            <input type="number" name="age" required><br><br>
            
            <label>Student ID:</label><br>
            <input type="text" name="student_id" required><br><br>
            
            <label>Degree:</label><br>
            <input type="text" name="degree" required><br><br>
            
            <label>Year:</label><br>
            <select name="year" required>
                <option value="1">Year 1</option>
                <option value="2">Year 2</option>
                <option value="3">Year 3</option>
                <option value="4">Year 4</option>
            </select><br><br>
            
            <label>Gender:</label><br>
            <select name="gender" required>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
                <option value="Other">I don't know</option>
            </select><br><br>
            
            <label>University name:</label><br>
            <input type="text" name="university" required><br><br>
            
            <label>Role:</label><br>
            <select name="role" required>
                <option value="member">Member (Regular User)</option>
                <option value="admin">Admin</option>
            </select><br><br>
            
            <input type="submit" value="Sign Up">
        </form>
        <p>Already have an account? <a href="login.php">Login here</a></p>
    </div>
</body>
</html>