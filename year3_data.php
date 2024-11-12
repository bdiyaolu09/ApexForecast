<?php
  session_start();
  if(!isset($_SESSION['email'])) {
    header("Location: vallogin.php");
  }
  //connect to the database
  $db_host = "localhost";
  $db_username = "root1";
  $db_password = "123";
  $db_name = "bdiyaolu";
  $connection = mysqli_connect($db_host, $db_username, $db_password, $db_name);

  //check the connection
  if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
  }
  $email = $_SESSION['email'] ;

  //echo 'email: '.$email;
	
  //check if data already exists for the given email and year
  $select_query = "SELECT * FROM Data WHERE email='$email' AND year= 1";
  $result = mysqli_query($connection, $select_query);

  if(mysqli_num_rows($result) > 0) {
    $row = $result->fetch_assoc();
    $industry = $row['industry'];
  }
  
  //check if data already exists for the given email and year
  $select_query = "SELECT * FROM Data WHERE email='$email' AND year= 3";
  $result = mysqli_query($connection, $select_query);
 $flag = 0;

  if(mysqli_num_rows($result) > 0) {
    $row = $result->fetch_assoc();
    //$industry = $row['industry'];
    $net_sales = $row['net_sales'];
   // echo $net_sales;
    $revenue = $row['revenue'];
    $cogs = $row['cogs'];
    $operating_profit = $row['operating_profit'];
    $total_cost = $row['total_cost'];
    $aiasp = $row['aiasp'];

    $flag = 1;

  }

  ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style6.css">
  <title>Data1</title>
