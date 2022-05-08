<?php
  session_start(); # กำหนดไว้ กรณีอาจได้ใช้ตัวแปร session
  session_unset();
  session_destroy();
  header("location: ./index.php");	
?>