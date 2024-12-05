<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Hash password for security
    $gender = $_POST['gender'];

    $confirm_password = $_POST['confirm_password'];

    if ($_POST['password'] === $confirm_password) {
        // Prepare statement to prevent SQL injection
        $stmt = $conn->prepare("INSERT INTO users (name, username, email, password, gender) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("sssss", $name, $username, $email, $password, $gender);

        if ($stmt->execute()) {
            header("Location: after.html");
        } else {
            echo "Error: " . $stmt->error;
        }
        $stmt->close();
    } else {
        echo "Passwords do not match!";
    }
}

$conn->close();
?>
