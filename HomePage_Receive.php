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
.menu2 {
	font-family: "Courier New", Courier, monospace;
	font-weight: bold;
	font-size: x-large;
	text-align: center;
  vertical-align: top;
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

#datehw{
  font-size: medium;
  font-weight: lighter;
}

#click_score{
  color:black;
}

div{
  text-align: center;
}

a:visited {
  color:Blue;
}
</style>

<script type="text/javascript" src="Time.js"></script>



</head>
<body>
<?php

require "vendor/autoload.php";

/* $access_token = 'UoNWCzm+34uMMB2itvPBwm7K9N7CK8GbWMc5RFmI9KQqGtAM1YO24VRTp5xTbzYk4jN9n0zEqc86nVJQTyIVJOimoI9CPzcuaCUyysOLMvBtooxc7BK6pfNYdRZ6mzobVVvb7/DlYxK/LdHddOHrrwdB04t89/1O/w1cDnyilFU=';

$channelSecret = '88f693bafb5809e65f319ad3139213ba';

//$userID = 'U1b80d09ffe5c7f746850ca99a023d30b';

$servername = "us-cdbr-iron-east-01.cleardb.net";
$username = "bc2e88a0fd2a0e";
$password = "6ca79774";
$dbname = "heroku_5eae676745c3fe6";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname); */

include 'conn.php';

$sql = "SELECT *
        FROM homework
        join anr
        on anr.hw_id = homework.hw_id
        join student
        on student.std_id = anr.std_id
        order by anr.hw_id , anr.std_id";
$result = $conn->query($sql);

$nw = 0;

while($row = $result->fetch_assoc()){
  $hw_id[$nw] = $row["hw_id"];
  $hw_n[$nw] = $row["hw_name"];
  $std_n[$nw] = $row["std_name"];  
  $std_score[$nw] = $row["std_score"];  
  $hw_status[$nw] = $row['hw_status'];
  $nw++;
}

$sql = "SELECT *
        FROM homework";
$result_hw = $conn->query($sql);

$nw = 0;
while($row = $result_hw->fetch_assoc()){
  // $std_id[$nw] = $row["std_id"];
  $hw_id_hw[$nw] = $row["hw_id"];
  $hw_name_hw[$nw] = $row["hw_name"];
  $hw_date_s[$nw] = $row["hw_date_s"];
  $hw_date_r[$nw] = $row["hw_date_r"];
  $nw++;
}

$conn->close();

//$num = 1;
if(isset($_GET['delete'])){
  $id = intval($_GET['id']);
  // $name = $hw_name_hw[$id];
  // if(confrim('คุณต้องการลบการบ้าน $name ใช่หรือไม่'){}
  $name = strval($_GET['name']);

   deleteHw($id,$name);
  }
// }

function deleteHw($id,$name){
  require 'deleteHw.php';
  // echo "<script> alert('$id'); </script>";
  
  test($id,$name);
  // return 0;
  // header('locฝation: HomePage_Receive.php');
}

?>

<script>
function showUser(str,num) {
    if (str == "") {
        document.getElementById("txtHint").innerHTML = "";
        return;
    } else {
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("txtHint").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET","getdata.php?q="+str+"&n="+num,true);
        xmlhttp.send();
    }
}
</script>

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
    <td width="50%" rowspan="2" valign="top">
    <table width="100%" height="100%" border="0">
      <tr>
        <td class="menu2">

        <? echo "<br><br><div id='txtHint'><b>โปรดเลือกงานที่มอบหมาย</b></div>"; ?>

        
        



           
    </table>
    
    </td>
    <td width="25%" rowspan="2" valign="top" class="Header"><table width="100%" border="0">
        <tr>
          <td class="Header" valign="top">งานที่มอบหมาย<hr></td>
        </tr>
        <tr>
          <td height="100%" align="center"> 
          
          <?php
          $conut = 0;
              for($i=0;$i<$result_hw->num_rows;$i++){
                // if($hw_name_hw[$i] != $hw_name_hw[$i-1]){
                
                echo "<table border = '0' width = '100%'><tr><td align = 'center'>"  ;
                  
                echo "<a href = 'javascript:showUser($hw_id_hw[$i],($i+1))'>";
                echo ($i+1). " " .$hw_name_hw[$i];
                echo "</a>";
                $name = $hw_name_hw[$i];
                echo "</td><td width = '10%' align = 'right'>";
                echo "<a onclick=\"javascript: return window.confirm('คุณต้องการจะลบการบ้าน $name ใช่หรือไม่?');\" href = '?delete&id=$hw_id_hw[$i]&name=$name' >|X| </a>";
                echo "</td></tr></table>";
                echo "<hr>";         
                $count++;   
                }
              // }              
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