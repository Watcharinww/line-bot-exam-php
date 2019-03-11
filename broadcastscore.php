<html>
<head>
    <script src='Time.js'></script>
</head>
<body>

    <?

$score = intval(['s']);
$name = strval(['n']);
$id = intval(['id']);
        
        require 'vendor/autoload.php';

        include 'conn.php';

        $sql = "SELECT *
                from anr
                join student
                on anr.std_id = student.std_id
                where std_id = $id";

        $result = $conn->query($sql);

      

        $editscore = "คะแนนการบ้าน $name ของคุณคือ $score";
            date_default_timezone_set('Asia/Bangkok');
            $broad = "Edit Score At : ".date("H:i:sa - d/m/Y");


            $httpClient = new \LINE\LINEBot\HTTPClient\CurlHTTPClient($access_token);
            $bot = new \LINE\LINEBot($httpClient, ['channelSecret' => $channelSecret]);
            
                while($row = $result->fetch_assoc()){
                $textMessageBuilder = new \LINE\LINEBot\MessageBuilder\TextMessageBuilder($editscore);
                $response = $bot->pushMessage($row["student.std_l_id"], $textMessageBuilder);
                
                $textMessageBuilder2 = new \LINE\LINEBot\MessageBuilder\TextMessageBuilder($broad);
                $response = $bot->pushMessage($row["student.std_l_id"], $textMessageBuilder2);
                }
            
            echo '<script> window.close(); </script>';
            //header('refresh:0; url=HomePage_Receive.php');
    ?>
</body>
</html>