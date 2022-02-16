<?php
  include('./connect.php');
  if ($_GET) {
    $product_id = $_GET['product_id'];
    $sql = "DELETE FROM tb_product WHERE product_id = '$product_id'";
    $result = $conn->query($sql);
    if ($result == TRUE) {
      header('location:product.php?m=1');
    }
  }
?>