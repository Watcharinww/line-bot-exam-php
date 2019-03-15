<?
session_start();

session_destroy();

echo "<script> window.alert('คุณได้ออกจากระบบแล้ว'); window.location.href = 'index.php';</script>"; 