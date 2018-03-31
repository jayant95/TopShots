<?php
  // Starting the session
  session_start();

  // Unset the session variables and redirect back to login
  unset($_SESSION['username']);
  unset($_SESSION['email']);
  unset($_SESSION['last-login']);
  header("Location: login.php");
?>
