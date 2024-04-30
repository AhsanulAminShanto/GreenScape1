<?php
include 'db_config.php';

// Sign up logic
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];
    $repeatPassword = $_POST["repeat_password"];
    $address = $_POST["address"];
    $email = $_POST["email"];
    $rememberMe = isset($_POST["remember_me"]) ? 1 : 0; // 1 if checked, 0 if not

    // Check if passwords match
    if ($password !== $repeatPassword) {
        echo "Passwords do not match!";
    } else {
        // Hash the password
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        // Prepare and execute SQL query to insert user data
        $sql = "INSERT INTO users (username, password, address, email, remember_me) VALUES ('$username', '$hashedPassword', '$address', '$email', '$rememberMe')";
        if (mysqli_query($conn, $sql)) {
            echo "Sign up successful!";
            // Redirect to login page
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="stylesheet" href="style2.css">
</head>
<body>
    <div class="form-container">
    <h2>Sign Up</h2>
    <form method="post" action="signup.php">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required><br><br>
        
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required><br><br>
        
        <label for="repeat_password">Repeat Password:</label>
        <input type="password" id="repeat_password" name="repeat_password" required><br><br>
        
        <label for="address">Address:</label>
        <input type="text" id="address" name="address"><br><br>
        
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br><br>
        
        <input type="checkbox" id="remember_me" name="remember_me">
        <label for="remember_me">Remember Me</label><br><br>
        
        <input type="submit" value="Sign Up">
        <div class="login-button">
            <a href="login.php">Login</a>
            </div>
            </div>
    </form>
</body>
</html>
