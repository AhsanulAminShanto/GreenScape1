<?php
// Include database configuration
include 'db_config.php';

// Start the session
session_start();

// Check if the user is logged in
if (!isset($_SESSION['username'])) {
    // Redirect to the login page if not logged in
    header("Location: login.php");
    exit;
}

// Retrieve the username of the logged-in user
$username = $_SESSION['username'];

// Retrieve data from the users table for the logged-in user
$sql = "SELECT * FROM users WHERE username = '$username'";
$result = mysqli_query($conn, $sql);

// Check if data exists
if (mysqli_num_rows($result) > 0) {
    // Fetch data and store it in an array
    $user = mysqli_fetch_assoc($result);
} else {
    $user = null; // Set user to null if no data found
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Me</title>
    <link rel="stylesheet" href="style3.css">
</head>
<body>
<nav>
        <ul>
            <li><a href="dashboard.php">Home</a></li>
            <li><a href="about.php">About</a></li>
            <li><a href="contact2.php">Contact</a></li>
            <li><a href="indoor.php">Indoor Improvement</a></li>
            <li><a href="outdoor.php">Outdoor Improvement</a></li>
            <li><a href="logout.php">Logout</a></li>
        </ul>
    </nav>
    <div class="container">
        <h2>About Me</h2>
        <?php if ($user) : ?>
            <p>Username: <?php echo $user['username']; ?></p>
            <p>Email: <?php echo $user['email']; ?></p>
            <p>Address: <?php echo $user['address']; ?></p>
        <?php else : ?>
            <p>No data found for this user.</p>
        <?php endif; ?>
        <a href="logout.php">Logout</a>
    </div>
</body>
</html>

