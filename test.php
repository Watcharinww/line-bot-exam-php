<?php

include 'conn.php';
require_once('LINEBOT.php');

$channelAccessToken = '$access_token';
$channelSecret = '$channelSecret';

$client = new LINEBotTiny($channelAccessToken, $channelSecret);
foreach ($client->parseEvents() as $event) {
    switch ($event['type']) {
        case 'message':
            $message = $event['message'];
            switch ($message['type']) {
                case 'text':
                    $client->replyMessage(array(
                        'replyToken' => $event['replyToken'],
                        'messages' => array(
                            array(
                                'type' => 'text',
                                'text' => $message['text']
                            )
                        )
                    ));
                    break;
                case 'text' == "test":
                    $client->replyMessage(array(
                        'replyToken' => $event['replyMessage'],
                        'messages' => array(
                            array(
                                'type' => 'text',
                                'text' => 'hello'
                            )
                        )
                    ));
                default:
                    error_log("Unsupporeted message type: " . $message['type']);
                    break;
            }
            break;
        default:
            error_log("Unsupporeted event type: " . $event['type']);
            break;
    }
};
echo $client;
