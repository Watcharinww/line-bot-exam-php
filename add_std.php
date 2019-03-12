<?

include 'conn.php';

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}



$std_name = $_POST['std_name'];
$std_l_name = $_POST['std_l_name'];
$std_y = $_POST['std_y'];
$std_UserId = $_POST['std_l_id'];

$sql = "SELECT std_l_id
        FROM studen";

$result = mysqli_query($conn,$sql);
while($row = myseli_fetch_array($sql)){
    if($std_UserId == $row['std_l_id']){
        Echo "<script> alert('UserID ซ้ำ กรุณากรอกใหม่หรือติดต่อครูผู้สอน'); 
                window.location.href = 'register.php' </script>";
    }else{
        $sql_a = "INSERT INTO student(std_name,std_l_name,std_year,std_l_id)
        VALUE ($std_name,$std_l_name,$std_y,$std_UserId)";
        $conn->query($sql_a);
        $conn-close();
        Echo "<script> alert('ลงทะเบียนเสร็จสิ้น'); 
                window.location.href = 'register.php' </script>";
    }
}

?>