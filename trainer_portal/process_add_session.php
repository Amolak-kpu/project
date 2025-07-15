<?php
session_start();
if(!isset($_SESSION['trainer'])){
    header('Location: index.php');
    exit();
}

$title = $_POST['title'] ?? '';
$date = $_POST['date'] ?? '';
$time = $_POST['time'] ?? '';

if($title && $date && $time){
    $sessionsFile = 'sessions.json';
    $sessions = [];
    if(file_exists($sessionsFile)){
        $json = file_get_contents($sessionsFile);
        $sessions = json_decode($json, true) ?: [];
    }
    $sessions[] = ['title' => $title, 'date' => $date, 'time' => $time];
    file_put_contents($sessionsFile, json_encode($sessions));
}
header('Location: dashboard.php');
