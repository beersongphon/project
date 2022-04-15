<?php
session_start();
include("./../urldomain.php");
date_default_timezone_set('Asia/Bangkok');
include("./../connect.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstname_regis = $_POST["firstname_regis"];
    $lastname_regis = $_POST["lastname_regis"];
    $address_regis = $_POST["address_regis"];
    $tel_regis = $_POST["tel_regis"];
    $email_regis = $_POST["email_regis"];
    $sex_regis = $_POST["sex_regis"];
    $username_regis = $_POST["username_regis"];
    $pwd_regis = $_POST["pwd_regis"];
    $pwd_regis = md5($pwd_regis);

    // check duplicate email
    $sql_chk = "SELECT * FROM tb_user WHERE user_username = '$username_regis'";
    $result = $conn->query($sql_chk);
    if ($result->num_rows > 0) {
        echo "already";
        exit();
    }

    // insert data
    $sql = "INSERT INTO tb_user (user_firstname, 
        user_lastname, 
        user_address, 
        user_tel, 
        user_email, 
        user_sex, 
        user_username, 
        user_password, 
        permission_id) 
      VALUES ('$firstname_regis',
        '$lastname_regis',
        '$address_regis',
        '$tel_regis',
        '$email_regis',
        '$sex_regis',
        '$username_regis',
        '$pwd_regis', 
        '3')";
    $result = $conn->query($sql);
    if ($result == TRUE) {
        echo "success";
    } else {
        echo "error " . $conn->error;
    }
} else {
    echo 'error REQUEST_METHOD ผิดพลาด';
}

