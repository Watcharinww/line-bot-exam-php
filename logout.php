<?
session_start();

session_destroy();

echo "<script> window.alert('คุณได้ออกจากระบบแล้ว') </script>";

header('location:index.php');
 