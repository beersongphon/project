<?php
# incude ครั้งเดียวในไฟล์ที่เรียกใช้งาน
include('./../connect.php');
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $product_id = $_POST['delete_id'];

  $sql = "DELETE FROM tb_product WHERE product_id = '$product_id'";
  $result = $conn->query($sql);

  if ($result == True) {
    echo "success";
  } else {
    echo "error " . $conn->error;
  }
} else {
  echo 'error REQUEST_METHOD ผิดพลาด';
}
?>