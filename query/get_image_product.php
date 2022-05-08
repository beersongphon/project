<?php
# incude ครั้งเดียวในไฟล์ที่เรียกใช้งาน
include('./../connect.php');
$product_id = $_POST['product_id'];
$sql = "SELECT product_img FROM tb_product WHERE product_id = '$product_id'";
$result = $conn->query($sql);
$data = array();

while ($row = $result->fetch_assoc()) {
  array_push($data, $row);
}

if ($result == True) {
  echo json_encode($data);
} else {
  echo $sql;
}
