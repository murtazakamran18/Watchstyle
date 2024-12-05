<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $EnterEmail = $_POST['EnterEmail'];
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
} else {
    echo "Connection was successful<br>";
}

// Sanitize user inputs to prevent SQL injection
$EnterEmail = mysqli_real_escape_string($conn, $EnterEmail);

// Sql query to be executed 
$sql = "INSERT INTO `news` (`s.no`, `enteremail`) VALUES (NULL, '$EnterEmail');";

if (mysqli_query($conn, $sql)) {
    header("Location: afteremail.html");
} else {
    echo "The record was not inserted successfully because of this error ---> " . mysqli_error($conn);
}

// Close the connection
mysqli_close($conn);
?>