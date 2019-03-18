<?php

require "vendor/autoload.php";

include 'conn.php';

// Create connection to sql database 

$sql = "SELECT std_l_id 
        FROM student";
$result = mysqli_query($conn, $sql);

date_default_timezone_set("Asia/Bangkok");
$broad = "Broadcast At : " . date("H:i:sa - d/m/Y");


$httpClient = new \LINE\LINEBot\HTTPClient\CurlHTTPClient($access_token);
$bot = new \LINE\LINEBot($httpClient, ['channelSecret' => $channelSecret]);
while ($row = mysqli_fetch_array($result)) {
    $textMessageBuilder = new \LINE\LINEBot\MessageBuilder\TextMessageBuilder($_POST["Anou"]);
    $response = $bot->pushMessage($row["std_l_id"], $textMessageBuilder);
    if ($_POST["Anou"] != null) {
        $textMessageBuilder = new \LINE\LINEBot\MessageBuilder\TextMessageBuilder($broad);
        $response = $bot->pushMessage($row["std_l_id"], $textMessageBuilder);
    }
}
$status = $response->getHTTPStatus();

if(($status) == 200){
    echo "<script> window.alert('broadcast สำเร็จ'); window.location.href = 'index.php';</script>"; 
}else{
    echo "<script> window.alert('มีปัญหาในการ broadcast'); window.location.href = 'index.php';</script>"; 
}

$conn->close();

// header("Location: index.php");
die();