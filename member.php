<?php
session_start();
include("./urldomain.php");
date_default_timezone_set('Asia/Bangkok');
include("./connect.php");

$sql = "SELECT * FROM `member`";

$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) == 0) {
  echo "<div class='alert alert-danger'>";
  echo "<strong>แจ้งเตือน!</strong> ไม่พบข้อมูลลูกค้า";
  echo "</div>";
} else {
  echo "<div class='card mb-4'>";
  echo "<div class='card-body'>";
  echo "<table id='datatablesSimple' class='display' style='width:100%'>";

  echo "<thead>";
  echo "<tr>";
  echo    "<th>No.</th>";
  echo    "<th>ชื่อสินค้า</th>";
  echo    "<th>Frist Name</th>";
  echo    "<th>Last Name</th>";
  echo    "<th>ID Card</th>";
  echo    "<th>Telephone</th>";
  echo    "<th>Sex</th>";
  echo    "<th>เวลาการจอง</th>";
  echo    "<th>DateTime</th>";
  echo "</tr>";
  echo "</thead>";
  echo "<tfoot>";
  echo "<tr>";
  echo    "<th>No.</th>";
  echo    "<th>User</th>";
  echo    "<th>Frist Name</th>";
  echo    "<th>Last Name</th>";
  echo    "<th>ID Card</th>";
  echo    "<th>Telephone</th>";
  echo    "<th>Sex</th>";
  echo    "<th>เวลาการจอง</th>";
  echo    "<th>DateTime</th>";
  echo "</tr>";
  echo "</tfoot>";
  $no = 1;
  echo "<tbody>";
  while ($row = mysqli_fetch_array($result)) {

    echo "<tr>";
    echo    "<td>" . $no . "</td>";
    $no = $no + 1;
    echo    "<td>" . $row['member_user'] . "</td>";
    echo    "<td>" . $row['member_name'] . "</td>";
    echo    "<td>" . $row['member_lastname'] . "</td>";
    echo    "<td>" . $row['member_idcard'] . "</td>";
    echo    "<td>" . $row['member_tel'] . "</td>";
    if ($row['member_sex'] == "0") {
      echo    "<td>หญิง</td>";
    } else {
      echo    "<td>ชาย</td>";
    }
    echo    "<td>" . $row['member_time_progress'] . " ชั่วโมง</td>";
    echo    "<td>" . $row['member_datetime'] . "</td>";
    echo "</tr>";
  }
  echo "</tbody>";
  echo "</table>";
  echo "</div>";
  echo "</div>";
}

$conn->close();

?>

<script>
  $(document).ready(function() {
    $('#datatablesSimple').DataTable();
  });
</script>