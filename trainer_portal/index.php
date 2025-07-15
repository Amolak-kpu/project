<?php
session_start();
if(isset($_SESSION['trainer'])){
    header('Location: dashboard.php');
    exit();
}
$error = isset($_GET['error']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Trainer Portal Login</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Trainer Portal</h1>
    <?php if($error): ?>
        <p class="error">Invalid credentials</p>
    <?php endif; ?>
    <form action="authenticate.php" method="post">
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>
        <button type="submit">Login</button>
    </form>
</body>
</html>
