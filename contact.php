<?php
// PHP code goes here if needed
?>

<?php // Start PHP block ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ContactUsPage</title>
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Gabarito&family=Playfair+Display&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Madimi+One&display=swap" rel="stylesheet">
</head>
<body>
    <?php // Start PHP block ?>

    <!--           Name: Ahsanul Amin Shanto       ...               ID: 2010784 -->
    <nav class="navbar">
        <a href="index.php">Home </a>
        <a href="dashboard.php"> User Dashboard</a>
        <a href="garden.php"> Garden</a>
        <a href="forum.php"> Forum</a>
        <a href="contact.php"> Contact Us</a>
        <a href="login.php">Login</a>
    </nav>
    <div class="contact-form-tittle">
        <h2><img src="images/00.png" alt="">Contact <span class="golden_color">Us</span><img src="images/00.png" alt=""></h2>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Enim, sapiente!</p>
    </div>
    <div class="contact-form">
        <form id="contactForm" method="post" action="process_form.php"> <!-- action attribute specifies the PHP script to handle form submission -->
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
            <label for="message">Message:</label> <!-- corrected spelling of 'message' -->
            <textarea id="message" name="message" required></textarea> <!-- corrected 'massage' to 'message' -->
            <button type="submit">Submit</button> <!-- changed type to 'submit' -->
        </form>
    </div>
    <!-- Display Input -->
    <div class="display-input" id="displayInput">
        <!-- Input from JS -->
    </div>
    <p><center>Thank you for staying with us</center></p>
    <footer id="footer_text">
        <h1>xxxxxxxxxx</span></h1>
        <p>&copy; @2024 All Rights Reserved.</p>
    </footer>

    <?php // End PHP block ?>

    <script src="script.js"></script>
</body>
</html>

<?php // End PHP block ?>
