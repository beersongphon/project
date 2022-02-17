<?php
session_start();
include("./urldomain.php");
date_default_timezone_set('Asia/Bangkok');
include("./connect.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name_con = $_POST["name_con"];
  $email_con = $_POST["email_con"];
  $comments_con = $_POST["comments_con"];

  $sql = "INSERT INTO tb_contact (user_id,
      contact_member,
      contact_email,
      contact_comment)
      VALUES ('1',
      '$name_con',
      '$email_con',
      '$comments_con')";

  if ($conn->query($sql) == TRUE) {
    echo "ส่งข้อมูลสำเร็จ";
  } else {
    echo "error " . $conn->error;
  }
}
