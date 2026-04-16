<?php
session_start();

$usersFile = 'users.json';
if(file_exists($usersFile)) {
    $users = json_decode(file_get_contents($usersFile), true);
} else {
    $users = [];
}

$studentId = $_POST['student_id'] ?? '';
$fullName = $_POST['name'] ?? '';
$dob = $_POST['dob'] ?? '';
$age = $_POST['age'] ?? '';
$degree = $_POST['degree'] ?? '';
$year = $_POST['year'] ?? '';
$gender = $_POST['gender'] ?? '';
$university = $_POST['university'] ?? '';
$role = $_POST['role'] ?? 'member'; // Get role, default to 'member'

if(empty($studentId) || empty($fullName) || empty($dob) || empty($age) || 
   empty($degree) || empty($year) || empty($gender) || empty($university)) {
    header("Location: signup.php?error=1");
    exit();
}

foreach($users as $user) {
    if($user['studentId'] === $studentId) {
        header("Location: signup.php?error=duplicate");
        exit();
    }
}

$newUser = [
    'studentId' => $studentId,
    'password' => '123',
    'fullName' => $fullName,
    'dob' => $dob,
    'age' => (int)$age,
    'degree' => $degree,
    'year' => (int)$year,
    'gender' => $gender,
    'university' => $university,
    'role' => $role,  // Add role to user data
    'registered_at' => date('Y-m-d H:i:s')
];

$users[] = $newUser;
file_put_contents($usersFile, json_encode($users, JSON_PRETTY_PRINT));

header("Location: login.php?registered=1");
exit();
?>