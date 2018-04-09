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

      if (!empty($_SESSION['username'])) {
        echo "<h2>Following</h2>";
        $user['username'] = $_SESSION['username'];
        $result = getFollowingList($user, $connection);
        echo "<ul class='following-list'>";
        if (mysqli_num_rows($result) > 0) {
          while ($list = mysqli_fetch_assoc($result)) {
            echo "<li><a href='playerdetail.php?playerID=".$list['playerid']."&playerteam=".$list['playerTeam']."'>".$list['playername']."</a></li>";
          }
        } else {
          echo "<p>You are not following any players</p>";
        }

        echo "</ul>";
        mysqli_free_result($result);

        echo "<h2>Recent Comments</h2>";
        echo "<ul class='comment-list'>";
        $comments = getRecentCommentList($user, $connection);
        if (mysqli_num_rows($comments) > 0) {
          while ($comment = mysqli_fetch_assoc($comments)) {
            if ($comment['gameID'] != 0) {
              echo "<li><a href='gamedetail.php?gameID=".$comment['gameID']."'>".$comment['description']."</a></li>";
            } else {
              echo "<li><a href='playerdetail.php?playerID=".$comment['playerID']."&playerteam=".$comment['playerTeam']."'>".$comment['description']."</a></li>";
            }
          }
        } else {
          echo "<p>You have not commented</p>";
        }

        echo "</ul>";
      }




    ?>
  </body>

</html>
