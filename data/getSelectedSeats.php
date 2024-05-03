<?php

session_start();

$seats = json_decode($_POST['seats']);

$message = "php file is running";
file_put_contents('log.txt', $message, FILE_APPEND);

if (isset ($seats)) {
  $message = "inner php file is running";
  file_put_contents('log.txt', $message, FILE_APPEND);

  $_SESSION['seats'] = $seats;
  header('Location: ../views/Payment.html');
}
