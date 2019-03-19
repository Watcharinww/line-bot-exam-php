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

<table class='web-border text-light'>
    <tr>
        <td width="25%" align="center" class='web-border'>
            <p><a id='click' href='#' data-target="sent">
                    <img src="picture/Sent.png" width="50%" height="50%" title="SentPage" /></a></p>
            <p class="font-xlarge font-color-hardgreen">Sent</p>
        </td>


        <td width="50%" rowspan="2" valign="top" class='web-border'>
            <table width="100%" height="100%" border="0">
                <tr>
                    <td class='text-center h5'>

                        <? echo "<div id='txtHint'><b><p class='h1 web-breting' style='color:#7A1706' ><br><br><br>*โปรดเลือกงานที่มอบหมาย*</p></b></div>"; ?>
            </table>
        </td>
        <td width="25%" height='100%' rowspan="2" valign="top" class=' '>
            <table width="100%" class=''>
                <thead class='thead'>
                    <tr>
                        <td class="h3 text-center text-light web-border-bottom" valign="top">งานที่มอบหมาย</td>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td height="80%" align="center">

                            <?php
                            $conut = 0;
                            for ($i = 0; $i < $result_hw->num_rows; $i++) {
                                echo "<table class='table-sm' width = '100%'><tr><td class='web-border-bottom text-center'>";
                                echo "<a href = 'javascript:showHomework($hw_id_hw[$i],($i+1))'>";
                                echo ($i + 1) . " " . $hw_name_hw[$i];
                                echo "</a>";
                                $name = $hw_name_hw[$i];
                                echo "</td><td width = '10%' align = 'right' class='web-border-bottom'>";
                                echo "<a class='p-1 ' onclick=\"javascript: return window.confirm('คุณต้องการจะลบการบ้าน $name ใช่หรือไม่?');\"
                                    href = 'deleteHw.php?id=$hw_id_hw[$i]&name=$name' > X </a>";
                                echo "</td></tr></table>";
                                $count++;
                            }
                            ?>

                        </td>
                    </tr>
                    <tr><td></td></td>
                    <tr class='text-center'>
                        <td>
                            <!-- pagination -->
                        </td>
                    </tr>
                </tbody>
            </table>
        </td>
        </div>
    </tr>
    
    <tr>
        <td align="center" class='web-border'>
            <p><a id='click' href="#" data-target="receive">
                    <img src="picture/Receive.png" width="50%" height="50%" title="ReceivePage" /></a></p>
            <p class="font-xlarge font-color-hardgreen">Receive</p>
        </td>
    </tr>
</table> 