<?php
  ob_start();
  $timezone = date_default_timezone_set("Asia/Jakarta"); // http://php.net/manual/en/timezones.php

  $con = mysqli_connect("localhost", "root", "auah", "slotify");

  if(mysqli_connect_errno()) {
    echo "Failed to connect: " . mysqli_connect_errno();
  }

?>