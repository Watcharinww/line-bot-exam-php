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

        include 'conn.php';

            // $d = mktime(0,0,0,2,24,2019);
            // $da=strtotime("tomorrow");
            // $db=strtotime('+2 days');
            $ds = date('Y-m-d',strtotime('tomorrow'));
            $de = date('Y-m-d',strtotime('+2 days'));

                $sql_std = "SELECT *
                            FROM student
                            ";
            $result_std = mysqli_query($conn,$sql_std);
            $httpClient = new \LINE\LINEBot\HTTPClient\CurlHTTPClient($access_token);
            $bot = new \LINE\LINEBot($httpClient, ['channelSecret' => $channelSecret]);

            while($row_std = mysqli_fetch_array($result_std)){
                // $std_id = $row_std['std_id'];
                $std_id = 'U1b80d09ffe5c7f746850ca99a023d30b';

                // echo $row_std['std_name']."|".$row_std['std_l_id']."<br>";
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
                 $result_hw = mysqli_query($conn,$sql_hw);
                 $textMessageBuilder = new \LINE\LINEBot\MessageBuilder\TextMessageBuilder("การบ้านที่ต้องส่งพรุ่งนี้คือ | ");
                 $response = $bot->pushMessage($std_id, $textMessageBuilder);
                //  echo "การบ้านที่ต้องส่งพรุ่งนี้คือ | ";
                $count = 0;
            while($row = mysqli_fetch_array($result_hw)){
                //echo $row['hw_name'].":".$row['std_name'].":".$row['std_score']."<br>";
                // echo "$row[hw_name] | ";
                $textMessageBuilder+$count = new \LINE\LINEBot\MessageBuilder\TextMessageBuilder("$row[hw_name] |");
                $response = $bot->pushMessage($std_id, $textMessageBuilder+$count);
                $count++;
            }

            $message = "อย่าลืมทำส่งด้วยครับ ***หากไม่มีบอก แสดงว่าไม่มีการบ้านที่ลืมส่ง***";
            $textMessageBuilder+$count = new \LINE\LINEBot\MessageBuilder\TextMessageBuilder($message);
            $response = $bot->pushMessage($row["std_l_id"], $textMessageBuilder2);
            // echo "<br>อย่าลืมทำส่งด้วยครับ <br>";
            // echo "**หากไม่มีบอก แสดงว่าไม่มีการบ้านที่ลืมส่ง**";
            // echo "<br>";
            // echo "<hr>";
            
        }


            $conn->close();
        ?>


</body>
</html>