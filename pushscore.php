<script src='Time.js'></script>

<?
$id = intval($_GET['id']);
$std_id = intval($_GET['sid']);
$st = intval($_GET['st']);

require 'vendor/autoload.php';

include 'conn.php';

$sql = "  SELECT hw_name,std_score,std_l_id 
                FROM anr
                join student
                on anr.std_id = student.std_id  
                join homework
                on anr.hw_id = homework.hw_id     
                WHERE anr.hw_id = '" . $id . "' AND anr.std_id = '" . $std_id . "'
                ORDER by anr.hw_id , anr.std_id
                ";

$result = mysqli_query($conn, $sql);

while ($row = mysqli_fetch_array($result)) {
    $name = $row['hw_name'];
    $hw_score = $row['std_score'];
    $id_l = $row['std_l_id'];
}

if($st == 0)
$pushscore = "คะแนนการบ้าน $name ของคุณคือ $hw_score";
else if($st == 1)
$pushscore = "คะแนนการบ้าน $name ของคุณถูกแก้เป็น $hw_score";
else if($st == 2)
$pushscore = "คะแนนการบ้าน $name ของคุณถูกลบออกแล้ว";

date_default_timezone_set('Asia/Bangkok');
$broad = "Edit Score At : " . date("H:i:sa - d/m/Y");


$httpClient = new \LINE\LINEBot\HTTPClient\CurlHTTPClient($access_token);
$bot = new \LINE\LINEBot($httpClient, ['channelSecret' => $channelSecret]);


$textMessageBuilder = new \LINE\LINEBot\MessageBuilder\TextMessageBuilder("$pushscore");
$response = $bot->pushMessage($id_l, $textMessageBuilder);

$textMessageBuilder2 = new \LINE\LINEBot\MessageBuilder\TextMessageBuilder($broad);
$response = $bot->pushMessage($id_l, $textMessageBuilder2);

$conn->close();


echo '<script> window.close(); </script>';

?> 