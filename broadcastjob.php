<?php
session_start();

require "vendor/autoload.php";


include 'conn.php';

$sql = "SELECT std_l_id 
        FROM student";
$result = $conn->query($sql);

date_default_timezone_set("Asia/Bangkok");
$broad = "Broadcast At : " . date("H:i:sa - d/m/Y");


$httpClient = new \LINE\LINEBot\HTTPClient\CurlHTTPClient($access_token);
$bot = new \LINE\LINEBot($httpClient, ['channelSecret' => $channelSecret]);
while ($row = mysqli_fetch_array($result)) {
    $textMessageBuilder = new \LINE\LINEBot\MessageBuilder\TextMessageBuilder($_SESSION['jobbroad']);
    $response = $bot->pushMessage($row["std_l_id"], $textMessageBuilder);
    if ($_SESSION['jobbroad'] != null) {
        $textMessageBuilder2 = new \LINE\LINEBot\MessageBuilder\TextMessageBuilder($broad);
        $response = $bot->pushMessage($row["std_l_id"], $textMessageBuilder2);
    }
}

$status = $response->getHTTPStatus();

if(($status) == 200){
    echo "<script> window.alert('Broadcast สำเร็จ'); window.location.href = 'index.php';</script>"; 
}else{
    echo "<script> window.alert('มีปัญหาในการ broadcast'); window.location.href = 'index.php';</script>"; 
}

$conn->close();

unset($_SESSION['jobbroad']);
// header("Location: index.php");
die();