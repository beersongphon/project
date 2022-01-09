<?php
include('./../connect.php');
$Img = $_POST['Img'];
$product_id = $_POST['product_id'];
$sql = "INSERT INTO img_product (Img, product_id) VALUES ('$Img', '$product_id')";
$result = $conn->query($sql);
if ($result == True) {
  echo True;
} else {
  echo $sql;
}
