<?php
# incude ครั้งเดียวในไฟล์ที่เรียกใช้งาน
include('./../connect.php');
$product_name = $_POST['product_name'];
$brand_id = $_POST['brand_id'];
$category_id = $_POST['category_id'];
$product_price = $_POST['product_price'];
$product_quantity = $_POST['product_quantity'];
$product_description = $_POST['product_description'];

$sql = "SELECT * FROM tb_product";
$result = $conn->query($sql);
$product_id = ($result->num_rows + 1);
$sql = "INSERT INTO tb_product (product_name, brand_id, category_id, product_price, product_quantity, product_description) VALUES 
        (
           '$product_name',
           '$brand_id',
           '$category_id',
           '$product_price',
           '$product_quantity',
           '$product_description'
        )
    ";
$result = $conn->query($sql);
if ($result == TRUE) {
  $sql = "SELECT product_id FROM tb_product WHERE product_name = '$product_name'";
  $id = 0;
  $result = $conn->query($sql);
  while ($row = $result->fetch_assoc()) {
    $id = $row['product_id'];
  }
  echo $id;
} else {
  echo $sql;
}
