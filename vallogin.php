<?php

$db_host='localhost';
$db_user = 'root1';
$db_password = '123';
$db_db='bdiyaolu';

$conn = new mysqli($db_host, $db_user, $db_password, $db_db);

if($conn->connect_error){
    printf("Connect failed: %s\n", $conn->connect_error);
    exit();
}

$userEmail = $_REQUEST['email'];
$password = $_REQUEST['password'];

$sql = "SELECT User2.Email, User2.Password FROM User2 WHERE User2.Email = ? AND User2.Password = ?";

$stmt = $conn->prepare($sql);
$stmt->bind_param("ss", $userEmail, $password);
$stmt->execute();

$result = $stmt->get_result();

if ($result->num_rows > 0) {
    //Create/Start a session
    session_start();

    //Retrieve user's first and last name from database
    $sql = "SELECT FirstName, LastName FROM User2 WHERE Email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $userEmail);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    
    //Assign the session variables
    $_SESSION['email'] = $userEmail;
    $_SESSION['firstname'] = $row['FirstName'];
    $_SESSION['lastname'] = $row['LastName'];

    //Redirect to the profile page
    header("Location: HomePage.php");
} else {
    //Redirect back to login
    die("Incorrect password $userEmail $password");
}
?>