<?php

session_start();

$seats = $_GET["ids"];

// $message = "php file is running";
// file_put_contents('log.txt', $message, FILE_APPEND);

if (isset($seats)) {
  $message = "inner php file is running";
  file_put_contents('log.txt', $message, FILE_APPEND);
  echo "ana da5lt ahoo ya pito";
  $_SESSION['seats'] = $seats;
  header('Location: ../views/Payment.html');
}
