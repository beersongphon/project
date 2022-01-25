<?php
  include('./connect.php');
  if ($_GET) {
    $brand_id = $_GET['brand_id'];
    $sql = "DELETE FROM tb_brand WHERE brand_id = '$brand_id'";
    $result = $conn->query($sql);
    if ($result == TRUE) {
      header('location:brand.php?m=1');
    }
  }
?>