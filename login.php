<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>LINE-LMS</title>
</head>
<style>
body{
	text-align:center;
	vertical-align:middle;	
}
</style>

<body>
<script type='text/javascript'>
function p_alert(){
	var newline = "\r\n";
	var message = "Password Incorect";
	message += newline;
	message += "Please try again";
	alert(message);

}
</script>


<?php
	session_start();
	
    if(isset($_POST['password']))
	{
	    $pass = '9d9d6ea6650e70720ec543753df4c65b';
	    $inpass = strval($_POST['password']);
        
        if($pass == md5(md5($inpass))){
			$_SESSION['status'] = 'correct';
			echo "<script> window.alert('Welcome to Line-LMS'); window.location.href = 'HomePage_Sent.php'; </script>";			
			
		}else{
    	    echo "<script>p_alert();</script>";
        }
    }
?>




<form action="<? echo $_SERVER['PHP_SELF'] ?>" method="POST" >
<p>Welcome</p>
Password :<input type="password" name="password"><br><br>

<input type="Submit"  value="Submit">
</body>
</html>
