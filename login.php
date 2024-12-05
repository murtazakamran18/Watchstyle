<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Check if user exists
    $stmt = $conn->prepare("SELECT password FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->bind_result($hashed_password);
    
    if ($stmt->fetch() && password_verify($password, $hashed_password)) {
        header("Location: home.html");
        exit();
    } else {
        echo "Invalid email or password!";
    }
    
    $stmt->close();
}

$conn->close();
?>
