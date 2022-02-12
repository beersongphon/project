<?php
include('./connect.php');
date_default_timezone_set("Asia/Bangkok");

$order_id = $_POST['order_id'];
$pay_total = $_POST['pay_total'];
$pay_tel = $_POST['pay_tel'];
$target_dir = "pay/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$FileType = pathinfo($target_file, PATHINFO_EXTENSION);

if ($FileType != "jpg" && $FileType != "JPG" && $FileType != "jpeg" && $FileType != "JPEG" && $FileType != "png" && $FileType != "PNG") {
    // if (false) {
    // แจ้งเตือน! อนุญาตเฉพาะไฟล์นามสกุล jpg เท่านั้น
    echo "imageonly";
} else if (file_exists($target_dir . md5(basename($_FILES["fileToUpload"]["name"])) . ".jpg")) {
    // แจ้งเตือน! มีไฟล์ชื่อนี้อยู่ในระบบแล้ว
    echo "exists";
} else if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $changeName = $target_dir . md5(basename($_FILES["fileToUpload"]["name"])) . ".jpg";

    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], iconv('utf-8', 'windows-874', $changeName))) {
      $sql2 = "UPDATE tb_order SET  
      status_id = '2'
      WHERE  order_id = $order_id";
      $result = $conn->query($sql2);
        $sql = "INSERT INTO tb_payment (order_id, pay_date, pay_total, pay_slip, pay_tel) VALUES 
        ('$order_id', 
        '".date('Y-m-d')."', 
        '$pay_total', 
        '". md5(basename($_FILES["fileToUpload"]["name"])) ."',
        '$pay_tel')";
        if ($conn->query($sql) == TRUE) {
            echo "success";
        } else {
            echo "error";
        }
    } else {
        echo "movefilefail";
    }
}
