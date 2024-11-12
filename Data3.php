<?php
session_start();
if(!isset($_SESSION['email'])) {
  header("Location: vallogin.php");
}

//get the user email
$email = $_SESSION['email'];

//get the form data
//$industry = $_POST['industry-select'];
$net_sales = $_POST['net_sales'];
$revenue = $_POST['Revenue'];
$cogs = $_POST['COGS'];
$operating_profit = $_POST['Operating_Profit'];
$total_cost = $_POST['Total_Cost'];
$aiasp = $_POST['AIASP'];

// Set year to 3
$year = 3;

//calculate the required values
$gross_profit_margin = ($revenue - $cogs) / $revenue * 100;
$operating_profit_margin = $operating_profit / $revenue * 100;
$net_profit_margin = ($revenue - $total_cost) / $revenue * 100;
$turnover_rate = $net_sales / $aiasp;

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
//check if data already exists for the given email and year
  $select_query = "SELECT * FROM Data WHERE email='$email' AND year=1";
  $result = mysqli_query($connection, $select_query);

  if(mysqli_num_rows($result) > 0) {
    $row = $result->fetch_assoc();
    $industry = $row['industry'];
  }
  echo "<br><br>industry: ".$industry."<br><br>";


//check if data already exists for the given email and year
$select_query = "SELECT * FROM User_Info WHERE email='$email' AND year=$year";
$result = mysqli_query($connection, $select_query);

if(mysqli_num_rows($result) > 0) {
  //update the existing data in the database
  $update_query = "UPDATE User_Info SET industry='$industry', turnover_rate='$turnover_rate', net_profit_margin='$net_profit_margin', gross_profit_margin='$gross_profit_margin', operating_profit_margin='$operating_profit_margin' WHERE email='$email' AND year='$year'";

  if(mysqli_query($connection, $update_query)) {
    echo "Data updated successfully.";
  } else {
    echo "Error updating data: " . mysqli_error($connection);
  }
} else {
  //insert the new data into the database
  $insert_query = "INSERT INTO User_Info (email, industry, year, turnover_rate, net_profit_margin, gross_profit_margin, operating_profit_margin) VALUES ('$email', '$industry','$year', '$turnover_rate', '$net_profit_margin', '$gross_profit_margin', '$operating_profit_margin')";



  if(mysqli_query($connection, $insert_query)) {
    echo "Data1 stored successfully.";
  } else {
    echo "Error inserting data: " . mysqli_error($connection);
  }
}

// storing row data
//check if data already exists for the given email and year
$select_query = "SELECT * FROM Data WHERE email='$email' AND year= 3 ";
$result = mysqli_query($connection, $select_query);

if(mysqli_num_rows($result) > 0) {
    echo 'me<br>';
  //update the existing data in the database
  $update_query = "UPDATE Data SET industry='$industry', net_sales =$net_sales, revenue=$revenue, cogs=$cogs, operating_profit=$operating_profit,total_cost=$total_cost,aiasp=$aiasp  WHERE email='$email' AND year= 3 ";

  if(mysqli_query($connection, $update_query)) {
    echo "Data updated successfully.";
  } else {
    echo "Error updating data: " . mysqli_error($connection);
  }
} else {
  //insert the new data into the database
  $insert_query = "INSERT INTO Data (email, industry, year, net_sales, revenue, cogs, operating_profit, total_cost, aiasp) VALUES ('$email', '$industry',$year, $net_sales, $revenue, $cogs, $operating_profit,$total_cost,$aiasp)";



  if(mysqli_query($connection, $insert_query)) {
    echo "Data2 stored successfully.";
  } else {
    echo "Error inserting data: " . mysqli_error($connection);
  }
}


//close the database connection
mysqli_close($connection);

//redirect to year3 page
header("Location: year3_data.php");
exit;
?>
