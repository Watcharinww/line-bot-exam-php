<?

include 'conn.php';

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}



$std_name = $_GET['std_name'];
$std_l_name = $_GET['std_l_name'];
$std_y = $_GET['std_y'];
$std_UserId = $_GET['std_l_id'];

$sql = "SELECT std_l_id
        FROM student";

$result = $conn->query($sql);

while ($row = $result->fetch_assoc()) {
    if ($std_UserId == $row['std_l_id']) {
        echo "<script> alert('**UserID ซ้ำ** กรุณากรอกใหม่หรือติดต่อครูผู้สอน'); 
                window.location.href = 'register.php' </script>";
        exit();
    }
}

$sql_a = "INSERT INTO student(`std_name`,`std_l_name`,`std_year`,`std_l_id`)
                VALUE ('$std_name','$std_l_name','$std_y','$std_UserId')";
if ($conn->query($sql_a) == true) {
    echo "<script> alert('ลงทะเบียนเสร็จสิ้น!'); 
            window.close(); </script>";
    exit();
} else {
    echo "ERROR: " . $conn->error . "<br>";
}



$conn->close();
 