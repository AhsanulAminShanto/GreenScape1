<?php
// Database connection parameters
$servername = "localhost";
$username = "root";
$password = "";
$database = "greendbms";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $name = isset($_POST["name"]) ? $_POST["name"] : "";
    $email = isset($_POST["email"]) ? $_POST["email"] : "";
    $message = isset($_POST["message"]) ? $_POST["message"] : "";

    // Prepare and execute SQL query to insert data into table
    $sql = "INSERT INTO contacts (name, email, message) VALUES ('$name', '$email', '$message')";
    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us Page</title>
    <link rel="stylesheet" href="style3.css">
</head>
<body>
    <!-- Navigation -->
    <nav>
        <ul>
            <li><a href="#">Home</a></li>
            <li><a href="about.php">About</a></li>
            <li><a href="contact.php">Contact</a></li>
            <li><a href="indoor.php">Indoor Improvement</a></li>
            <li><a href="outdoor.php">Outdoor Improvement</a></li>
            <li><a href="logout.php">Logout</a></li>
        </ul>
    </nav>

    <!-- Contact Form -->
    <div class="contact-form-tittle">
        <h2>Contact Us </h2>
    </div>
    <div class="contact-form">
        <form id="contactForm" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
            <label for="message">Message:</label>
            <textarea id="message" name="message" required></textarea>
            <button type="submit">Submit</button>
        </form>
    </div>

    <!-- Display Input (if needed) -->
    <div class="display-input" id="displayInput">
        <!-- Input from JS -->
    </div>

    <!-- Thank you message -->
    <p><center>Thank you for staying with us</center></p>

    <!-- Footer -->
    <footer id="footer_text">
        <p>&copy; @2024 All Rights Reserved.</p>
    </footer>

    <!-- Include JavaScript -->
    <script src="script.js"></script>
</body>
</html>

