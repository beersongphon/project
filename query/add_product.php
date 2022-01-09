<?php
include('./../connect.php');
$img = $_POST['img'];
$name = $_POST['name'];
$price = $_POST['price'];
$description = $_POST['description'];

$sql = "SELECT * FROM product";
$result = $conn->query($sql);
$parts_id = ($result->num_rows + 1);
$sql = "INSERT INTO product (img, name , price , description) VALUES 
        (
           '$img',
           '$name',
           '$price',
           '$description'
        )
    ";
$result = $conn->query($sql);
if ($result == TRUE) {
  $sql = "SELECT product_id FROM product WHERE name = '$name'";
  $id = 0;
  $result = $conn->query($sql);
  while ($row = $result->fetch_assoc()) {
    $id = $row['product_id'];
  }
  echo $id;
} else {
  echo $sql;
}
