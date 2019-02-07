<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <title></title>
    <style type="text/css">
input[type=text]{
  width: 75%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 20px;
  box-sizing: border-box;
}

input[type=submit] {
  width: 50%;
  background-color: #3F3;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  border-radius: 20px;
  cursor: pointer;
}

input[type=text]:focus{
	border: 1px solid #555;
}

input[type=submit]:hover {
  background-color: #393;
}

.Header {
	font-size: larger;
	text-align: center;
	font-family: "Lucida Console", Monaco, monospace;
	color: #000000;
}
.menu {
	font-family: "Courier New", Courier, monospace;
	font-weight: bold;
	font-size: x-large;
	text-align: center;
}
.Detail {
	text-align: center;
	font-size: medium;
}
.UnderDetail {
	font-size: small;
	text-align: center;
}
.name {
	text-align: left;
}
</style>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Broadcast</title>
        <script type="text/javascript" src="Time.js"></script>
    </head>
    <body>
<?php

require "vendor/autoload.php";

$access_token = 'UoNWCzm+34uMMB2itvPBwm7K9N7CK8GbWMc5RFmI9KQqGtAM1YO24VRTp5xTbzYk4jN9n0zEqc86nVJQTyIVJOimoI9CPzcuaCUyysOLMvBtooxc7BK6pfNYdRZ6mzobVVvb7/DlYxK/LdHddOHrrwdB04t89/1O/w1cDnyilFU=';

$channelSecret = '88f693bafb5809e65f319ad3139213ba';

$pushID = 'U1b80d09ffe5c7f746850ca99a023d30b';


$servername = "us-cdbr-iron-east-01.cleardb.net";
$username = "bc2e88a0fd2a0e";
$password = "6ca79774";
$dbname = "heroku_5eae676745c3fe6";

// Create connection to sql database 
$conn = new mysqli($servername, $username, $password, $dbname);

$sql = "SELECT * FROM heroku_5eae676745c3fe6.test1";
$result = $conn->query($sql);

    date_default_timezone_set("Asia/Bangkok");
    $broad = "Broadcast At : ".date("H:i:sa - d/m/Y");

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {

$httpClient = new \LINE\LINEBot\HTTPClient\CurlHTTPClient($access_token);
$bot = new \LINE\LINEBot($httpClient, ['channelSecret' => $channelSecret]);

    $textMessageBuilder = new \LINE\LINEBot\MessageBuilder\TextMessageBuilder($_POST["Anou"]);
    $response = $bot->pushMessage($row["LineId"], $textMessageBuilder);
    if ($_POST["Anou"] != NULL){
        $textMessageBuilder2 = new \LINE\LINEBot\MessageBuilder\TextMessageBuilder($broad);
        $response = $bot->pushMessage($row["LineId"], $textMessageBuilder2);
        }

}
}
$conn->close();

if($response->getHTTPStatus() == 200){
    $status = "Message Successful Sent";
}else{
    $status = "Message Failed Sent";
}

?>


<table width="100%" height="100%" border="1">
  <tr valign="top" >
    <td height="100" colspan="3" class="Header" valign="middle"><table width="100%" height="100%" border="0">
        <tr>
          <td align="right"><span id="date_time"></span>
            <script type="text/javascript">window.onload = date_time('date_time');</script>
            </td>
        </tr>
        <tr>
          <td height="100" colspan="3" class="Header" valign="middle">Learning Management System on Line Application</td>
        </tr>
    </table></td>
  </tr>
  <tr>
    <td width="25%" align="center"><p><a href="HomePage_Sent.php"><img src="picture/Sent.png" width="50%" height="50%" title="SentPage" /></a></p>
    <p class="menu">Sent</p></td>
    <td width="75%" rowspan="2" align="center" valign="middle">

        <?php echo $status; ?>
        <form action="HomePage_Sent.php">
            <input type="submit" value="Get back to main page" />
        </form>

    </td>
  </tr>
  <tr>
    <td align="center"><p><a href="HomePage_Receive.php"><img src="picture/Receive.png" width="50%" height="50%" title="ReceivePage" /></a></p>
    <p class="menu">Receive</p></td>
  </tr>
</table>
 </body>
</html>