<?php

  // Starting the session and require other files
  session_start();
  require_once("includes/db_connection.php");
  require_once("includes/helper_functions.php");

  // Switch from HTTPS to HTTP
  HTTPStoHTTP();



?>

<html>
  <head>
    <title>TopShots - Home</title>
    <link rel="stylesheet" type="text/css" href="css/main.css">
  </head>


  <body>
    <?php
      require("includes/header.php");
    ?>
  </body>

</html>
