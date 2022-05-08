<?php
# incude ครั้งเดียวในไฟล์ที่เรียกใช้งาน
include("./../connect.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $brand_name = $_POST['brand_name'];

  // $sql = "SELECT * FROM tb_brand";
  // $result = $conn->query($sql);
  // $brand_id = ($result->num_rows + 1);

  # check duplicate brand
  $sql_chk = "SELECT * FROM tb_brand WHERE brand_name = '$brand_name'";
  $result = $conn->query($sql_chk);
  if ($result->num_rows > 0) {
    echo "already";
    exit();
  }

  # insert data
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
    echo "success";
  } else {
    echo "error " . $conn->error;
  }
} else {
    echo 'error REQUEST_METHOD ผิดพลาด';
}
?>