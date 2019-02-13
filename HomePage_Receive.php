<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>LMS-Line</title>
<style type="text/css">
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
	text-align: center;
}
</style>

<script type="text/javascript" src="Time.js"></script>



</head>
<body>
<?php

require "vendor/autoload.php";

$access_token = 'UoNWCzm+34uMMB2itvPBwm7K9N7CK8GbWMc5RFmI9KQqGtAM1YO24VRTp5xTbzYk4jN9n0zEqc86nVJQTyIVJOimoI9CPzcuaCUyysOLMvBtooxc7BK6pfNYdRZ6mzobVVvb7/DlYxK/LdHddOHrrwdB04t89/1O/w1cDnyilFU=';

$channelSecret = '88f693bafb5809e65f319ad3139213ba';

//$userID = 'U1b80d09ffe5c7f746850ca99a023d30b';

$servername = "us-cdbr-iron-east-01.cleardb.net";
$username = "bc2e88a0fd2a0e";
$password = "6ca79774";
$dbname = "heroku_5eae676745c3fe6";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

$sql = "SELECT *
        FROM /* heroku_5eae676745c3fe6. */homework
        join /* heroku_5eae676745c3fe6. */anr
        on /* heroku_5eae676745c3fe6. */anr.hw_id = /* heroku_5eae676745c3fe6. */homework.hw_id
        join /* heroku_5eae676745c3fe6. */student
        on /* heroku_5eae676745c3fe6. */student.std_id = /* heroku_5eae676745c3fe6. */anr.std_id
        order by /* heroku_5eae676745c3fe6. */anr.ar_id";
$result = $conn->query($sql);

$nw = 0;

while($row = $result->fetch_assoc()){
  $hw_id[$nw] = $row["hw_id"];
  $hw_n[$nw] = $row["hw_name"];
  $std_n[$nw] = $row["std_name"];
  $hw_date_r[$nw] = $row["hw_date_r"];
  $hw_score[$nw] = $row["hw_score"];
  $nw++;
}

$conn->close();
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
    <td width="50%" rowspan="2" valign="top"><table width="100%" height="100%" border="0">
      <tr>
        <td class="menu"><table width="100%" border="0" class="menu">
            <tr>
              <td>
              <?php
                echo $hw_id[0].". ".$hw_n[0]; 
              ?>
              </td>
            </tr>
            <tr>
              <td><hr /></td>
            </tr>
          </table></td>
      </tr>
      <tr valign="top" >
        <td><table width="100%" border="0" align="center" class="UnderDetail">
          <tr class="Detail">
            <td>ชื่อ-นามสกุล</td>
            <td>เวลาที่ส่ง</td>
            <td>คะแนนที่ได้</td>
            <td>ตรวจแล้ว</td>
          </tr>
          <tr>
            <td colspan="5"><hr></td>
            </tr>
          <?php
          for($i=0;$i<$nw;$i++){
            if($hw_id[$i] == 1)
              echo 
                "<tr>
                  <td class='name'>$std_n[$i]</td>
                  <td>$hw_date_r[$i]</td>
                  <td>$hw_score[$i] / 10</td>
                  <td>";
                  if($hw_score[$i] == NULL){
                    echo "ยังไม่ตรวจ";
                  }else if($hw_score[$i] != NULL){
                    echo "ตรวจแล้ว";
                  }
                    "
                  </td>
                </tr>";
              }
          ?>
          <!-- <tr>
            <td class ="name">2.วัชรินทร์ เวียงวิเศษ</span></td>
            <td>23.55</span></td>
            <td>-</td>
            <td>ยังไม่ตรวจ</td>
          </tr>           -->
        </table></td>
      </tr>      
    </table></td>
    <td width="25%" rowspan="2" valign="top" class="Header"><table width="100%" border="0">
        <tr>
          <td class="Header" valign="top">งานที่มอบหมาย<hr /></td>
        </tr>
        <tr>
          <td height="100%" align="center">
          <?php
              for($i=0;$i<$result->num_rows;$i++){
                if($hw_n[$i] != $hw_n[$i-1])
                echo $hw_id[$i]. " " .$hw_n[$i];
              }
            ?>
          </td>
        </tr>
    </table></td>
  </tr>
  <tr>
    <td align="center"><p><a href="HomePage_Receive.php"><img src="picture/Receive.png" width="50%" height="50%" title="ReceivePage" /></a></p>
    <p class="menu">Receive</p></td>
  </tr>
</table>
</body>
</html>