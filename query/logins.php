<?php
session_start(); # กำหนดไว้ กรณีอาจได้ใช้ตัวแปร session
# incude ครั้งเดียวในไฟล์ที่เรียกใช้งาน
include("./../urldomain.php");
date_default_timezone_set('Asia/Bangkok');
include("./../connect.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $Username = $_POST["usr"];
  $Password = md5($_POST["pwd_login"]);

  $sql = "SELECT * FROM tb_user WHERE user_username = '$Username' AND user_password = '$Password' ";
  $result = $conn->query($sql);
  if ($row = $result->fetch_assoc()) {
    
    $_SESSION["user_id"] = $row["user_id"];
    $_SESSION["user_firstname"] = $row["user_firstname"];
    $_SESSION["user_lastname"] = $row["user_lastname"];
    $_SESSION["user_address"] = $row["user_address"];
    $_SESSION["user_tel"] = $row["user_tel"];
    $_SESSION["user_email"] = $row["user_email"];
    $_SESSION["user_sex"] = $row["user_sex"];
    $_SESSION["user_username"] = $row["user_username"];
    $_SESSION["permission_id"] = $row["permission_id"];

    echo "login_success";
  } else {
    echo "login_error";
  }
} else {
  echo "error" . $conn->error;
}
?>