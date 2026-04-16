<?php
session_start();

$usersFile = 'users.json';
if(file_exists($usersFile)) {
    $users = json_decode(file_get_contents($usersFile), true);
} else {
    // Create default admin and member accounts
    $users = [
        [
            'studentId' => 'admin',
            'password' => '123',
            'fullName' => 'Admin User',
            'dob' => '1990-01-01',
            'age' => 35,
            'degree' => 'Administration',
            'year' => 4,
            'gender' => 'Male',
            'university' => 'Admin University',
            'role' => 'admin'
        ],
        [
            'studentId' => 'member',
            'password' => '123',
            'fullName' => 'Member User',
            'dob' => '2000-01-01',
            'age' => 22,
            'degree' => 'Computer Science',
            'year' => 3,
            'gender' => 'Female',
            'university' => 'Demo University',
            'role' => 'member'
        ]
    ];
    file_put_contents($usersFile, json_encode($users, JSON_PRETTY_PRINT));
}

$loginId = $_POST['loginId'] ?? '';
$password = $_POST['loginPass'] ?? '';

$authenticated = false;
$userData = null;

foreach($users as $user) {
    if($user['studentId'] === $loginId && $user['password'] === $password) {
        $authenticated = true;
        $userData = $user;
        break;
    }
}

if($authenticated) {
    // Store user data in session
    $_SESSION['user_id'] = $userData['studentId'];
    $_SESSION['user_name'] = $userData['fullName'];
    $_SESSION['user_role'] = $userData['role'];  // Store role
    $_SESSION['user_data'] = $userData;
    
    // Redirect based on role
    if($userData['role'] == 'admin') {
        header("Location: admin_page.php");
    } else {
        header("Location: member_page.php");
    }
    exit();
} else {
    header("Location: login.php?error=1");
    exit();
}
?>