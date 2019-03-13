<<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css">
    <script src="main.js"></script>
</head>
<body>
    <?php
        require "vendor/autoload.php";
        include 'conn.php';

        $pushID = 'U1b80d09ffe5c7f746850ca99a023d30b';

        $httpClient = new \LINE\LINEBot\HTTPClient\CurlHTTPClient($access_token);
        $bot = new \LINE\LINEBot($httpClient, ['channelSecret' => $channelSecret]);

        $textMessageBuilder = new \LINE\LINEBot\MessageBuilder\TextMessageBuilder('check corn');
        $response = $bot->pushMessage($pushID, $textMessageBuilder);

echo $response->getHTTPStatus() . ' ' . $response->getRawBody();
    ?>
</body>
</html>