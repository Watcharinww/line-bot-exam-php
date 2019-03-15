<?php
session_start();
date_default_timezone_set("Asia/Bangkok");
require "vendor/autoload.php";
if ($_SESSION['status'] != 'correct') {
    include 'header.php';
    include 'login.php';
    include 'footer.php';
    exit();
}

include 'header.php';
?>

<div class="container">


    <div id="content">
        <? include('home.php'); ?>
    </div>


</div>
<?
include 'footer.php';

?> 