<html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<head>
<title>
</title>
</head>
<body>

 <form action="add_std.php">
  <div class="container">
    <h1>Register</h1>
    <p>Please fill in this form to create an account.</p>
    <hr>

    <label for="name"><b>ชื่อ</b></label>
    <input type="text" placeholder="โปรดใส่ชื่อ" name="std_name" required>

    <label for="l_name"><b>นามสกุล</b></label>
    <input type="text" placeholder="โปรดใส่นามสกุล" name="std_l_name" required>

    <label for="std_y"><b>ชั้นปีการศึกษา</b></label>
    <select name="std_y" >
        <option value=1>1</option>
        <option value=2>2</option>
        <option value=3>3</option>
        <option value=4>4</option>
    </select>

    
    <label for="name"><b>UserId</b></label>
    <input type="password" placeholder="UserId" name="std_l_id" required>

    <hr>
   
    <button type="submit" ">Register</button>
  </div>

</form> 

</body>
</html>