<style>
    #click_score {
        color: black;
    }
</style>

<?php
$q = intval($_GET['q']);
$n = intval($_GET['n']);

include 'conn.php';

$sql = "  SELECT * 
        FROM anr
        join student
        on anr.std_id = student.std_id       
        WHERE hw_id = '" . $q . "'
        order by anr.hw_id , anr.std_id";
$result = mysqli_query($conn, $sql);

$sql = "SELECT hw_id,hw_name,hw_date_s,hw_date_r
        FROM homework
        where hw_id = '" . $q . "'";
$result_hw = $conn->query($sql);

$nw = 0;

if ($q == "N") {
  echo "โปรดเลือกงานที่สั่ง";
}

while ($row = mysqli_fetch_array($result_hw)) {
  echo "  <table width='100%'>";
  echo "    <tr>";
  echo "      <td class='web-border-bottom p-3'>";
  echo       $n . " . " . $row['hw_name'] . "<br>";
  echo "      <a id = 'datehw'> เริ่มสั่งงาน : " . $row['hw_date_s'] . "   " . "เวลาที่ส่ง : " . $row['hw_date_r'] . "</a";
  echo "      </td>";
  echo "    </tr>";
  echo "  </table>";
  echo "</td>";
  echo "</tr>";
  echo "<tr valign = 'top'>";
  echo "  <td><br>";
  echo "    <table width='100%' border='0' align='center' class='UnderDetail'>";
}

while ($row = mysqli_fetch_array($result)) {
  echo "<div id='data'>";
  $nw = $row['std_id'];
  echo "      <tr class='Detail'>";
  echo "        <td class='name' witdh = '40%'>" . $row['std_name'] . " " . $row['std_l_name'] . "</td>";
  echo "        <td width = '20%'>";
  if ($row['std_score'] == null)
    echo "-";
  else
    echo $row['std_score'];
  echo "        / 10 </td>";
  echo "        <td width = '40%'>";
  if ($row['std_score'] == null)
    echo "<a href='#' class='btn btn-primary col-4' onclick=window.open('editscore.php?q=$q&nw=$nw','','width=400,height=400,scrollbars=no,resizable=no');>ยังไม่ได้ตรวจ</a>";
  else
    echo "<a href='#' class='btn btn-primary col-4' onclick=if(window.confirm('ต้องการแก้คะแนน?')){window.open('editscore.php?q=$q&nw=$nw','','width=400,height=400,scrollbars=no,resizable=no');}>ตรวจแล้ว</a>";
  echo "        </td>";
  echo "      </tr>";
  echo "</div>";
}


while ($row = mysqli_fetch_array($result_hw)) {

  echo "</td>";
  echo "</tr>";
}
mysqli_close($conn);
?> 