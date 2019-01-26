<!DOCTYPE html>
<html>
<body>

<?php
$servername = "us-cdbr-iron-east-01.cleardb.net";
$username = "bc2e88a0fd2a0e";
$password = "6ca79774";
$dbname = "test1";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM heroku_5eae676745c3fe6.test1";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<br> id: ". $row["Id"]. " - Name: ". $row["Name"]. "<br>";
    }
} else {
    echo "0 results";
}

$conn->close();
?>

</body>
</html>