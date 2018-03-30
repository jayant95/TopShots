<?php
  DEFINE("DB_USER", "root");
  DEFINE("DB_PASS", "");
  DEFINE("DB_NAME", "topshots");
  DEFINE("DB_SERVER", "localhost");

  $connection = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);

  if (mysqli_connect_errno()) {
    die("Database connection failed: " .
    mysqli_connect_error() .
    " (" . mysqli_connect_errno(). ")");
  }
?>
