<?php
include('./../connect.php');
$category_id = $_POST['category_id'];
$category_name = $_POST['category_name'];

$sql = "UPDATE tb_category 
        SET category_name = '$category_name'
        WHERE category_id = '$category_id'
        ";
$result = $conn->query($sql);

if ($result == True) {
  echo True;
} else {
  echo $sql;
}
