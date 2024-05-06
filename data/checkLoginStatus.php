<?php

  session_start();

  $id = $_GET['id'];

  if (isset($_SESSION["customer"])) {
    header("Location: ../views/seat-selection.php?id=$id");
  } else {
    header("Location: ../views/login.php");
  }
