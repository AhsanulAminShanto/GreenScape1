<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}

include 'db_config.php';

$username = $_SESSION['username'];
$sql = "SELECT * FROM users WHERE username='$username'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard</title>
    <link rel="stylesheet" href="style3.css">
</head>
<body>
    <nav>
        <ul>
            <li><a href="#">Home</a></li>
            <li><a href="about.php">About</a></li>
            <li><a href="contact2.php">Contact</a></li>
            <li><a href="indoor.php">Indoor Improvement</a></li>
            <li><a href="outdoor.php">Outdoor Improvement</a></li>
            <li><a href="logout.php">Logout</a></li>
            <li><a href="demo.php">Help US</a></li>
        </ul>
    </nav>

    <div class="container">
        <h2>Welcome, <?php echo $row['username']; ?></h2>
        <p>Your address: <?php echo $row['address']; ?></p>
        <form action="indoor.php">
            <input type="submit" value="Indoor Improvement">
        </form>
        <form action="outdoor.php">
            <input type="submit" value="Outdoor Improvement">
        </form>
    </div>
</body>
</html>
