<?php
  include('./../connect.php');
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $category_id = $_POST['delete_id'];

    $sql = "DELETE FROM tb_category WHERE category_id = '$category_id'";
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
