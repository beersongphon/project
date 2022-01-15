<?php
include('./../connect.php');
$product_id = $_POST['product_id'];
$product_img = $_POST['product_img'];
$product_name = $_POST['product_name'];
$product_price = $_POST['product_price'];
$product_description = $_POST['product_description'];

$sql = "UPDATE tb_product 
        SET product_img = '$product_img',
            product_name = '$product_name',
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
