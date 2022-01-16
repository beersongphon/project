<?php


  if (isset($_POST["sendmail"])) {
    $name = addslashes($_POST['name']);
    $email = addslashes($_POST['email']);
    $sj = addslashes($_POST['subject']);
    $msg = addslashes($_POST['message']);

    $to = "beersongphon2010@gmail.com";
    $subject = $sj;

    $message = $msg;

    $header = "From : " . $email . " \r\n";
    $header .= "MINE-Version: 1.0\r\n";
    $header .= "Content-type: text/html\r\n";

    $retval = mail($to,$subject,$message,$header);

    if ($retval) {
      echo "ส่ง Email สำเร็จ";
    } else {
      echo "ส่ง Email ไม่สำเร็จ";
    }
  }
  


?>