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
  echo "  <table width='100%' border = '0' class='menu2'>";
  echo "    <tr>";
  echo "      <td>";
  echo       $n . " . " . $row['hw_name'] . "<br>";
  echo "      <a id = 'datehw'> เริ่มสั่งงาน : " . $row['hw_date_s'] . "   " . "เวลาที่ส่ง : " . $row['hw_date_r'] . "</a";
  echo "      </td>";
  echo "    </tr>";
  echo "   <tr>";
  echo "     <td><hr></td>";
  echo "   </tr>";
  echo "  </table>";
  echo "</td>";
  echo "</tr>";
  echo "<tr valign = 'top'>";
  echo "  <td>";
  echo "    <table width='100%' border='0' align='center' class='UnderDetail'>";
}

while ($row = mysqli_fetch_array($result)) {
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
    echo "<a href='#' id='click_score' onclick=window.open('editscore.php?q=$q&nw=$nw&st=0','','width=400,height=400,scrollbars=no,resizable=no');>ยังไม่ได้ตรวจ</a>";
  else
    echo "<a href='#' id='click_score' onclick=if(window.confirm('ต้องการแก้คะแนน?')){window.open('editscore.php?q=$q&nw=$nw&st=1','','width=400,height=400,scrollbars=no,resizable=no');}>ตรวจแล้ว</a>";
  echo "        </td>";
  echo "      </tr>";
}


while ($row = mysqli_fetch_array($result_hw)) {

  echo "</td>";
  echo "</tr>";
}
mysqli_close($conn);
?> 