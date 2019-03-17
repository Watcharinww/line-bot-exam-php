<?php
require 'conn.php';

$accessToken = $access_token; //copy ข้อความ Channel access token ตอนที่ตั้งค่า

$content = file_get_contents('php://input');
$arrayJson = json_decode($content, true);

   $arrayHeader = array();
   $arrayHeader[] = "Content-Type: application/json";
   $arrayHeader[] = "Authorization: Bearer {$accessToken}";

// $arrayHeader = array(
//     'Content-Type : application/json',
//     'Authorization : Bearer ' . $accessToken
// );

//รับข้อความจากผู้ใช้
$message = $arrayJson['events'][0]['message']['text'];

//รับ id ของผู้ใช้
   $id = $arrayJson['events'][0]['source']['userId'];

#ตัวอย่าง Message Type "Text + Sticker"
if ($message == "สวัสดี") {
    $message_sent['to'] = $id;
    $message_sent['messages'][0]['type'] = "text";
    $message_sent['messages'][0]['text'] = "สวัสดีจ้าาา";
    $message_sent['messages'][1]['type'] = "sticker";
    $message_sent['messages'][1]['packageId'] = "2";
    $message_sent['messages'][1]['stickerId'] = "34";
    // pushMsg($arrayHeader, $arrayPostData);
} else {
    $message_sent = [
        'to' => $id,
        'messages' => [
            'type' => 'text',
            'text' => 'สวัสดีไงหละะะะ อีกแบบอะ'
        ]
    ];
    // pushMsg($arrayHeader, $message);
}

$url = 'https://api.line.me/v2/bot/message/push';

$post = json_encode($message_sent);
$ch = curl_init($url);
      curl_setopt($ch, CURLOPT_HEADER, false);
      curl_setopt($ch, CURLOPT_POST, true);
      curl_setopt($ch, CURLOPT_HTTPHEADER, $arrayHeader);
      curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER,true);
      curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
      $result = curl_exec($ch);
      curl_close ($ch);


// function pushMsg($arrayHeader, $arrayPostData)
// {
//     $strUrl = "https://api.line.me/v2/bot/message/push";

//     $ch = curl_init();
//     curl_setopt($ch, CURLOPT_URL, $strUrl);
//     curl_setopt($ch, CURLOPT_HEADER, false);
//     curl_setopt($ch, CURLOPT_POST, true);
//     curl_setopt($ch, CURLOPT_HTTPHEADER, $arrayHeader);
//     curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($arrayPostData));
//     curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
//     curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
//     $result = curl_exec($ch);
//     curl_close($ch);

//     echo $result . "\r\n";
// }

// exit;
?> 