<?php
$db_host = 'localhost';
$db_user = 'root1';
$db_password = '123';
$db_db = 'bdiyaolu';

// Create a new MySQLi object
$conn = new mysqli($db_host, $db_user, $db_password, $db_db);

// Check for connection errors
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve the email from user input
$email = $_POST['email'];

// Query the admin table for the email and password of the admin
$sql = "SELECT Email, Password FROM admin WHERE Email = '$email'";

// Execute the query
$result = $conn->query($sql);

// Check if the query was successful
if ($result === false) {
    // If the query failed, display an error message and exit
    echo "Error: " . $conn->error;
    exit;
}

// Check if there is a result
if ($result->num_rows > 0) {
    // Get the first row of the result as an associative array
    $row = $result->fetch_assoc();

    // Retrieve the email and password
    $email = $row['Email'];
    $password = $row['Password'];

    // Use the email and password to log in
    // ...
} else {
    echo "User is not an admin !.";
    exit;
}

header("Location: admindash.php");

// Close the connection
$conn->close();
?>




