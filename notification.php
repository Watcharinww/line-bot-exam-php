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
        // $pushID = 'U1b80d09ffe5c7f746850ca99a023d30b';

            $d = mktime(0,0,0,2,24,2019);
            $da=strtotime("tomorrow");
            $db=strtotime('+2 days');
            $ds = date('Y-m-d',strtotime('tomorrow'));
            $de = date('Y-m-d',strtotime('+2 days'));

            $httpClient = new \LINE\LINEBot\HTTPClient\CurlHTTPClient($access_token);
            $bot = new \LINE\LINEBot($httpClient, ['channelSecret' => $channelSecret]);


            // $txt_c = "คุณมงานค้า";
            $txt_b = "!คุณมีการบ้านที่ต้องส่งพรุ่งนี้คือ!";
            $txt_d = "**หากไม่มีบอก แสดงว่าไม่มีการบ้านที่ลืมส่ง**";
            $txt_a = "อย่าลืมส่งด้วยนะครับ";

            

                $sql_std = "SELECT *
                            FROM student
                            ";
            $result_std = mysqli_query($conn,$sql_std);
           

            while($row_std = mysqli_fetch_array($result_std)){
                $std_id = $row_std['std_id'];

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
                $textMessageBuilder = new \LINE\LINEBot\MessageBuilder\TextMessageBuilder($txt_b);
                $response = $bot->pushMessage($row_std['std_l_id'], $textMessageBuilder);
                $result_hw = mysqli_query($conn,$sql_hw);
                $textMessageBuilder = new \LINE\LINEBot\MessageBuilder\TextMessageBuilder($txt_d);
                $response = $bot->pushMessage($row_std['std_l_id'], $textMessageBuilder);
                $textMessageBuilder = new \LINE\LINEBot\MessageBuilder\TextMessageBuilder($txt_a);
                $response = $bot->pushMessage($pushID, $textMessageBuilder);
               

                 while($row = mysqli_fetch_array($result_hw)){
                $txt_c = "$row[hw_name] ";
                $textMessageBuilder = new \LINE\LINEBot\MessageBuilder\TextMessageBuilder($txt_c);
                $response = $bot->pushMessage($row_std['std_l_id'], $textMessageBuilder);
                //echo $row['hw_name'].":".$row['std_name'].":".$row['std_score']."<br>";
                
        //         echo "การบ้านค้างที่มี : $row[hw_name]  เวลาที่ต้องส่ง : $row[hw_date_r] <br>";
            }
        //     echo "<hr>";
        }
        
        
                
                

        echo $response->getHTTPStatus() . ' ' . $response->getRawBody();

            $conn->close();
        ?>


<!-- </body>
</html> -->