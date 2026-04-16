<?php
session_start();

// Check if user is logged in
if(!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$userData = $_SESSION['user_data'];
?>
<!DOCTYPE html>
<html>
<head>
    <title>Member Dashboard</title>
    <link rel="stylesheet" href="style.css">
    <style>
        .member-container {
            max-width: 600px;
            margin: 50px auto;
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        .member-header {
            background: #2196F3;
            color: white;
            padding: 20px;
            border-radius: 5px;
            margin-bottom: 20px;
            text-align: center;
        }
        .info-item {
            padding: 10px;
            margin: 5px 0;
            border-bottom: 1px solid #eee;
        }
        .badge {
            padding: 3px 8px;
            border-radius: 3px;
            font-size: 12px;
            background: #2196F3;
            color: white;
        }
        .logout-btn {
            background: #f44336;
            color: white;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 4px;
            display: inline-block;
            margin-top: 20px;
        }
        .warning {
            background: #fff3cd;
            border: 1px solid #ffc107;
            color: #856404;
            padding: 10px;
            border-radius: 5px;
            margin-top: 20px;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="member-container">
        <div class="member-header">
            <h2>👤 Member Dashboard</h2>
            <p>Welcome, <strong><?php echo htmlspecialchars($_SESSION['user_name']); ?></strong>!</p>
        </div>
        
        <h3>📋 Student Information</h3>
        
        <div class="info-item">
            <strong>Full Name:</strong> <?php echo htmlspecialchars($userData['fullName']); ?>
        </div>
        <div class="info-item">
            <strong>Student ID:</strong> <?php echo htmlspecialchars($userData['studentId']); ?>
        </div>
        <div class="info-item">
            <strong>Date of Birth:</strong> <?php echo htmlspecialchars($userData['dob']); ?>
        </div>
        <div class="info-item">
            <strong>Age:</strong> <?php echo htmlspecialchars($userData['age']); ?>
        </div>
        <div class="info-item">
            <strong>Degree:</strong> <?php echo htmlspecialchars($userData['degree']); ?>
        </div>
        <div class="info-item">
            <strong>Year:</strong> Year <?php echo htmlspecialchars($userData['year']); ?>
        </div>
        <div class="info-item">
            <strong>Gender:</strong> <?php echo htmlspecialchars($userData['gender']); ?>
        </div>
        <div class="info-item">
            <strong>University:</strong> <?php echo htmlspecialchars($userData['university']); ?>
        </div>
        <div class="info-item">
            <strong>Role:</strong> <span class="badge">Member</span>
        </div>
        
        <div class="warning">
            ⚠️ This is a member account. You have read-only access to your information.
        </div>
        
        <div style="text-align: center;">
            <a href="logout.php" class="logout-btn">🚪 Logout</a>
        </div>
    </div>
</body>
</html>