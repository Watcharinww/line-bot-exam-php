<?php  // callback.php

require "vendor/autoload.php";
require 'conn.php';

require_once('vendor/linecorp/line-bot-sdk/line-bot-sdk-tiny/LINEBotTiny.php');

// $access_token = 'UoNWCzm+34uMMB2itvPBwm7K9N7CK8GbWMc5RFmI9KQqGtAM1YO24VRTp5xTbzYk4jN9n0zEqc86nVJQTyIVJOimoI9CPzcuaCUyysOLMvBtooxc7BK6pfNYdRZ6mzobVVvb7/DlYxK/LdHddOHrrwdB04t89/1O/w1cDnyilFU=';


// Get POST body content
$content = file_get_contents('php://input');

// Parse JSON
$events = json_decode($content, true);

// Validate parsed JSON data
if (!is_null($events['events'])) {

	// Loop through each event

	foreach ($events['events'] as $event) {

		// Reply only when message sent is in 'text' format

		if ($event['type'] == 'message' && $event['message']['type'] == 'text') {
			$userid = $event['source']['userId'];

			if ($event['message']['text'] == "ทดลอง") {
				$messages = [
					'type' => 'text',
					'text' => 'ก็จะทดลองทำไมอะ'
				];
			} else if ($event['message']['text'] == "register") {
				$messages = [
					
						'type' => 'flex',
						'altText' => 'Register',
						'contents' => [
							'type' => 'bubble',
							'styles' => [
								'footer' => [
									'separator' => true
								]
							],
							'body' => [
								'type' => 'box',
								'layout' => 'vertical',
								'contents' => [
									[
										'type' => 'text',
										'text' => 'REGISTER',
										'weight' => 'bold',
										'color' => '#1DB446',
										'align' => 'center',
										'size' => 'xxl'
									],
									[
										'type' => 'separator',
										'margin' => 'xl'
									],
									[
										'type' => 'box',
										'layout' => 'vertical',
										'contents' => [
											[
												'type' => 'text',
												'text' => '**คำเตือน สำคัญมาก**',
												'size' => 'xl',
												'margin' => 'xxl',
												'align' => 'center'
											],											
											[
												'type' => 'separator',
												'margin' => 'xl'
											],
											[
												'type' => 'button',
												'action' => [
													'type' => 'uri',
													'label' => 'Register',
													'uri' => 'http://chatcedkmutnb1.herokuapp.com/register.php?id='.$event['source']['userId']
												]
											]

										]
									]
								]
							]
						]
					
				];
			} else {

				// Get text sent

				// $text = $event['source']['userId'];

				$messages = [

					'type' => 'text',
					'text' => 'user = '.$event['message']['text']
				];
			}
			// Get replyToken

			$replyToken = $event['replyToken'];

			// Make a POST Request to Messaging API to reply to sender

			$url = 'https://api.line.me/v2/bot/message/reply';

			$data = [

				'replyToken' => $replyToken,

				'messages' => [$messages],

			];
		}


		$post = json_encode($data);

		$headers = array('Content-Type: application/json', 'Authorization: Bearer ' . $access_token);

		$ch = curl_init($url);

		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");

		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

		curl_setopt($ch, CURLOPT_POSTFIELDS, $post);

		curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);

		$result = curl_exec($ch);

		curl_close($ch);

		echo $result . "\r\n";
	}
}

echo "OK";
