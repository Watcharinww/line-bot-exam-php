<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Broadcast</title>
        <script type="text/javascript" src="Time.js"></script>
    </head>
    <body>
<?php
session_start();

require "vendor/autoload.php";
/* 
$access_token = 'UoNWCzm+34uMMB2itvPBwm7K9N7CK8GbWMc5RFmI9KQqGtAM1YO24VRTp5xTbzYk4jN9n0zEqc86nVJQTyIVJOimoI9CPzcuaCUyysOLMvBtooxc7BK6pfNYdRZ6mzobVVvb7/DlYxK/LdHddOHrrwdB04t89/1O/w1cDnyilFU=';

$channelSecret = '88f693bafb5809e65f319ad3139213ba';

$pushID = 'U1b80d09ffe5c7f746850ca99a023d30b';


$servername = "us-cdbr-iron-east-01.cleardb.net";
$username = "bc2e88a0fd2a0e";
$password = "6ca79774";
$dbname = "heroku_5eae676745c3fe6";

// Create connection to sql database 
$conn = new mysqli($servername, $username, $password, $dbname); */

include 'conn.php';

$sql = "SELECT std_l_id FROM student";
$result = $conn->query($sql);

    date_default_timezone_set("Asia/Bangkok");
    $broad = "Broadcast At : ".date("H:i:sa - d/m/Y");

/*if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {*/

$httpClient = new \LINE\LINEBot\HTTPClient\CurlHTTPClient($access_token);
$bot = new \LINE\LINEBot($httpClient, ['channelSecret' => $channelSecret]);

    $textMessageBuilder = new \LINE\LINEBot\MessageBuilder\TextMessageBuilder($_SESSION['jobbroad']);
    $response = $bot->pushMessage($row["std_l_id"], $textMessageBuilder);
    if ($_SESSION['jobbroad'] != NULL){
        $textMessageBuilder2 = new \LINE\LINEBot\MessageBuilder\TextMessageBuilder($broad);
        $response = $bot->pushMessage($row["std_l_id"], $textMessageBuilder2);
        }

//}
//}
$conn->close();

session_destroy();
header("Location: HomePage_Sent.php");
die();


?>
 </body>
</html>