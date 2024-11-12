<?php
// Establish a connection to the database
$db_host = "localhost";
$db_user = "root1";
$db_pass = "123";
$db_name = "bdiyaolu";

$conn = new mysqli($db_host, $db_user, $db_pass, $db_name);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}


// Retrieve the data from the registration form
$firstname = mysqli_real_escape_string($conn, $_REQUEST['firstname']);
	$lastname = mysqli_real_escape_string($conn, $_REQUEST['lastname']);
//$firstname = $_POST['firstname'];
//$lastname = $_POST['lastname'];
$email = $_POST['email'];
$password = $_POST['password'];

// Insert the data into the User2 table
$sql = "INSERT INTO User2 (firstname, lastname, email, password) VALUES ('$firstname', '$lastname', '$email', '$password')";
//$conn = $link->query($sql);

//echo "here = ".$firstname."<br>".$lastname;


if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
 header("Location: index.html");
exit();

} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>





