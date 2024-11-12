<?php
// Start the session
session_start();

// Check if the user is logged in
if (!isset($_SESSION['email'])) {
  // Redirect to the login page
  header("Location: vallogin.php");
  exit();

}
$email = $_SESSION['email'] ?? '';
$firstname = $_SESSION['firstname'] ?? '';
$lastname = $_SESSION['lastname'] ?? '';

// Connect to the database
$db_host = 'localhost';
$db_name = 'bdiyaolu';
$db_user = 'root1';
$db_pass = '123';
$db_conn = new mysqli($db_host, $db_user, $db_pass, $db_name);

// Check for any errors connecting to the database
if ($db_conn->connect_error) {
  die("Connection failed: " . $db_conn->connect_error);
}

// Prepare the SQL query to retrieve the user's industry
$sql = "SELECT industry FROM user_info WHERE email = '$email'";

// Execute the query
$result = $db_conn->query($sql);

// Check if the query returned any results
if ($result->num_rows > 0) {
  // Fetch the first row of results
  $row = $result->fetch_assoc();

  // Set the user's industry in the session variable
  $_SESSION['industry'] = $row['industry'];
}

// Close the database connection
$db_conn->close();

?>
<style>
body{
height: 120vh;
display: grid;
grid-template-columns: 300px 1fr;
grid-template-rows: 60px 1fr;
background: black;
}

.header{

  background: linear-gradient(45deg, black);
    border-bottom: 1px solid gold;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.3);

  grid-column: 2/3;
  grid-row: 1/2;

}
.sidebar{
 background-color: black; 
 grid-column: 1 /2 ;
 grid-row: 1/3;
}
.sidebar ul li{
    position: relative;
    width: 100%;
    list-style: none;
    border-top-left-radius: 30px;
    border-bottom-left-radius: 30px;
}
.sidebar ul li a{
    width: 100%;
    text-decoration: none;
    color: white;
    height: 60px;
    display: flex;
    align-items: center;
}
.sidebar ul li:hover{
   background: gold; 
}

.sidebar ul li:nth-child(1){
    line-height: 60px;
    margin-bottom: 20px;
    font-weight: 600;
    border-bottom: 1px solid gold;
}
.sidebar ul li:nth-child(1):hover{
    background: none;
}

.sidebar ul li a .icon{
  min-width: 60px;
  font-size: 24px;
  text-align: center;  
}


.sidebar .title{
    padding: 0 10px;
    font-size: 20px;
    text-align: center;
}
.header h1{
  color: gold;
    font-size: 36px;
    margin: 20px 0;
    text-shadow: 2px 2px 2px rgba(0, 0, 0, 0.5);
    text-align: center;
}
.main{
background-color: black;
grid-column: 2/3;
grid-row: 2/3;
}
.card-content {
  color: black;
  width: 100%;
  transition: width 0.5s ease-in-out;
}

.profile {
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  padding: 20px;
  border-radius: 10px;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
}

.profile ion-icon {
  font-size: 120px;
  margin-bottom: 20px;
  color: #fff;
  background: linear-gradient(to bottom right, #3f51b5, #2196f3);
  padding: 20px;
  border-radius: 50%;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
}

.profile p {
  font-size: 18px;
  margin: 10px 0;
  padding: 10px;
  text-align: center;
}

.profile p strong {
  font-weight: bold;
  color: #3f51b5;
  text-transform: uppercase;
  letter-spacing: 2px;
}






.card {
  background: linear-gradient(45deg, gold, black);
    border-radius: 10px;
    padding: 20px; /* add some padding to the card */
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.2); /* add a box shadow to the card */
      transition: transform 0.3s ease-in-out, box-shadow 0.3s ease-in-out; 
      line-height: 1.5;
      width: 1fr;
      height: 100%;
}

.card h3{
  margin: 0;
}
h3{
  color: white;
}

.card-content{
  color: antiquewhite;
}
</style>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <header class = "header">
    <h1>User Profile</h1>
  </header>
  <section class = "sidebar">
  <ul>
            <li>
                <a href = "Homepage.php">
                    <span class = "icon"><ion-icon name="logo-apple-ar"></ion-icon></span>
                    <span class = "title"> Apex Forecast</span>
                </a>
            </li>
        </ul>
        <ul>
            <li>
                <a href = "year1_data.php">
                    <span class = "icon"><ion-icon name="reader-sharp"></ion-icon></span>
                    <span class = "title"> Data</span>
                </a>
            </li>
        </ul>
        <ul>
            <li>
                <a href = "Contact.html">
                    <span class = "icon"><ion-icon name="mail-sharp"></ion-icon></span>
                    <span class = "title">Message</span>
                </a>
            </li>
        </ul>
        <ul>
            <li>
                <a href = "About.html">
                    <span class = "icon"><ion-icon name="walk-sharp"></ion-icon></span>
                    <span class = "title">About</span>
                </a>
            </li>
        </ul>
       
        <ul>
            <li>
                <a href = "Homepage.php">
                    <span class = "icon"><ion-icon name="repeat-sharp"></ion-icon></span>
                    <span class = "title">Exit Profile</span>
                </a>
            </li>
        </ul> 
  </section>
  <main class = "main">
  <div class= "card">
         <div class="card-content">
           <div class="profile">
              <ion-icon name="person-circle-outline"></ion-icon>
              <p>Name: <?php echo $firstname . ' ' . $lastname; ?></p>
             <p>Email: <?php echo $email; ?></p>
              <p>Industry: <?php echo $_SESSION['industry']; ?></p>
               <p>Historical Data Used: 3 Years</p>
                  <p>Prediction: 5 Years</p>
             </div>
         </div>
  </main>
  <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>