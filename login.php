<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>LINE-LMS</title>
</head>
<style>

</style>

<body>
    <script type='text/javascript'>
        function p_alert() {
            var newline = "\r\n";
            var message = "Password Incorrect";
            message += newline;
            message += "Please try again";
            alert(message);

        }
    </script>


    <?php
    session_start();

    if (isset($_POST['password'])) {
        $pass = '9d9d6ea6650e70720ec543753df4c65b';
        $inpass = strval($_POST['password']);

        if ($pass == md5(md5($inpass))) {
            $_SESSION['status'] = 'correct';
            echo "<script> window.alert('Welcome to Support Line-LMS'); window.location.href = 'homepage.php'; </script>";
        } else {
            echo "<script>p_alert();</script>";
        }
    }
    ?>



    <table class='container-fluid bg-success p-3 rounded-lg' height='100%'>
        <tr>
            <td class='text-center'>
                <form action="<? echo $_SERVER['PHP_SELF'] ?>" method="POST">
                    <h1 class='display-4 text-light'>Welcome</h1>
                    <b class='h3 text-light'>Password : </b>
                    <input type="password" class='text-center'name="password" placeholder='input password'>
                    <input type="submit" class='btn btn-primary col-1 submit' value="Submit">
                    <br><br>
                </form>
            </td>
        </tr>
    </table>
</body>

</html> 