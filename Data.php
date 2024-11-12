<?php

$db_host = "localhost";
$db_username = "root1";
$db_password = "123";
$db_name = "bdiyaolu";

// Create a database connection
$connection = mysqli_connect($db_host, $db_username, $db_password, $db_name);

// Check if the connection was successful
if (mysqli_connect_errno()) {
  die("Database connection failed: " . mysqli_connect_error());
}

// Get the email parameter from the GET request
if (isset($_GET['email'])) {
  $email = $_GET['email'];
} else {
  // Handle the case where the email parameter is not set
}

// Retrieve the user's data from the database based on their email
$query = "SELECT * FROM User_Info WHERE email = '$email'";
$result = mysqli_query($connection, $query);

// Convert the result set into a nested array
$data = [];
while ($row = mysqli_fetch_assoc($result)) {
  $year = $row['year'];
  //unset($row['user_id']);
  unset($row['email']);
  unset($row['year']);
  $data[$year] = $row;
}

mysqli_close($connection); // Close the database connection

// Return the data in JSON format
header("Content-Type: application/json");
echo json_encode($data);
