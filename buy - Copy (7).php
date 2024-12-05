<?php
// Database connection
$servername = "localhost";  // Your server (localhost for local development)
$username = "root";         // Your database username
$password = "";             // Your database password
$dbname = "watchstyle";  // Your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fullName = $_POST['full_name'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];

    // Sanitize input data
    $fullName = $conn->real_escape_string($fullName);
    $email = $conn->real_escape_string($email);
    $address = $conn->real_escape_string($address);
    $phone = $conn->real_escape_string($phone);

    // SQL query to insert data into the database
    $sql = "INSERT INTO `buy7` (`s.no`, `name`, `email`, `address`, `number`) VALUES (NULL, '$fullName', '$email', '$address', '$phone');";

    if ($conn->query($sql) === TRUE) {
        header("Location: afterbuy.html");
        
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close connection
    $conn->close();
}
?>
