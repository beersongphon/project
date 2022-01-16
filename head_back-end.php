<?php
session_start();
include("./urldomain.php");
include('./connect.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Required meta tags-->
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="au theme template">
  <meta name="author" content="Hau Nguyen">
  <meta name="keywords" content="au theme template">

  <!-- Title Page-->
  <title><?php echo $toptitle; ?></title>

  <!-- Fontfaces CSS-->
  <link href="./assets/back-end/css/font-face.css" rel="stylesheet" media="all">
  <link href="./assets/back-end/vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
  <link href="./assets/back-end/vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
  <link href="./assets/back-end/vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <!-- Bootstrap CSS-->
  <link href="./assets/back-end/vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet">

  <!-- Vendor CSS-->
  <link href="./assets/back-end/vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
  <link href="./assets/back-end/vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
  <link href="./assets/back-end/vendor/wow/animate.css" rel="stylesheet" media="all">
  <link href="./assets/back-end/vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
  <link href="./assets/back-end/vendor/slick/slick.css" rel="stylesheet" media="all">
  <link href="./assets/back-end/vendor/select2/select2.min.css" rel="stylesheet" media="all">
  <link href="./assets/back-end/vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">

  <!-- Main CSS-->
  <link href="./assets/back-end/css/theme.css" rel="stylesheet" media="all">

  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body class="animsition">