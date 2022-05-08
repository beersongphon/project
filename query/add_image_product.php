<?php
# incude ครั้งเดียวในไฟล์ที่เรียกใช้งาน
include('./../connect.php');
$img_product = $_POST['img_product'];
$product_id = $_POST['product_id'];
$sql = "INSERT INTO tb_img_product (img_product, product_id) VALUES ('$img_product', '$product_id')";
$result = $conn->query($sql);
if ($result == True) {
  echo True;
} else {
  echo $sql;
}
