<?php
session_start();
date_default_timezone_set('Asia/Bangkok');
include("urldomain.php");
if (isset($_POST["usr"])) {
  include("./connect.php");
  $Username = $_POST["usr"];
  $Password = md5($_POST["pwd_login"]);
  $sql = "SELECT * FROM member Where member_user ='" . $Username . "' and member_pass ='" . $Password . "' ";
  $result = mysqli_query($conn, $sql);

  if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_array($result);

    $_SESSION["memberid_badminton"] = $row["member_id"];
    $_SESSION["username_badminton"] = $row["member_tel"];
    $_SESSION["member_user"] = $row["member_user"];
    $_SESSION["lastname_badminton"] = $row["member_pass"];
    $_SESSION["permission_badminton"] = $row["member_permission"];
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
