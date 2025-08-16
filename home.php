<?php
include 'config.php';
session_start();

if (!isset($_SESSION['user_id'])) {
    header('location:index.php?form=login');
    exit();
}

$user_id = $_SESSION['user_id'];
$select = "SELECT * FROM users WHERE id = '$user_id'";
$result = mysqli_query($conn, $select);
$user_info = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome Page</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h2>Welcome, <?php echo htmlspecialchars($user_info['username']); ?>!</h2>
        <p>You have successfully logged in.</p>
        <a href="logout.php" class="btn">Logout</a>
    </div>
</body>
</html>