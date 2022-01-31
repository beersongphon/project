<?php
session_start();
include("./urldomain.php");
include('./connect.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $toptitle; ?></title>

  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Finger+Paint&family=Petemoss&display=swap" rel="stylesheet">
  
  <link rel="stylesheet" href="./assets/back-end/mazer/dist/assets/css/bootstrap.css">
  <!-- <link rel="stylesheet" href="./assets/css/bootstrap.css"> -->

  <link rel="stylesheet" href="./assets/back-end/mazer/dist/assets/vendors/iconly/bold.css">

  <link rel="stylesheet" href="./assets/back-end/mazer/dist/assets/vendors/perfect-scrollbar/perfect-scrollbar.css">
  <link rel="stylesheet" href="./assets/back-end/mazer/dist/assets/vendors/bootstrap-icons/bootstrap-icons.css">
  <link rel="stylesheet" href="./assets/back-end/mazer/dist/assets/css/app.css">
  <link rel="shortcut icon" href="./assets/back-end/mazer/dist/assets/images/favicon.svg" type="image/x-icon">

  <link rel="stylesheet" href="./assets/back-end/mazer/dist/assets/vendors/fontawesome/all.min.css">
</head>
<body>