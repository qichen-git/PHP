<?php
session_start();

// Check if user is logged in and is admin
if(!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

if($_SESSION['user_role'] != 'admin') {
    header("Location: member_page.php");
    exit();
}

$userData = $_SESSION['user_data'];

// Load all users for admin to manage
$usersFile = 'users.json';
$allUsers = [];
if(file_exists($usersFile)) {
    $allUsers = json_decode(file_get_contents($usersFile), true);
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="style.css">
    <style>
        .admin-container {
            max-width: 1200px;
            margin: 50px auto;
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        .admin-header {
            background: #4CAF50;
            color: white;
            padding: 20px;
            border-radius: 5px;
            margin-bottom: 20px;
        }
        .user-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        .user-table th, .user-table td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
        }
        .user-table th {
            background: #4CAF50;
            color: white;
        }
        .user-table tr:nth-child(even) {
            background: #f9f9f9;
        }
        .badge {
            padding: 3px 8px;
            border-radius: 3px;
            font-size: 12px;
        }
        .badge-admin {
            background: #f44336;
            color: white;
        }
        .badge-member {
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
        .stats {
            display: inline-block;
            margin-right: 20px;
            padding: 10px;
            background: #f0f0f0;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <div class="admin-container">
        <div class="admin-header">
            <h2>👑 Admin Dashboard</h2>
            <p>Welcome, <strong><?php echo htmlspecialchars($_SESSION['user_name']); ?></strong>! You have administrator privileges.</p>
        </div>
        
        <div>
            <div class="stats">
                📊 Total Students: <?php echo count($allUsers); ?>
            </div>
            <div class="stats">
                👑 Admins: <?php echo count(array_filter($allUsers, function($u) { return $u['role'] == 'admin'; })); ?>
            </div>
            <div class="stats">
                👤 Students: <?php echo count(array_filter($allUsers, function($u) { return $u['role'] == 'member'; })); ?>
            </div>
        </div>
        
        <h3>📋 Your Information (Admin)</h3>
        <div class="info-item">
            <strong>Name:</strong> <?php echo htmlspecialchars($userData['fullName']); ?>
        </div>
        <div class="info-item">
            <strong>Student ID:</strong> <?php echo htmlspecialchars($userData['studentId']); ?>
        </div>
        <div class="info-item">
            <strong>University:</strong> <?php echo htmlspecialchars($userData['university']); ?>
        </div>
        <div class="info-item">
            <strong>Role:</strong> <span class="badge badge-admin">Admin</span>
        </div>
        
        <h3>📊 All Registered Students</h3>
        <table class="user-table">
            <thead>
                <tr>
                    <th>Student ID</th>
                    <th>Full Name</th>
                    <th>University</th>
                    <th>Degree</th>
                    <th>Role</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($allUsers as $user): ?>
                <tr>
                    <td><?php echo htmlspecialchars($user['studentId']); ?></td>
                    <td><?php echo htmlspecialchars($user['fullName']); ?></td>
                    <td><?php echo htmlspecialchars($user['university']); ?></td>
                    <td><?php echo htmlspecialchars($user['degree']); ?></td>
                    <td>
                        <span class="badge <?php echo $user['role'] == 'admin' ? 'badge-admin' : 'badge-member'; ?>">
                            <?php echo ucfirst($user['role']); ?>
                        </span>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        
        <div style="text-align: center;">
            <a href="logout.php" class="logout-btn">🚪 Logout</a>
        </div>
    </div>
</body>
</html>