<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<style>

.body{
	height:600px;
	width:600px;	
	}
td{
	text-align:center;
	font-size:x-large;
}
#war{
  color:red;
}


</style>

<?

$q = intval($_GET['q']);
$nw = intval($_GET['nw']);

include 'conn.php';

$sql="  SELECT * 
        FROM anr
        join student
        on anr.std_id = student.std_id  
        join homework
        on anr.hw_id = homework.hw_id     
        WHERE anr.hw_id = '".$q."' AND anr.std_id = '".$nw."'
        ORDER by anr.hw_id , anr.std_id
        ";
$result = $conn->query($sql);



?>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<? while($row = $result->fetch_assoc()){
  
  $name = $row['std_name']." ".$row['std_l_name'];
  ?>

<form method="post" action = "<? $_SERVER['php_self'] ?>">
<table align="center" width="300" height="300" border="0">
  <tr>
    <td height="10%"><? echo $row['hw_id'].":".$row['hw_name'] ; ?></td>
  </tr>
  <tr>
    <td height="10%"> <?  echo $row['std_name']." ".$row['std_l_name']; ?></td>
  </tr>
  <tr>
    <td><input name="sc" type="text" size="2" maxlength="2" placeholder="0" /> / 10
    <br /><br />
    <a id= "war">**ถ้าไม่ใส่คะแนน<br>จะถือว่าลบคะแนนออก**</a><br>
    <input type = "submit" name="submit" type="button" value="ให้คะแนน" /></td>
  </tr>
</table>

<? }

	if(isset($_POST['sc'])){
    if($_POST['sc'] != NULL){
    $sc = $_POST['sc'];    
    $sql_u = "UPDATE anr
            set std_score = $sc
            WHERE anr.hw_id = '".$q."' AND anr.std_id = '".$nw."'
            ";


    $message = "$name ได้รับคะแนน : ".$sc;
  } else{
    $sql_u = "UPDATE anr
            set std_score = NULL
            WHERE anr.hw_id = '".$q."' AND anr.std_id = '".$nw."'
            ";


    $message = "คะแนนของนักเรียน $name ถูกลบออกแล้ว";
    
  }

  echo "<script> alert('$message'); </script>";
  $conn->query($sql_u);
  $conn->close();
  header('Location:broadcastscore.php?s='.$sc.'&n='.$name.'&id='.$q.'&sid='.$nw);
}

 ?>

</body>
</html>