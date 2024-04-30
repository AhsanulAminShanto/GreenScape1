<?php
?> 
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>GreenScape - Sustainable Urban Living Ecosystem</title>
</head>

<body>
    <header>
        <h1>Welcome to GreenScape</h1>
        <!-- Navigation links go here -->
    </header>
    <Br>
    <nav class="navbar">
        <a href="index.php">Home </a>
        <a href="dashboard.php"> User Dashboard</a>
        <a href="garden.php"> Garden</a>
        <a href="forum.php"> Forum</a>
        <a href="contact.php"> Contact Us</a>
        <a href="login.php">Login</a>
    </nav>
    <div class="forum">
        <h1>Environmental Planning Forum</h1>
        
        <!-- Form for posting new messages -->
        <form id="postForm">
            <textarea id="message" placeholder="Write your message here..."></textarea><br>
            <input type="submit" value="Post Message">
        </form>
        
        <!-- Existing posts -->
        <div id="posts"></div>
    </div>
    
    <script>
        // Function to handle form submission
        document.getElementById('postForm').addEventListener('submit', function(event) {
            event.preventDefault(); // Prevent default form submission
            
            // Get message input value
            var message = document.getElementById('message').value;
            
            // Create new post element
            var post = document.createElement('div');
            post.classList.add('post');
            post.innerHTML = '<h2>User</h2><p>' + message + '</p>';
            
            // Append new post to posts container
            document.getElementById('posts').appendChild(post);
            
            // Clear message input
            document.getElementById('message').value = '';
        });
    </script>

    <footer>
        <!-- Footer content goes here -->
    </footer>

    <script src="script.js"></script>
</body>

</html>