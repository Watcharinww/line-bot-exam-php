<?php  // callback.php

require "vendor/autoload.php";

require_once('vendor/linecorp/line-bot-sdk/line-bot-sdk-tiny/LINEBotTiny.php');

include 'conn.php';

$content = file_get_contents('php://input');
$arrayJson = json_decode($content, true);

$arrayHeader = array();
$arrayHeader[] = "Content-Type: application/json";
$arrayHeader[] = "Authorization: Bearer {$access_token}";

//รับข้อความจากผู้ใช้
$message = $arrayJson['events'][0]['message']['text'];

function replyMsg($arrayHeader, $arrayPostData)
{
  $strUrl = "https://api.line.me/v2/bot/message/reply";
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, $strUrl);
  curl_setopt($ch, CURLOPT_HEADER, false);
  curl_setopt($ch, CURLOPT_POST, true);
  curl_setopt($ch, CURLOPT_HTTPHEADER, $arrayHeader);
  curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($arrayPostData));
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
  $result = curl_exec($ch);
  curl_close($ch);
}

if ($message == "test") {
  $arrayPostData['replyToken'] = $arrayJson['events'][0]['replyToken'];
  $arrayPostData['messages'][0]['type'] = "bubble";
  $arrayPostData['header'][0]['type'] = "box";
  $arrayPostData['header'][0]['layout'] = "vertical";
  $arrayPostData['contents'][0]['type'] = "text";
  $arrayPostData['contents'][0]['text'] = "TEST";
  $arrayPostData['contents'][0]['size'] = "xxl";
  replyMsg($arrayHeader, $arrayPostData);
}
else {
	$arrayPostData['replyToken'] = $arrayJson['events'][0]['replyToken'];
	$arrayPostData['messages'][0]['type'] = "text";
	$arrayPostData['messages'][0]['text'] = $message;
	replyMsg($arrayHeader, $arrayPostData);
}



exit;
