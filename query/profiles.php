<?php
session_start(); # กำหนดไว้ กรณีอาจได้ใช้ตัวแปร session
# incude ครั้งเดียวในไฟล์ที่เรียกใช้งาน
include("./../urldomain.php");
date_default_timezone_set('Asia/Bangkok');
include("./../connect.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_id_profile = $_POST["user_id_profile"];
    $firstname_profile = $_POST["firstname_profile"];
    $lastname_profile = $_POST["lastname_profile"];
    $address_profile = $_POST["address_profile"];
    $tel_profile = $_POST["tel_profile"];
    $email_profile = $_POST["email_profile"];
    $sex_profile = $_POST["sex_profile"];
    $username_profile = $_POST["username_profile"];
    $pwd_profile = $_POST["pwd_profile"];
    $pwd_profile = md5($pwd_profile);


    $sql = "UPDATE tb_user 
        SET user_firstname = '$firstname_profile',
            user_lastname = '$lastname_profile',
            user_address = '$address_profile',
            user_tel = '$tel_profile',
            user_email = '$email_profile',
            user_sex = '$sex_profile',
            user_username = '$username_profile',
            user_password = '$pwd_profile'
        WHERE user_id = '$user_id_profile'
        ";
    $result = $conn->query($sql);
    if ($result == TRUE) {
        echo "success";
    } else {
        echo "error " . $conn->error;
    }
} else {
    echo 'error REQUEST_METHOD ผิดพลาด';
}
?>