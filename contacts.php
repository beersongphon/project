<?php
session_start();
include("urldomain.php");
date_default_timezone_set('Asia/Bangkok');
include("connection.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name_con = $_POST["name_con"];
    $email_con = $_POST["email_con"];
    $comments_con = $_POST["comments_con"];

    $sql = "INSERT INTO contact (contact_member,
        contact_email,
        contact_comment)
      VALUES ('" . $name_con . "',
       '" . $email_con . "',
        '" . $comments_con . "')";

    if ($con->query($sql) == TRUE) {
        echo "ส่งข้อมูลสำเร็จ";
    } else {
        echo "error " . $con->error;
    }
}
