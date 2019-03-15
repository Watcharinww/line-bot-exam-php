<?
$id = intval($_GET['id']);
$name = strval($_GET['name']);

test($id, $name);

function test($id, $name)
{
    include 'conn.php';
    $sql = "DELETE 
                FROM homework
                WHERE hw_id = $id";
    $sql_anr = "DELETE
                    FROM anr
                    WHERE hw_id = $id";

    if (($conn->query($sql) == true) && ($conn->query($sql_anr) == true)) {

        echo "<script> alert('ลบ $name สำเร็จแล้ว') </script>";
    } else {
        echo "<script> alert('ลบ $name ไม่สำเร็จ') </script>";
    }
    header('refresh:0; url=index.php');
    $conn->close();
    // echo "<script> alert('$id') </script>";
}