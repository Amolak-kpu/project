<?php
session_start();
// Hard-coded credentials for demonstration
$trainerEmail = 'trainer@example.com';
$trainerPassword = 'secret123';

$email = $_POST['email'] ?? '';
$password = $_POST['password'] ?? '';

if($email === $trainerEmail && $password === $trainerPassword){
    $_SESSION['trainer'] = ['email' => $email];
    header('Location: dashboard.php');
    exit();
}
header('Location: index.php?error=1');
