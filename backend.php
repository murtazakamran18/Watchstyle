<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $name = $_POST['Name'];
    $email = $_POST['Email'];
    $phone = $_POST['Phone'];
    $message = $_POST['Message'];
}

// Connecting to the Database
$servername = "localhost";
$username = "root";
$password = "";
$database = "watchstyle";

// Create a connection
$conn = mysqli_connect($servername, $username, $password, $database);

// Die if connection was not successful
if (!$conn){
    die("Sorry, we failed to connect: " . mysqli_connect_error());
}
 else {
    header("Location: aftermess.html");
}

// Sanitize user inputs to prevent SQL injection
$name = mysqli_real_escape_string($conn, $name);
$email = mysqli_real_escape_string($conn, $email);
$phone = mysqli_real_escape_string($conn, $phone);
$message = mysqli_real_escape_string($conn, $message);

// Sql query to be executed 
$sql = "INSERT INTO `contact` (`s.no`, `name`, `email`, `phone`, `message`) VALUES (NULL, '$name', '$email', '$phone', '$message');";

if (mysqli_query($conn, $sql)) {
    echo "Your form has been successfully submitted";
} else {
    echo "The record was not inserted successfully because of this error ---> " . mysqli_error($conn);
}

// Close the connection
mysqli_close($conn);
?>
