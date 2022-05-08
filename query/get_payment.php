<?php
# incude ครั้งเดียวในไฟล์ที่เรียกใช้งาน
include('./../connect.php');
$order_id = $_POST['order_id'];
$sql = "SELECT * FROM tb_order WHERE order_id = '$order_id'";
$result = $conn->query($sql);
$data = array();
while ($row = $result->fetch_assoc()) {
  array_push($data, array(
    'order_id' => $row['order_id'],
    'order_total' => $row['order_total']
  ));
}
$js = json_encode($data);
echo $js;
?>