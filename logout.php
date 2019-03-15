<?
session_start();

session_destroy();

echo "<script> alert('คุณได้ออกจากระบบแล้ว')";

header('location:index.php');
 