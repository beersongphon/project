<?php
session_start();
date_default_timezone_set("Asia/Bangkok");
include("./urldomain.php");
include('./connect.php');

$strKeyword = null;

if (isset($_POST["txtSearch"])) {
  $strKeyword = $_POST["txtSearch"];
}

if (isset($_SESSION["user_username"])) {
  if ((time() - $_SESSION["login_timestamp"]) > $sessiontime) {
    header("location: logout.php");
  } else {
    if ($_SESSION["permission_id"] == "1" || $_SESSION["permission_id"] == "2") {
      header("Location: /" . $url . "/" . "home.php");
    }
  }
}
?>
<!DOCTYPE html>
<html lang="zxx">
<head>
  <meta charset="UTF-8">
  <meta name="description" content="Ashion Template">
  <meta name="keywords" content="Ashion, unica, creative, html">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title><?php echo $toptitle; ?></title>

  <!-- Favicon-->
  <link rel="icon" type="image/x-icon" href="./assets/img/favicon.ico" />

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  
  <!-- Google Font -->
  <link href="https://fonts.googleapis.com/css2?family=Cookie&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Finger+Paint&family=Petemoss&display=swap" rel="stylesheet">

  <!-- Css Styles -->
  <link rel="stylesheet" href="./assets/front-end/css/bootstrap.min.css" type="text/css">
  <link rel="stylesheet" href="./assets/front-end/css/font-awesome.min.css" type="text/css">
  <link rel="stylesheet" href="./assets/front-end/css/elegant-icons.css" type="text/css">
  <link rel="stylesheet" href="./assets/front-end/css/jquery-ui.min.css" type="text/css">
  <link rel="stylesheet" href="./assets/front-end/css/magnific-popup.css" type="text/css">
  <link rel="stylesheet" href="./assets/front-end/css/owl.carousel.min.css" type="text/css">
  <link rel="stylesheet" href="./assets/front-end/css/slicknav.min.css" type="text/css">
  <link rel="stylesheet" href="./assets/css/style.css" type="text/css">
</head>
<body>