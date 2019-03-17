<?
require "vendor/autoload.php";
include 'conn.php';

function push($userId){
    $httpClient = new \LINE\LINEBot\HTTPClient\CurlHTTPClient($access_token);
    $bot = new \LINE\LINEBot($httpClient, ['channelSecret' => $channelSecret]);
    
    $textMessageBuilder = new \LINE\LINEBot\MessageBuilder\TextMessageBuilder("testHello");
    $response = $bot->pushMessage($userId, $textMessageBuilder);

    exit();
}