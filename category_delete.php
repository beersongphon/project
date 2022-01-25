<?php
  include('./connect.php');
  if ($_GET) {
    $category_id = $_GET['category_id'];
    $sql = "DELETE FROM tb_category WHERE category_id = '$category_id'";
    $result = $conn->query($sql);
    if ($result == TRUE) {
      header('location:category.php?m=1');
    }
  }
?>