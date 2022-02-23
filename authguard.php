<?php
if (isset($_SESSION["user_username"])) {
} else {
  if($_SESSION['permission_id'] != "1" & $_SESSION['permission_id'] != "2") {
    header("location: ./index.php");
    exit();
  }
}
?>
