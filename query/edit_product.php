<?php
include('./../connect.php');
$product_id = $_POST['product_id'];
$product_name = $_POST['product_name'];
$brand_id = $_POST['brand_id'];
$category_id = $_POST['category_id'];
$product_qty = $_POST['product_qty'];
$product_price = $_POST['product_price'];
$product_description = $_POST['product_description'];

$sql = "UPDATE tb_product 
        SET product_name = '$product_name',
            brand_id = '$brand_id',
            category_id = '$category_id',
            product_qty = '$product_qty',
            product_price = '$product_price',
            product_description = '$product_description'
        WHERE product_id = '$product_id'
        ";
$result = $conn->query($sql);

if ($result == True) {
  echo True;
} else {
  echo $sql;
}
