<?
include 'changepage.php';
include 'conn.php';

$sql = "SELECT *
        FROM homework
        join anr
        on anr.hw_id = homework.hw_id
        join student
        on student.std_id = anr.std_id
        order by anr.hw_id , anr.std_id";
$result = $conn->query($sql);

$nw = 0;

while ($row = $result->fetch_assoc()) {
    $hw_id[$nw] = $row["hw_id"];
    $hw_n[$nw] = $row["hw_name"];
    $std_n[$nw] = $row["std_name"];
    $std_score[$nw] = $row["std_score"];
    $hw_status[$nw] = $row['hw_status'];
    $nw++;
}

$sql = "SELECT *
        FROM homework";
$result_hw = $conn->query($sql);

$nw = 0;
while ($row = $result_hw->fetch_assoc()) {

    $hw_id_hw[$nw] = $row["hw_id"];
    $hw_name_hw[$nw] = $row["hw_name"];
    $hw_date_s[$nw] = $row["hw_date_s"];
    $hw_date_r[$nw] = $row["hw_date_r"];
    $nw++;
}

$conn->close();
?>

<script>
    function showHomework(str, num) {
        if (str == "") {
            document.getElementById("txtHint").innerHTML = "";
            return;
        } else {
            if (window.XMLHttpRequest) {
                // code for IE7+, Firefox, Chrome, Opera, Safari
                xmlhttp = new XMLHttpRequest();
            } else {
                // code for IE6, IE5
                xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
            }
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("txtHint").innerHTML = this.responseText;
                }
            };
            xmlhttp.open("GET", "getdata.php?q=" + str + "&n=" + num, true);
            xmlhttp.send();
        }
    }
</script>

<table class='color-blue' border='0'>
    <tr>
        <td width="25%" align="center" class='border'>
            <p><a id='click' href='#' data-target="sent">
                    <img src="picture/Sent.png" width="50%" height="50%" title="SentPage" /></a></p>
            <p class="font-xlarge font-color-hardgreen">Sent</p>
        </td>
        <td width="50%" rowspan="2" valign="top" class='border'>
            <table width="100%" height="100%" border="0">
                <tr>
                    <td class='text-center font-xlarge'>

                        <? echo "<div id='txtHint'><b><p style='color:red' ><br><br><br>*โปรดเลือกงานที่มอบหมาย*</p></b></div>"; ?>
            </table>
        </td>
        <td width="25%" rowspan="2" valign="top" class='border padding'>
            <table width="100%" border="0">
                <tr>
                    <td class="font-xlarge text-center bold font-color-hardgreen border-bottom-list" valign="top">งานที่มอบหมาย</td>
                </tr>
                <tr>
                    <td height="100%" align="center">

                        <?php
                        $conut = 0;
                        for ($i = 0; $i < $result_hw->num_rows; $i++) {
                            echo "<table border = '0' width = '100%'><tr><td align = 'center' class='border-bottom-list'>";
                            echo "<a href = 'javascript:showHomework($hw_id_hw[$i],($i+1))'>";
                            echo ($i + 1) . " " . $hw_name_hw[$i];
                            echo "</a>";
                            $name = $hw_name_hw[$i];
                            echo "</td><td width = '10%' align = 'right'>";
                            echo "<a class='border-close' onclick=\"javascript: return window.confirm('คุณต้องการจะลบการบ้าน $name ใช่หรือไม่?');\"
                                    href = 'deleteHw.php?id=$hw_id_hw[$i]&name=$name' > X </a>";
                            echo "</td></tr></table>";
                            $count++;
                        }
                        ?>

                    </td>
                </tr>
            </table>
        </td>
        </div>
    </tr>
    <tr>
        <td align="center" class='border'>
            <p><a id='click' href="#" data-target="receive">
                    <img src="picture/Receive.png" width="50%" height="50%" title="ReceivePage" /></a></p>
            <p class="font-xlarge font-color-hardgreen">Receive</p>
        </td>
    </tr>
</table> 