</head>
<body>
  <div class="background">
  <nav class="navbar">
  <h2 class="logo">ApexForecast</h2>
  <ul>
    <li><a href="HomePage.php">Home</a></li>
    <li><a href="About.html">About</a></li>
    <li><a href="year3_data.php">Data</a></li>
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

       
      <div id="container">
       
        <!--form wrap start-->
      
        <div id="year3" class="container">
        <?php
            if($flag == 0)
            {
              //echo 'here1'."<br>";
              echo '<div class="form-wrap">';
              echo '<h1>Year 3</h1>';
              echo '<form action="Data3.php" method="post">';
              echo '<div class="form-group">';
              echo ' <label for="Industry">Industry: '.$industry.'</label>';
                  
			/*
              echo '<select name="industry-select">';
              echo '<option value="">--Select an Industry--</option>';
              echo '<option value="Agricultural Services">Agricultural Services</option>';
              echo '<option value="Textile Mill">Textile Mill</option>';
              echo '<option value="Leather">Leather</option>';
              echo '<option value="Communication">Communication</option>';
              echo '<option value="Apparel Stores">Apparel Stores</option>';
              echo '<option value="Retail">Retail</option>';
              echo '<option value="Furniture Stores">Furniture Stores</option>';
              echo '<option value="Real Estate">Real Estate</option>';
              echo '<option value="Hotels">Hotels</option>';
              echo '<option value="Automotive Repairs">Automotive Repairs</option>';
              echo '</select>';
			  */
              echo '</div>';
            
              echo '<div class="form-group"><label for="net_sales">Net Sales</label><input type="number" name="net_sales" required></div>';
              echo '<div class="form-group"><label for="Revenue">Revenue</label><input type="number" name="Revenue" required></div>';
              echo '<div class="form-group"><label for="CoGS">COGS</label><input type="number" name="COGS" required></div>';
              echo '<div class="form-group"><label for="Operating_Profit">Operating Profit</label><input type="number" name="Operating_Profit" required></div>';
              echo '<div class="form-group"><label for="Total_Cost">Cost</label><input type="number" name="Total_Cost" required></div>';
              echo '<div class="form-group"><label for="AIASP">AIASP</label><input type="number" name="AIASP" required></div>';
              echo '<input type="Submit" value = "Enter" class = "button" >&nbsp;&nbsp;&nbsp;<a href="year2_data.php" class = "prev-link">Previous</a></div>';
              echo '</div>';
              echo '</form>';
            }
            else
            {
             // echo 'here2'."<br>";

              echo '<div class="form-wrap">';
              echo '<h1>Year 3</h1>';
              echo '<form action="Data3.php" method="post">';
              echo '<div class="form-group">';
              echo ' <label for="Industry">Industry: '.$industry.'</label>';
			  
			  /*
              //echo ' <label for="Industry">Industry</label>';
                
              echo '<select name="industry-select">';

              if($industry == "Agricultural Services")
              {
                echo '<option selected value="Agricultural Services">Agricultural Services</option>';
              }
              else
              {
                echo '<option value="Agricultural Services">Agricultural Services</option>';
              }
              if($industry == "Textile Mill")
              {
                echo '<option Selected value="Textile Mill">Textile Mill</option>';
              }
              else
              {
                echo '<option value="Textile Mill">Textile Mill</option>';
              }
              if($industry == "Leather")
              {
                echo '<option selected value="Leather">Leather</option>';
              }
              else
              {
                echo '<option value="Leather">Leather</option>';
              }
              if($industry == "Communication")
              {
                echo '<option selected value="Communication">Communication</option>';
              }
              else
              { 
                echo '<option value="Communication">Communication</option>';
              }
              if($industry == "Apparel Stores")
              {
                echo '<option selected value="Apparel Stores">Apparel Stores</option>';
              }
              else
              { 
                echo '<option value="Apparel Stores">Apparel Stores</option>';
              }
              if($industry == "Retail")
              {
                echo '<option selected value="Retail">Retail</option>';
              }
              else
              { 
                echo '<option value="Retail">Retail</option>';
              }
              if($industry == "Furniture Stores")
              {
                echo '<option selected value="Furniture Stores">Furniture Stores</option>';
              }
              else
              { 
                echo '<option value="Furniture Stores">Furniture Stores</option>';
              }
              if($industry == "Real Estate")
              {
                echo '<option slected value="Real Estate">Real Estate</option>';
              }
              else
              { 
                echo '<option value="Real Estate">Real Estate</option>';
              }
              if($industry == "Hotels")
              {
                echo '<option selected value="Hotels">Hotels</option>';
              }
              else
              { 
                echo '<option value="Hotels">Hotels</option>';
              }
              if($industry == "Automotive Repairs")
              {
                echo '<option slected value="Automotive Repairs">Automotive Repairs</option>';
              }
              else
              { 
                echo '<option value="Automotive Repairs">Automotive Repairs</option>';
              }


              
              echo '</select>';
			  */
              echo '</div>';

              //echo '</div>';
            
              //echo "<br>net sales: ".$net_sales."<br>";

              echo '<div class="form-group"><label for="net_sales">Net Sales</label><input type="number" name="net_sales" value = "'.$net_sales.'"></div>';
              echo '<div class="form-group"><label for="Revenue">Revenue</label><input type="number" name="Revenue" value = "'.$revenue.'"></div>';
              echo '<div class="form-group"><label for="CoGS">COGS</label><input type="number" name="COGS" value = "'.$cogs.'"></div>';
              echo '<div class="form-group"><label for="Operating_Profit">Operating Profit</label><input type="number" name="Operating_Profit" value = "'.$operating_profit.'"></div>';
              echo '<div class="form-group"><label for="Total_Cost"> Cost</label><input type="number" name="Total_Cost" value = "'.$total_cost.'"></div>';
              echo '<div class="form-group"><label for="AIASP">AIASP</label><input type="number" name="AIASP"  value = "'.$aiasp.'"></div>';
              echo '<input type="Submit" value ="Enter" class = "button">&nbsp;&nbsp;&nbsp;<a href="year2_data.php" class = "prev-link">Previous</a></div>';
              echo '</div>';
              echo '</form>';
            }
              
        ?>
         </div>
          
        </div>
      </div>
  
</body>
</html>
<script>
  document.getElementById('industry-select').addEventListener('change', function() {
  document.getElementById('industry-input').value = this.value;
 });

</script>

<style>
  
.background{
  background:linear-gradient(to top, rgba(0,0,0,0.5)50%,rgba(0,0,0,0.5)50%), url(1.jpg);
  background-position: center;
  background-size: cover;
  height: 150vh;
  color: white;
}
    .button{
  background: linear-gradient(45deg, gold, black);
  color: white;
  padding: 10px  20px;
  border: none;
  border-radius: 5px;
  cursor: pointer;
  margin-top: 20px;
  width: 40%; 
  text-align: center;
  text-decoration: none;
  display: inline-block;
  margin-right: 10px;
  }

  
  a.prev-link{
    text-decoration: none;
    color: inherit;
    background: linear-gradient(45deg, gold, black);
  color: white;
  padding: 10px  20px;
  border: none;
  border-radius: 5px;
  cursor: pointer;
  margin-top: 20px;
  width: 40%; 
  text-align: center;
  text-decoration: none;
  display: inline-block;
  margin-right: 10px;
  }
  .form-wrap {
  background-color: black;
  color: gold;
  border: 1px solid gold;
  box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.3);
  border-radius: 10px;
  padding: 50px;
  height: 900px;
  width: 500px;
  margin: 200px auto 0;
  font-size: 12px;
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