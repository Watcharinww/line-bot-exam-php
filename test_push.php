<?
require 'vendor/autoload.php';
require 'conn.php';



$pushId = 'U1b80d09ffe5c7f746850ca99a023d30b';



$httpClient = new \LINE\LINEBot\HTTPClient\CurlHTTPClient($access_token);
$bot = new \LINE\LINEBot($httpClient, ['channelSecret' => $channelSecret]);

$text = [
    'type' => 'text',
    'text' => 'จะทดลองทำไมอะ'
];




$RawMessageBuilder = new \LINE\LINEBot\MessageBuilder\RawMessageBuilder($text);
$response = $bot->pushMessage($pushId, $RawMessageBuilder);

echo $response->getHTTPStatus();

$conn->close();