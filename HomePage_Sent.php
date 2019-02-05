<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>LMS-Line</title>
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

<script type="text/javascript" src="Time.js"></script>


<?php

?>


</head>

<body>
<table width="100%" height="100%" border="1">
  <tr valign="top" >
    <td height="100" colspan="3" class="Header" valign="middle">Learning Management System on Line Application</td>
  </tr>
  <tr>
    <td width="25%" align="center"><p><a href="HomePage_Sent.php"><img src="picture/Sent.png" width="250" height="240" alt="" /></a></p>
    <p class="menu">Sent</p></td>
    <td width="50%" rowspan="2" valign="top"><table width="100%" height="100%" border="0">
      <tr>
        <td class="menu"><table width="100%" border="0" class="menu">
            <tr>
              <td>1. Test Work 1</td>
            </tr>
            <tr>
              <td><hr /></td>
            </tr>
          </table></td>
  </tr>
  <tr>
    <td width="25%" align="center"><p><a href="HomePage_Sent.php"><img src="picture/Sent.png" width="50%" height="50%" title="SentPage" /></a></p>
    <p class="menu">Sent</p></td>
    <td width="37.5%" rowspan="2" valign="top" align="center"><form id="form1" name="form1" method="post" action="">
      <p><img src="picture/book.png"/book.png" width="77%" height="77%" /> </p>
      <p>
        <label for="Job"></label>
        <input type="text" name="Job" id="Job" placeholder="งานที่ต้องการมอบหมาย" />
      </p>
      <p>
  <input type="submit" name="Sent.J" id="Sent.J" value="มอบหมายงาน" />
      </p>
    </form></td>
    <td width="37.5%" rowspan="2" valign="top" align="center">
    <form id="form2" name="form2" method="post" action="botbroadcast.php">
    <p><img src="picture/megaphone.png" width="75%" height="75%" /> </p>
      <p>
        <label for="Anou"></label>
        <input type="text" name="Anou" id="Anou" placeholder="Input Anouncement to broadcast" />
      </p>
      <p>
        <input type="submit" name="Sent.A" id="Sent.A" value="Broadcast" />
    </p>
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
