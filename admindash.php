

<style>
body{
   height: 100vh;
   display: grid;
   grid-template-columns:300px 1fr;
   grid-template-rows: 60px 1fr;
   grid-template-areas:
   "side header"
   "side main";
   font-family: 'ubuntu', sans-serif;
   background: black;
}
 .header{
    background: linear-gradient(45deg, black, gold);
   grid-area: header;
}


.header h1{
    text-align: center;
    color: gold;
    padding: 5px;
}
.sidebar{
    background-color: black;
  
    grid-area: side;
 
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

 


.main{
    background-color: black;
    padding: 25px;
   grid-area: main;

   display: grid;
   grid-template-columns: 1fr 1fr  1fr ;
   grid-template-columns: 1fr 1fr  1fr ;
   grid-template-areas:
   "c1  c2  c3"
   "c4  c4 c4"
   "c4   c4  c4";
 
   gap: 20px;
}

.card {
    background: linear-gradient(45deg, gold, black);
    border-radius: 10px;
    padding: 20px; /* add some padding to the card */
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.2); /* add a box shadow to the card */
      transition: transform 0.3s ease-in-out, box-shadow 0.3s ease-in-out; 
      line-height: 1.5;
}
.card:hover {
  transform: translateY(-10px); /* move the card up by 10 pixels on hover */
  box-shadow: 0 5px 10px rgba(0, 0, 0, 0.3); /* increase the box shadow on hover */
}
.card h3{
  margin: 0;
}
h3{
  color: white;
}
.card:nth-child(1){
   grid-area: c1; 
}
.card:nth-child(2){
   grid-area: c2; 
}
.card:nth-child(3){
   grid-area: c3; 
}
.card:nth-child(4){
   grid-area: c4; 
}


.number{
    font-size: 35px;
    font-weight: 500;
    color: white;
}
.card-name{
    color: antiquewhite;
    font-weight: 600;   
}
.icon-box ion-icon{
   font-size: 45px;
   color: black;
}
th, td {
  text-align: left;
  padding: 8px;
}

th {
  background: linear=linear-gradient(45deg, black, gold);
  color: white;
}

tr:nth-child(even) {
  background-color:linear=linear-gradient(45deg, black, gold);
}

button {
background-color:black;
  border: none;
  color: white;
  padding: 5px 10px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 12px;
  margin: 2px;
  cursor: pointer;
  border-radius: 3px;
 
}
</style>
<!DOCTYPE html>
<html>
<head>
    <title> Operating_Profit_Graph</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <header class = "header">
        <h1>Admin Dashboard</h1>
    </header>

    <section class = "sidebar">
        <ul>
            <li>
                <a href = "#">
                    <span class = "icon"><ion-icon name="logo-apple-ar"></ion-icon></span>
                    <span class = "title"> Apex Forecast</span>
                </a>
            </li>
        </ul>
        <ul>
            <li>
                <a href = "#">
                    <span class = "icon"><ion-icon name="reader-sharp"></ion-icon></span>
                    <span class = "title"> Data</span>
                </a>
            </li>
        </ul>
        <ul>
            <li>
                <a href = "#">
                    <span class = "icon"><ion-icon name="mail-sharp"></ion-icon></span>
                    <span class = "title">Message</span>
                </a>
            </li>
        </ul>
        <ul>
            <li>
                <a href = "#">
                    <span class = "icon"><ion-icon name="walk-sharp"></ion-icon></span>
                    <span class = "title">Help</span>
                </a>
            </li>
        </ul>
      
       
        <ul>
            <li>
                <a href = "Homepage.php">
                    <span class = "icon"><ion-icon name="repeat-sharp"></ion-icon></span>
                    <span class = "title">Logout</span>
                </a>
            </li>
        </ul>
    </section>
        
    <main class = "main">
       <div class= "card">
         <div class="card-content">
            <div class= "number">10</div>
            <div class="card-name">Total Industries</div>
         </div>
           <div class="icon-box">
           <ion-icon name="cash-sharp"></ion-icon>
            </div>
       </div> 
       <div class= "card">
         <div class="card-content">
            <div class= "number">5</div>
            <div class="card-name">Total Predictions Per User</div>
         </div>
           <div class="icon-box">
           <ion-icon name="man-sharp"></ion-icon>
            </div>
       </div> 
       
       <div class= "card">
         <div class="card-content">
            <div class= "number">3</div>
            <div class="card-name">Total Years</div>
          </div>
           <div class="icon-box">
           <ion-icon name="bookmarks-sharp"></ion-icon>
            </div>
       </div>
    
       <div class="card">
       <?php
$db_host = "localhost";
$db_username = "root1";
$db_password = "123";
$db_name = "bdiyaolu";

$conn = new mysqli($db_host, $db_username, $db_password, $db_name);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if(isset($_POST['submit'])) {
  // Update the user record
  $email = $_POST['email'];
  $firstname = $_POST['firstname'];
  $lastname = $_POST['lastname'];
  $password = $_POST['password'];
  $sql = "UPDATE user2 SET firstname='$firstname', lastname='$lastname', password='$password' WHERE email='$email'";
  if ($conn->query($sql) === TRUE) {
      echo "Record updated successfully";
  } else {
      echo "Error updating record: " . $conn->error;
  }
}

if(isset($_POST['delete'])) {
  // Delete the user record
  $email = $_POST['email'];
  $sql = "DELETE FROM user2 WHERE email='$email'";
  if ($conn->query($sql) === TRUE) {
      echo "Record deleted successfully";
  } else {
      echo "Error deleting record: " . $conn->error;
  }
}

$sql = "SELECT firstname, lastname, email, password FROM user2 WHERE firstname != '' AND lastname != '' AND email != '' AND password != ''";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
  echo '<div class="card">';
  echo '<table>';
  echo '<thead>';
  echo '<tr>';
  echo '<th>First Name</th>';
  echo '<th>Last Name</th>';
  echo '<th>Email</th>';
  echo '<th>Password</th>';
  echo '<th>Options</th>';
  echo '</tr>';
  echo '</thead>';
  echo '<tbody>';

  $user_count = mysqli_num_rows($result); // Get the number of users
  echo '<div class="card">';
  echo '<h2>User Count: ' . $user_count . '</h2>'; // Display the user count in another card
  echo '</div>';

  while ($row = mysqli_fetch_assoc($result)) {
    echo '<tr>';
    echo '<form method="POST">';
    echo '<input type="hidden" name="email" value="' . $row['email'] . '">';
    echo '<td><input type="text" name="firstname" value="' . $row['firstname'] . '"></td>';
    echo '<td><input type="text" name="lastname" value="' . $row['lastname'] . '"></td>';
    echo '<td>' . $row['email'] . '</td>';
    echo '<td><input type="password" name="password" value="' . $row['password'] . '"></td>';
    echo '<td>';
    echo '<button type="submit" name="submit">Edit</button>';
    echo '<button type="submit" name="delete">Delete</button>';
    echo '</td>';
    echo '</form>';
    echo '</tr>';
  }

  echo '</tbody>';
  echo '</table>';
  echo '</div>';
} else {
  echo 'No users found.';
}

mysqli_close($conn);
?>


        </div>


    </main>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>





