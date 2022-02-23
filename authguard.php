<?php
session_start();
$user_id = $_SESSION['user_id'];
if($user_id == "") {
  header("location:login.php");
	exit();
}

if($_SESSION['permission_id'] != "1" & $_SESSION['permission_id'] != "2") {
	echo "This page for Admin only!";
	exit();
}	
	

$strSQL = "SELECT * FROM tb_user WHERE user_id = '$user_id' ";
$objQuery = mysqli_query($conn, $strSQL);
$objResult = mysqli_fetch_array($objQuery, MYSQLI_ASSOC);
?>
