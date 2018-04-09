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
      <div class='home-content'>
        <div class='main-content'>
          <h2>Welcome!</h2>
          <p class="intro">Welcome to TopShots! Our website offers NBA Statistics from the 2016-2017 season. Our website timeline
            takes place on Februrary 1, 2017 so we can showcase the previous day and the next day games. You are able to
            see who won and look at the stats for the game. You can also view your favourite players and see their season
            stats. We also offer the team rankings. You are also able to follow your favourite players and their twitter feed will be displayed on your homepage.
            <?php
              if (empty($_SESSION['username'])) {
                echo "Feel free to create an account <a class='text-links' href='register.php'>here</a> or <a class='text-links' href='login.php'>login</a> to discuss with fellow members about your favourite players and recent games and get started!";
              }
            ?>
          </p>
    <?php
      if (!empty($_SESSION['username'])) {
        echo "<h2>Following</h2>";
        $user['username'] = $_SESSION['username'];
        $result = getFollowingList($user, $connection);
        echo "<ul class='following-list'>";
        if (mysqli_num_rows($result) > 0) {
          while ($list = mysqli_fetch_assoc($result)) {
            echo "<div class='following'>";
            echo "<li><a href='playerdetail.php?playerID=".$list['playerid']."&playerteam=".$list['playerTeam']."'>".$list['playername']."</a></li>";
            $twitterLink = $list['twitter'];
            if ($twitterLink) {
              echo "<a class='twitter-timeline' data-tweet-limit='1' data-width='250' data-link-color='#E81C4F' href=".$twitterLink.">Tweets</a> <script async src='https://platform.twitter.com/widgets.js' charset='utf-8'></script>";
            }
            echo "</div>";
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
            echo "<div class='comment'>";
            if ($comment['gameID'] != 0) {
              echo "<li><a href='gamedetail.php?gameID=".$comment['gameID']."'>".$comment['description']."</a></li>";
            } else {
              echo "<li><a href='playerdetail.php?playerID=".$comment['playerID']."&playerteam=".$comment['playerTeam']."'>".$comment['description']."</a></li>";
            }
            echo "</div>";
          }
        } else {
          echo "<p>You have not commented</p>";
        }

        echo "</ul>";
      }

      echo "</div>";

    ?>
    <div class="twitter-sidebar">
      <a class="twitter-timeline" data-height="800" data-link-color="#E81C4F" href="https://twitter.com/NBA?ref_src=twsrc%5Etfw">Tweets by NBA</a> <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
    </div>

    </div>

  </body>

</html>
