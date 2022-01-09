<?php
include('./../connect.php');
$product_id = $_POST['product_id'];
$img = $_POST['img'];
$name = $_POST['name'];
$price = $_POST['price'];
$description = $_POST['description'];

$sql = "UPDATE product 
        SET img = '$img',
            name = '$name',
            price = '$price',
            description = '$description'
        WHERE product_id = '$product_id'
        ";
$result = $conn->query($sql);

if ($result == True) {
  echo True;
} else {
  echo $sql;
}
