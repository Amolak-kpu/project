<?php
session_start();
if(!isset($_SESSION['trainer'])){
    header('Location: index.php');
    exit();
}

// load sessions from file
$sessionsFile = 'sessions.json';
$sessions = [];
if(file_exists($sessionsFile)){
    $json = file_get_contents($sessionsFile);
    $sessions = json_decode($json, true) ?: [];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Trainer Dashboard</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <nav>
        <a href="dashboard.php">Dashboard</a>
        <a href="add_session.php">Add Session</a>
        <a href="logout.php">Logout</a>
    </nav>
    <h1>Welcome, <?php echo htmlspecialchars($_SESSION['trainer']['email']); ?></h1>
    <h2>Your Sessions</h2>
    <?php if(empty($sessions)): ?>
        <p>No sessions scheduled.</p>
    <?php else: ?>
        <ul>
            <?php foreach($sessions as $session): ?>
                <li>
                    <?php echo htmlspecialchars($session['title']); ?> - <?php echo htmlspecialchars($session['date']); ?> at <?php echo htmlspecialchars($session['time']); ?>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>
</body>
</html>
