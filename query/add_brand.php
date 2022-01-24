<?php
include('./../connect.php');
$brand_name = $_POST['brand_name'];

$sql = "SELECT * FROM tb_brand";
$result = $conn->query($sql);
$brand_id = ($result->num_rows + 1);
$sql = "INSERT INTO tb_brand (brand_name) VALUES 
        (
           '$brand_name'
        )
    ";
$result = $conn->query($sql);
if ($result == TRUE) {
  $sql = "SELECT brand_id FROM tb_brand WHERE brand_name = '$brand_name'";
  $id = 0;
  $result = $conn->query($sql);
  while ($row = $result->fetch_assoc()) {
    $id = $row['brand_id'];
  }
  echo $id;
} else {
  echo $sql;
}
