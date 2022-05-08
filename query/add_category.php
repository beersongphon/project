<?php
# incude ครั้งเดียวในไฟล์ที่เรียกใช้งาน
include("./../connect.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $category_name = $_POST['category_name'];

  // $sql = "SELECT * FROM tb_category";
  // $result = $conn->query($sql);
  // $category_id = ($result->num_rows + 1);

  # check duplicate brand
  $sql_chk = "SELECT * FROM tb_category WHERE category_name = '$category_name'";
  $result = $conn->query($sql_chk);
  if ($result->num_rows > 0) {
    echo "already";
    exit();
  }

  # insert data
  $sql = "INSERT INTO tb_category (category_name) VALUES 
          (
            '$category_name'
          )
      ";
  $result = $conn->query($sql);
  if ($result == TRUE) {
    $sql = "SELECT category_id FROM tb_category WHERE category_name = '$category_name'";
    $id = 0;
    $result = $conn->query($sql);
    while ($row = $result->fetch_assoc()) {
      $id = $row['category_id'];
    }
    echo "success";
  } else {
    echo "error " . $conn->error;
  }
} else {
    echo 'error REQUEST_METHOD ผิดพลาด';
}
?>