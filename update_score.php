<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['score']) && isset($_POST['id'])) {
        $score = $_POST['score'];
        $id = $_POST['id'];

        // Database connection parameters
        $servername = "localhost";
        $dbusername = "root";
        $dbpassword = "";
        $database = "alcare";

        // Create connection
        $conn = new mysqli($servername, $dbusername, $dbpassword, $database);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Update the score in the database
        $sql = "UPDATE users SET score = ? WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ii", $score, $id);

        if ($stmt->execute()) {
            echo "Score updated successfully";
        } else {
            echo "Error updating score: " . $stmt->error;
        }

        $stmt->close();
        $conn->close();
    } else {
        echo "Invalid parameters";
    }
} else {
    echo "Invalid request method";
}
