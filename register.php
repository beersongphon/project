<?php
session_start();
include("urldomain.php");
date_default_timezone_set('Asia/Bangkok');
include("connection.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstname_regis = $_POST["firstname_regis"];
    $lastname_regis = $_POST["lastname_regis"];
    $username_regis = $_POST["username_regis"];
    $pwd_regis = $_POST["pwd_regis"];
    $idcard_regis = $_POST["idcard_regis"];
    $tel_regis = $_POST["tel_regis"];
    $sex_regis = $_POST["sex_regis"];
    $pwd_regis = md5($pwd_regis);


    $sql_chk = "SELECT * FROM member WHERE member_user = '" . $username_regis . "'";
    $result_chk = mysqli_query($con, $sql_chk);
    if (mysqli_num_rows($result_chk) == 0) {
        $sql = "INSERT INTO member (member_user,
        member_pass,
        member_name,
        member_lastname,
        member_idcard,
        member_time_progress,
        member_sex,
        member_tel,
        member_permission) 
      VALUES ('" . $username_regis . "',
       '" . $pwd_regis . "',
        '" . $firstname_regis . "',
        '" . $lastname_regis . "',
        '" . $idcard_regis . "',
        0,
        " . $sex_regis . ",
        '" . $tel_regis . "',
        'U')";

        if ($con->query($sql) == TRUE) {
            echo "success";
        } else {
            echo "error " . $con->error;
        }
    } else {
        echo "already";
    }
}
