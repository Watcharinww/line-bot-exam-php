<html>
<head></head>
<body>
<script type="text/javascript" src="Time.js"></script>
<?php
session_start();
date_default_timezone_set('Asia/Bangkok');

$servername = "us-cdbr-iron-east-01.cleardb.net";
$username = "bc2e88a0fd2a0e";
$password = "6ca79774";
$dbname = "heroku_5eae676745c3fe6";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}       
        $s_time = date("Y-m-d G:i:s", time());
        $r_time =  $_POST['d_job']." ".$_POST['hr_job'].":".$_POST['min_job'].":"."00";
        $job = $_POST['job'];
        $_SESSION['jobbroad'] = "มีการมอบหมายงาน $job";

    $sql_adddata = "INSERT INTO homework(hw_name,hw_date_s,hw_date_r)
                    VALUE ('$job','$s_time','$r_time')";
    
    if ($conn->query($sql_adddata) == TRUE) {
        header("Location: broadcastjob.php");
        die();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    $conn->close(); 
	

?>