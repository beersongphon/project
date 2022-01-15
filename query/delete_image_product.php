<?php
include('./../connect.php');
$product_id = $_POST['product_id'];
$sql = "DELETE FROM tb_img_product WHERE product_id = '$product_id'";
$result = $conn->query($sql);
if ($result == True) {
  echo True;
} else {
  echo $sql;
}
