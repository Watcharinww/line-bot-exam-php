<script type="text/javascript" src="Time.js"></script>
<?php
date_default_timezone_set('Asia/Bangkok');



include 'conn.php';
session_start();


// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$s_time = date("Y-m-d G:i:s", time());
$r_time =  $_POST['d_job'] . " " . $_POST['hr_job'] . ":" . $_POST['min_job'] . ":" . "00";
$job = $_POST['job'];
$_SESSION['jobbroad'] = "มีการมอบหมายงาน $job";

$sql_adddata = "INSERT INTO homework(hw_name,hw_date_s,hw_date_r)
                    VALUE ('$job','$s_time','$r_time')";

if ($conn->query($sql_adddata) == true) {
    header("Location: addanr.php");
    die();
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();


?> 