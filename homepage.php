<?php
session_start();
date_default_timezone_set("Asia/Bangkok");
require "vendor/autoload.php";
if($_SESSION['status'] != 'correct'){
  include 'header.php';
  include 'login.php';
  include 'footer.php';
  exit();
}

include 'header.php';
?>

<div class="container">
<!-- 
<table class='color-blue' >
    <tr>
        <td width="25%" align="center" class='border'><p><a id = 'click' href='#' data-target="sent">
        <img src="picture/Sent.png" width="50%" height="50%" title="SentPage" /></a></p>
        <p class="font-xlarge font-color-hardgreen">Sent</p></td> -->


<div id = "content" >
    <? include('home.php'); ?>
</div>


<!-- </tr>
    <tr>
        <td align="center" class='border'><p><a id = 'click' href="#" data-target="receive">
        <img src="picture/Receive.png" width="50%" height="50%" title="ReceivePage" /></a></p>
        <p class="font-xlarge font-color-hardgreen">Receive</p></td>
    </tr>
</table> -->


</div>
<?
include 'footer.php';

?>