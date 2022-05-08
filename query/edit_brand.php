<?php
# incude ครั้งเดียวในไฟล์ที่เรียกใช้งาน
include('./../connect.php');
$brand_id = $_POST['brand_id'];
$brand_name = $_POST['brand_name'];

$sql = "UPDATE tb_brand 
        SET brand_name = '$brand_name'
        WHERE brand_id = '$brand_id'
        ";
$result = $conn->query($sql);

if ($result == True) {
  echo True;
} else {
  echo $sql;
}
?>