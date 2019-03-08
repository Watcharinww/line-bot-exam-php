<html>
<head></head>
<body>
<script type="text/javascrip" src="Time.js"></script>
<?php

date_default_timezone_set('Asia/Bangkok');

include 'conn.php';

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql_hw = "SELECT hw_id 
            FROM homework 
            order by hw_id DESC";
$hw_id = $conn->query($sql_hw);

$sql_std = "SELECT std_id 
            FROM student";
$std_id = $conn->query($sql_std);

$_SESSION['jobbroad'] = $_SESSION['jobbroad'];



while($row_hw = $hw_id->fetch_assoc()){
    while($row_std = $std_id->fetch_assoc()){
        $sqlanr = "INSERT INTO anr(hw_id,t_id,std_id)
                    VALUE ($row_hw[hw_id],1,$row_std[std_id])";
                    if ($conn->query($sqlanr) == TRUE) {
                        header("Location: broadcastjob.php");
                    } else {
                        echo "Error: " . $sql . "<br>" . $conn->error;
                        die();
                    }
    }
}


die();  



$conn->close();