<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Broadcast</title>
        <script type="text/javascript" src="Time.js"></script>
    </head>
    <body>
<?php

require "vendor/autoload.php";

$access_token = 'UoNWCzm+34uMMB2itvPBwm7K9N7CK8GbWMc5RFmI9KQqGtAM1YO24VRTp5xTbzYk4jN9n0zEqc86nVJQTyIVJOimoI9CPzcuaCUyysOLMvBtooxc7BK6pfNYdRZ6mzobVVvb7/DlYxK/LdHddOHrrwdB04t89/1O/w1cDnyilFU=';

$channelSecret = '88f693bafb5809e65f319ad3139213ba';

$pushID = 'U1b80d09ffe5c7f746850ca99a023d30b';


$servername = "us-cdbr-iron-east-01.cleardb.net";
$username = "bc2e88a0fd2a0e";
$password = "6ca79774";
$dbname = "heroku_5eae676745c3fe6";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

$sql = "SELECT * FROM heroku_5eae676745c3fe6.test1";
$result = $conn->query($sql);

    date_default_timezone_set("Asia/Bangkok");
    $broad = "Sent At : ".date("h:i:sa - d/m/Y");

/*if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
*/
$httpClient = new \LINE\LINEBot\HTTPClient\CurlHTTPClient($access_token);
$bot = new \LINE\LINEBot($httpClient, ['channelSecret' => $channelSecret]);

    $textMessageBuilder = new \LINE\LINEBot\MessageBuilder\TextMessageBuilder(/*'Testing Broadcast' */$_POST["Anou"]);
    $response = $bot->pushMessage(/*$row["LineId"]*/$pushID, $textMessageBuilder);

    $textMessageBuilder = new \LINE\LINEBot\MessageBuilder\TextMessageBuilder(/*'Testing Broadcast' $_POST["Anou"]*/ $broad);
    $response = $bot->pushMessage(/*$row["LineId"]*/$pushID, $textMessageBuilder);

//echo $response->getHTTPStatus() . ' ' . $response->getRawBody();
//}
//}

function getReturn(){
    if(($response->getHTTPStatus())=='200'){
       return "Message sent succesful";
    }
    else{
        return "ERROR Message can't sent";
    }
}

$conn->close();



//header('LOCATION: HomePage_Sent.html');
    
?>
 </body>
</html>
