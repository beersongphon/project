<?php
include('./../connect.php');
$category_name = $_POST['category_name'];

$sql = "SELECT * FROM tb_category";
$result = $conn->query($sql);
$category_id = ($result->num_rows + 1);
$sql = "INSERT INTO tb_category (category_name) VALUES 
        (
           '$category_name'
        )
    ";
$result = $conn->query($sql);
if ($result == TRUE) {
  $sql = "SELECT category_id FROM tb_brand WHERE category_name = '$category_name'";
  $id = 0;
  $result = $conn->query($sql);
  while ($row = $result->fetch_assoc()) {
    $id = $row['category_id'];
  }
  echo $id;
} else {
  echo $sql;
}
