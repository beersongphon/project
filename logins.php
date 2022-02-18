<?php
session_start();
date_default_timezone_set('Asia/Bangkok');
include("urldomain.php");
if (isset($_POST["usr"])) {
  include("./connect.php");
  $Username = $_POST["usr"];
  $Password = md5($_POST["pwd_login"]);
  $sql = "SELECT * FROM tb_user WHERE user_username = '$Username' AND user_password = '$Password' ";
  $result = mysqli_query($conn, $sql);

  if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_array($result);

    $_SESSION["user_id"] = $row["user_id"];
    $_SESSION["user_firstname"] = $row["user_firstname"];
    $_SESSION["user_lastname"] = $row["user_lastname"];
    $_SESSION["user_address"] = $row["user_address"];
    $_SESSION["user_tel"] = $row["user_tel"];
    $_SESSION["user_email"] = $row["user_email"];
    $_SESSION["user_sex"] = $row["user_sex"];
    $_SESSION["user_username"] = $row["user_username"];
    $_SESSION["permission_id"] = $row["permission_id"];
    $_SESSION["login_timestamp"] = time();
    echo "login_success";
  } else {
    //   echo "<script>";
    echo "alert('Sorry Username or Password something is wrong! \\nTake you back homepage! ');";
    // echo "window.history.back()";
    //   echo "window.location.replace('http://".$domain."/".$url."');";
    //   echo "</script>";
  }
}
