<?php
ini_set('display_errors', 1);

$db_host='localhost';
$db_user = 'root1';
$db_password = '123';
$db_db='bdiyaolu';

$conn = new mysqli($db_host, $db_user, $db_password, $db_db);

if($conn->connect_error){
    printf("Connect failed: %s\n", $conn->connect_error);
    exit();
}

if (isset($_POST['Analyze'])) {
    // Store the values from the HTML form into variables
    $user_email = $_SESSION['email'];
    $industry = $_POST['industry'];
    $years_data = array(
        array(
            "year" => 1,
            "turnover_rate" => $_POST['turnover_rate'],
            "net_profit_margin" => $_POST['net_profit_margin'],
            "gross_profit_margin" => $_POST['gross_profit_margin'],
            "operating_profit_margin" => $_POST['operating_profit_margin']
        ),
        array(
            "year" => 2,
            "turnover_rate" => $_POST['year_2_turnover_rate'],
            "net_profit_margin" => $_POST['year_2_net_profit_margin'],
            "gross_profit_margin" => $_POST['year_2_gross_profit_margin'],
            "operating_profit_margin" => $_POST['year_2_operating_profit_margin']
        ),
        array(
            "year" => 3,
            "turnover_rate" => $_POST['year_3_turnover_rate'],
            "net_profit_margin" => $_POST['year_3_net_profit_margin'],
            "gross_profit_margin" => $_POST['year_3_gross_profit_margin'],
            "operating_profit_margin" => $_POST['year_3_operating_profit_margin']
        )
    );

   

    // Prepare the SQL statement
    $stmt = $conn->prepare("INSERT INTO User_Analysis_Information (email, industry, year, turnover_rate, net_profit_margin, gross_profit_margin, operating_profit_margin) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssddddd", $user_email, $industry, $year, $turnover_rate, $net_profit_margin, $gross_profit_margin, $operating_profit_margin);

    // Insert the data into the User Analysis Information table
    foreach ($years_data as $data) {
        $year = $data["year"];
        $turnover_rate = $data["turnover_rate"];
        $net_profit_margin = $data["net_profit_margin"];
        $gross_profit_margin = $data["gross_profit_margin"];
        $operating_profit_margin = $data["operating_profit_margin"];
        $stmt->execute();
    }
    echo "Data inserted successfully";

    $conn->close();
    ob_start();
header("Location: services.html");
ob_end_flush();

    header("Location: services.html");
    exit;
}
?>
