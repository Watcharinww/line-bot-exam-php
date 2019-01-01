<?php

require "vendor/autoload.php";

$access_token = 'UoNWCzm+34uMMB2itvPBwm7K9N7CK8GbWMc5RFmI9KQqGtAM1YO24VRTp5xTbzYk4jN9n0zEqc86nVJQTyIVJOimoI9CPzcuaCUyysOLMvBtooxc7BK6pfNYdRZ6mzobVVvb7/DlYxK/LdHddOHrrwdB04t89/1O/w1cDnyilFU=';

$channelSecret = '88f693bafb5809e65f319ad3139213ba';

$userID = 'U1b80d09ffe5c7f746850ca99a023d30b';


$httpClient = new \LINE\LINEBot\HTTPClient\CurlHTTPClient($access_token);
$bot = new \LINE\LINEBot($httpClient, ['channelSecret' => $channelSecret ]);
$response = $bot->getProfile($userID);
if ($response->isSucceeded()) {
    $profile = $response->getJSONDecodedBody();
    echo 'Username : '.$profile['displayName'];
    echo "/r/n";
    echo $profile['pictureUrl'];
    echo $profile['statusMessage'];
}

exit; 
?>