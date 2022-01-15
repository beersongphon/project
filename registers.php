<?php
session_start();
include("./urldomain.php");
date_default_timezone_set('Asia/Bangkok');
include("./connect.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstname_regis = $_POST["firstname_regis"];
    $lastname_regis = $_POST["lastname_regis"];
    $username_regis = $_POST["username_regis"];
    $pwd_regis = $_POST["pwd_regis"];
    $address_regis = $_POST["address_regis"];
    $tel_regis = $_POST["tel_regis"];
    $sex_regis = $_POST["sex_regis"];
    $pwd_regis = md5($pwd_regis);


    $sql_chk = "SELECT * FROM tb_user WHERE user_username = '$username_regis'";
    $result_chk = mysqli_query($conn, $sql_chk);
    if (mysqli_num_rows($result_chk) == 0) {
        $sql = "INSERT INTO tb_user (user_username,
        user_password,
        user_firstname,
        user_lastname,
        user_address,
        user_time_progress,
        user_sex,
        user_tel,
        user_permission) 
      VALUES ('$username_regis',
        '$pwd_regis',
        '$firstname_regis',
        '$lastname_regis',
        '$address_regis',
        '0',
        '$sex_regis',
        '$tel_regis',
        'U')";

        if ($conn->query($sql) == TRUE) {
            echo "success";
        } else {
            echo "error " . $conn->error;
        }
    } else {
        echo "already";
    }
}
