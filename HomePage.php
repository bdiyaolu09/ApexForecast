<?php
session_start();

// Check if user is logged in
if (!isset($_SESSION['email'])) {
  header('Location: vallogin.php');
  exit();
}

// Retrieve user's first and last name from database or session
$firstname = $_SESSION['firstname'] ?? '';
$lastname = $_SESSION['lastname'] ?? '';
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Homepage</title>
  <link rel="stylesheet" href="style3.css">
</head>
<body>
  <div class="background">
  <nav class="navbar">
  <h2 class="logo">ApexForecast</h2>
  <ul>
    <li><a href="HomePage.php">Home</a></li>
    <li><a href="About.html">About</a></li>
    <li><a href="year1_data.php">Data</a></li>
    <li><a href="profile.php">Profile</a></li>
    <li class="dropdown-toggle"><a href="#">More</a>
      <ul class="dropdown-menu">
        <li><a href="services.php">Services</a></li>
        <li><a href="Contact.html">Contact</a></li>
        <li><a href="adminlog.html">Admin</a></li>
        <li><a href="index.html">Signout</a></li>
      </ul>
    </li>
  </ul>
</nav>

    <div class="center">
      <?php if ($firstname && $lastname) { ?>
        <h1>Welcome <?php echo $firstname . ' ' . $lastname; ?></h1>
      <?php } else { ?>
        <h1>Welcome</h1>
      <?php } ?>

      <h2>Forecast Your Business Future</h2>
      <div class="buttons">
        <button class="btn-1"><a href="About.html">Explore More</a></button>
        <button class="btn-2"><a href="Contact.html">Contact Us</a></button>
      </div>
    </div>
  </div>
</body>
</html>


<style>
  .center .buttons{
  margin: 35px 28px;
 
}

.buttons button{
  height: 50px;
  width: 150px;
  font-size: 18px;
  font-weight: bold;
  color: white;
  background: linear-gradient(45deg, black, gold);
  border: 1px solid gold;
  outline: none;
  cursor: pointer;
  border-radius: 25px;
  transition: .5s ease-in-out;
  text-align: center;
 
}

.buttons .btn-1{
  margin-left: 250px;
  text-decoration: none;

}
.btn-1 a{
  text-decoration: none;
  color: white;
}


.btn-2 a{
  text-decoration: none;
  color: white;
}
.buttons .btn-2{
  margin-left: 20px;
  text-decoration: none;
}

.buttons button:hover{
background: gold;
}
.navbar .dropdown-toggle {
  position: relative;
}

.navbar .dropdown-toggle .dropdown-menu {
  display: none;
  position: absolute;
  top: 100%;
  left: 0;
  z-index: 1;
  background: rgba(0,0,0,0.4);
  color: white; /* text color */
  text-align: center; /* center text */
  padding: 10px; /* add padding */
  border-radius: 5px; /* rounded corners */
  box-shadow: 0 2px 5px rgba(0,0,0,0.5); /* add shadow */
}


.navbar .dropdown-toggle:hover .dropdown-menu {
  display: block;
}

</style>

