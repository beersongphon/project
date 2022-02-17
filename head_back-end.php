<?php
session_start();
include("./urldomain.php");
include('./connect.php');

// $user_id = $_SESSION['user_id'];
// if($user_id == "") {
//   header("location:login.php");
// 	exit();
// }

// if($_SESSION['permission_id'] != "1" & $_SESSION['permission_id'] != "2") {
// 	echo "This page for Admin only!";
// 	exit();
// }	
	

// $strSQL = "SELECT * FROM tb_user WHERE user_id = '$user_id' ";
// $objQuery = mysqli_query($conn, $strSQL);
// $objResult = mysqli_fetch_array($objQuery, MYSQLI_ASSOC);
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

  <!-- <link rel="stylesheet" href="./assets/back-end/mazer/dist/assets/vendors/fontawesome/all.min.css"> -->
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>

  <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>  
  <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>  
  <link rel="stylesheet" href="http://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">   -->
</head>
<body>