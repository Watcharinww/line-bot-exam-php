<!DOCTYPE html>
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



    <?
    date_default_timezone_set('Asia/Bangkok');
    require "vendor/autoload.php";
    include 'conn.php';

    $da = strtotime("tomorrow");
    $db = strtotime('+2 days');
    $ds = date('Y-m-d', strtotime('tomorrow'));
    $de = date('Y-m-d', strtotime('+2 days'));

    $httpClient = new \LINE\LINEBot\HTTPClient\CurlHTTPClient($access_token);
    $bot = new \LINE\LINEBot($httpClient, ['channelSecret' => $channelSecret]);



    $txt_b = "!คุณมีการบ้านที่ต้องส่งพรุ่งนี้คือ!";
    $txt_d = "**หากไม่มีบอก แสดงว่าไม่มีการบ้านที่ลืมส่ง**";
    $txt_a = "อย่าลืมส่งด้วยนะครับ";



    $sql_std = "SELECT *
                            FROM student
                            ";
    $result_std = mysqli_query($conn, $sql_std);


    while ($row_std = mysqli_fetch_array($result_std)) {
        $std_id = $row_std['std_id'];

        $sql_hw = "SELECT  *
                            FROM
                                anr
                            JOIN
                                homework
                            ON
                                anr.hw_id = homework.hw_id
                            WHERE
                                anr.std_score is null 
                                AND 
                                anr.std_id = $std_id
                                and
                                homework.hw_date_r >= '$ds'
                                and
                                homework.hw_date_r <= '$de'
                            order by anr.hw_id ASC;
                            ";
        $textMessageBuilder = new \LINE\LINEBot\MessageBuilder\TextMessageBuilder($txt_b);
        $response = $bot->pushMessage($row_std['std_l_id'], $textMessageBuilder);
        $textMessageBuilder = new \LINE\LINEBot\MessageBuilder\TextMessageBuilder($txt_d);
        $response = $bot->pushMessage($row_std['std_l_id'], $textMessageBuilder);
        $textMessageBuilder = new \LINE\LINEBot\MessageBuilder\TextMessageBuilder($txt_a);
        $response = $bot->pushMessage($row_std['std_l_id'], $textMessageBuilder);

        $result_hw = mysqli_query($conn, $sql_hw);


        while ($row = mysqli_fetch_array($result_hw)) {
            $txt_c = "$row[hw_name] ";
            $textMessageBuilder = new \LINE\LINEBot\MessageBuilder\TextMessageBuilder($txt_c);
            $response = $bot->pushMessage($row_std['std_l_id'], $textMessageBuilder);
        }
    }





    echo $response->getHTTPStatus() . ' ' . $response->getRawBody();

    $conn->close();
    ?> 