<?php
if (isset($_FILES['file']['name'])) {
  $filename = $_FILES['file']['name'];
  $filename = (string) (time() + rand(10, 10000000)) . $filename;
  $location = getcwd() . "/pay/" . $filename;
  $location = "pay/";
  $target_file = $location . $filename;
  if (move_uploaded_file($_FILES['file']['tmp_name'], $location)) {
    echo $filename;
  } else {
    echo 'error ', $filename, ' ', $location;
  }
}
