<?php

require "vendor/autoload.php";

$access_token = 'UoNWCzm+34uMMB2itvPBwm7K9N7CK8GbWMc5RFmI9KQqGtAM1YO24VRTp5xTbzYk4jN9n0zEqc86nVJQTyIVJOimoI9CPzcuaCUyysOLMvBtooxc7BK6pfNYdRZ6mzobVVvb7/DlYxK/LdHddOHrrwdB04t89/1O/w1cDnyilFU=';

$channelSecret = '88f693bafb5809e65f319ad3139213ba';

$userID = 'U1b80d09ffe5c7f746850ca99a023d30b';

$servername = "us-cdbr-iron-east-01.cleardb.net";
$username = "bc2e88a0fd2a0e";
$password = "6ca79774";
$dbname = "heroku_5eae676745c3fe6";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

$sql = "SELECT * FROM heroku_5eae676745c3fe6.test1";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {


$httpClient = new \LINE\LINEBot\HTTPClient\CurlHTTPClient($access_token);
$bot = new \LINE\LINEBot($httpClient, ['channelSecret' => $channelSecret]);
$response = $bot->getProfile($row["LineId"]);
if ($response->isSucceeded()) {
    $profile = $response->getJSONDecodedBody();
    echo 'UserID  : '.$profile['userId'].'<br>';
    echo 'Name    : '.$profile['displayName'].'<br>';
    echo 'Picture : '.$profile['pictureUrl'].'<br>';
    echo 'Status  : '.$profile['statusMessage'].'<br>';
}

}
}
$conn->close();

exit; 
?>