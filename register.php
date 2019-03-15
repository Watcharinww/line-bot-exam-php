<html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<head>
    <title>
    </title>
</head>
<style>
    body {
        height: 600px;
        width: 600px;
        text-align: center;
    }
</style>

<body>
    <form action="add_std.php">
        <div class="container">
            <h1>Register</h1>
            <p>Please fill in this form to create an account.</p>
            <hr>
            <table border='0' align='center'>
                <tr>
                    <td>
                        <label for="name"><b>ชื่อ</b></label>
                    </td>
                    <td>
                        <input type="text" placeholder="โปรดใส่ชื่อ" name="std_name" required><br>
                    </td>
                <tr>
                    <td>
                        <label for="l_name"><b>นามสกุล</b></label>
                    </td>
                    <td>
                        <input type="text" placeholder="โปรดใส่นามสกุล" name="std_l_name" required><br>
                    </td>
                <tr>
                    <td>
                        <label for="std_y"><b>ชั้นปีการศึกษา</b></label>
                    </td>
                    <td>
                        <select name="std_y">
                            <option value=1>1</option>
                            <option value=2>2</option>
                            <option value=3>3</option>
                            <option value=4>4</option>
                        </select><br>
                    </td>
                <tr>
                    <td>
                        <label for="name"><b>UserId</b></label>
                    </td>
                    <td>
                        <input type="password" placeholder="UserId" name="std_l_id" required><br>
                    </td>
            </table>
            <hr>
            <button type="submit" ">Register</button>
  </div>
</form> 
</body>
</html>      