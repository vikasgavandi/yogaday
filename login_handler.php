<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();

// Database connection parameters
$servername = "localhost";
$username = "root";
$password = "";
$database = "alcare";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if username is set and not empty
    if (isset($_POST["username"]) && !empty($_POST["username"])) {
        // Sanitize and store the username
        $username = $conn->real_escape_string($_POST["username"]);

        // Check if the user already exists in the database
        $sql_check = "SELECT * FROM users WHERE username = '$username'";
        $result_check = $conn->query($sql_check);

        if ($result_check->num_rows > 0) {
            // User already exists, redirect back to login page with error message
            header("Location: index.php?error=user_exists");
            exit();
        } else {
            // User does not exist, insert the new user into the database
            $sql_insert = "INSERT INTO users (username, login_count, score) VALUES ('$username', 0, 0)";
            if ($conn->query($sql_insert) === TRUE) {
                // New user inserted successfully, set session variables and redirect to app.html
                $_SESSION["username"] = $username;
                $_SESSION["score"] = 0; // Set initial score to 0
                header("Location: app.html");
                exit();
            } else {
                // Error inserting user, redirect back to login page with error message
                header("Location: index.php?error=insert_error");
                exit();
            }
        }
    } else {
        // Username is empty, redirect back to login page with error message
        header("Location: index.php?error=username_required");
        exit();
    }
}

// Close database connection
$conn->close();
?>
