<html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

<head>
    <title>
    </title>
</head>
<?php
require 'conn.php';

$user = strval($_GET['id']);


$sql = "SELECT std_l_id
        FROM student";

$result = $conn->query($sql);

while ($row = $result->fetch_assoc()) {
  if ($user == $row['std_l_id']) {
    echo "<script> alert('**UserID ซ้ำ** กรุณากรอกใหม่หรือติดต่อครูผู้สอน'); 
              window.close(); </script>";
    exit();
  }
}
?>
<link rel="stylesheet" type="text/css" href="web.css">

<body class=" bg-light">

    <form action="add_std.php" class="web-border p-2">
        <div class="container text-center">
            <h1>Register</h1>
            <hr>
            <table border='0' align='center' >
                <tr>
                    <td align="right">
                        <label for="name"><b>ชื่อ : </b></label>
                    </td>
                    <td>
                        <input type="text" class='form-control col-15 text-center' placeholder="โปรดใส่ชื่อ" name="std_name" required><br>
                    </td>
                <tr>
                    <td align="right">
                        <label for="l_name"><b>นามสกุล : </b></label>
                    </td>
                    <td>
                        <input type="text" class ='form-control col-15 text-center' placeholder="โปรดใส่นามสกุล" name="std_l_name" required><br>
                    </td>
                <tr>
                    <td>
                        <label for="std_y"><b>ชั้นปีการศึกษา : </b></label>
                    </td>
                    <td>
                        <select name="std_y" class='custom-select col-15 text-center'>
                            <option value=1>1</option>
                            <option value=2>2</option>
                            <option value=3>3</option>
                            <option value=4>4</option>
                        </select><br>
                    </td>
                <tr hidden>
                    <td>
                        <label for="name"><b>UserId</b></label>
                    </td>
                    <td>
                        <input type="text" placeholder="UserId" name="std_l_id" value=<? echo $user ?> readonly required><br>
                    </td>
            </table>
            <hr>

            <button type="submit" class="btn btn-primary">Register</button>
        </div>

    </form>

</body>

</html> 