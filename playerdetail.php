<?php
  // Starting the session and require other files
  session_start();
  require_once("includes/db_connection.php");
  require_once("includes/helper_functions.php");

  // Switch from HTTPS to HTTP
  HTTPStoHTTP();

  $playerteam=$_GET['playerteam'];
  $playerID=$_GET['playerID'];
  $db=new mysqli('localhost','root','','topshots');
  if(mysqli_connect_errno()){
  echo '<p>Error: Could not connect to database.<br/> Please try again later. </p>';
  exit;
  }
  $query="SELECT id,name, team,age,points,assists,rebounds,minutes,gamesPlayed,wins,losses,fgAttempted,fgPercentage,3PM,3PA,3Ppercentage,ftMade,ftAttempted,ftPercentage,offRebounds,defRebounds,turnovers,steals,blocks,fouls,plusMinus FROM players WHERE id=?";
  $stmt=$db->prepare($query);
  $stmt->bind_param('i',$playerID);
  $stmt->execute();
  $stmt->store_result();
  $result=$stmt->bind_result($playerID,$playername, $team,$age,$points,$assists,$rebounds,$minutes,$gamesPlayed,$wins,$losses,$fgAttempted,$fgPercentage,$PM,$PA,$Ppercentage,$ftMade,$ftAttempted,$ftPercentage,$offRebounds,$defRebounds,$turnovers,$steals,$blocks,$fouls,$plusMinus);

  // if form was submitted
  if (isset($_POST["submit"])) {
    $comment = !empty($_POST['comment']) ? $_POST['comment'] : "";
    if (!empty(trim($comment))) {
      $info = [];
      $info['username'] = $_SESSION['username'];
      $info['playerID'] = $playerID;
      $info['comment'] = $comment;
      $info['timestamp'] = time();
      $info['playerTeam'] = $playerteam;
      insertPlayerDetailComment($info, $connection);
    }

  }

  if (isset($_POST["follow"])) {
    $info = [];
    $info['username'] = $_SESSION['username'];
    $info['playerID'] = $playerID;
    $info['playerTeam'] = $playerteam;
    $info['playerName'] = "";

    $result = getPlayerNameAndTwitter($info, $connection);

    while ($name = mysqli_fetch_assoc($result)) {
        $info['playerName'] = $name['name'];
        $info['twitter'] = $name['twitter'];
    }
    insertPlayerFollow($info, $connection);
  }

  if (isset($_POST["unfollow"])) {
    $info = [];
    $info['username'] = $_SESSION['username'];
    $info['playerID'] = $playerID;
    removePlayerFollow($info, $connection);
  }

?>

<html>
  <head>
    <title>Teams Detail Page</title>
    <link rel="stylesheet" type="text/css" href="css/main.css">

  </head>

  <body>
    <?php
      require("includes/header.php");
    ?>

    <div class="stattitle">
        <table>

          <?php

            while($stmt->fetch()){
              echo "<h1 class='playername'>".$playername."</h1><p>  <".$age.">  ".$team."</p>";
              echo "<tr><th>Points</th><th class='playerstat'>Assists</th><th class='playerstat'>Rebounds</th><th class='playerstat'>Play time</th><th class='playerstat'>fgAttempted</th><th class='playerstat'>fgPercentage</th><th class='playerstat'>3PM</th><th class='playerstat'>3PA</th><th class='playerstat'>3Percetage</th></tr>";

              echo "<tr><td class='playerstat'>".$points."</td><td class='playerstat'>".$assists."</td><td class='playerstat'>".$rebounds."</td><td class='playerstat'>".$minutes."</td><td class='playerstat'>".$fgAttempted."</td><td class='playerstat'>".$fgPercentage."</td><td class='playerstat'>".$PM."</td><td class='playerstat'>".$PA."</td><td class='playerstat'>".$Ppercentage."</td></tr>";

              echo "<tr><th>ftMade</th><th class='playerstat'>ftAttempted</th><th class='playerstat'>ftPercentage</th><th class='playerstat'>offRebounds</th><th class='playerstat'>defRebounds</th><th class='playerstat'>turnovers</th><th class='playerstat'>steals</th><th class='playerstat'>blocks</th><th class='playerstat'>fouls</th><th class='playerstat'>plusMinus</th></tr>";
              echo "<tr><td class='playerstat'>".$ftMade."</td><td class='playerstat'>".$ftAttempted."</td><td class='playerstat'>".$ftPercentage."</td><td class='playerstat'>".$offRebounds."</td><td class='playerstat'>".$defRebounds."</td><td class='playerstat'>".$turnovers."</td><td class='playerstat'>".$steals."</td><td class='playerstat'>".$blocks."</td><td class='playerstat'>".$fouls."</td><td class='playerstat'>".$plusMinus."</td></tr>";
            }
          ?>

        </table>
      </div>


      <div class="page-content">

      	<form action="" method="post">



        <form>
          <?php
          if (!empty($_SESSION['username'])) {
            $user = [];
            $user['username'] = $_SESSION['username'];
            $user['playerID'] = $playerID;
            if (isPlayerFollowing($user, $connection)) {
              echo "<input type='submit' name='unfollow' value='Unfollow'/>";
            } else {
              echo "<input type='submit' name='follow' value='Follow'/>";
            }
          }
          ?>
        </form>
        <div class="leftcontent">

        	<h2>games</h2>
        		<?php

        			$query2="SELECT gameID,hometeam,guestteam,hometeamScore,guestteamScore,data FROM games WHERE hometeam=? OR guestteam=?";
        			$stmt2=$db->prepare($query2);
        			$stmt2->bind_param('ss',$playerteam,$playerteam);
        			$stmt2->execute();
        			$stmt2->store_result();
        			$result2=$stmt2->bind_result($gameID,$hometeam,$guestTeam,$hometeamScore,$guestteamScore,$date);
        			while($stmt2->fetch()){
        				echo "<tr><a href='gamedetail.php?gameID=".$gameID."'>".$hometeam."    ".$hometeamScore."   :  ".$guestteamScore."    ".$guestTeam."</a></tr><br>";
        			}


        		?>
        	</form>
        
        </div>
        <div class="rightcontent">

          <form action="playerDetail.php?playerID=<?php echo "$playerID&playerteam=$playerteam"?>" method="post">
            <h2>Discussion</h2>

            <?php
            //Retrieve comments on page
            $sql = "SELECT username, description, timestamp ";
            $sql .= "FROM comments ";
            $sql .= "WHERE playerID = ?";
            $stmt2=$db->prepare($sql);
            $stmt2->bind_param('i',$playerID);
            $stmt2->execute();
            $stmt2->store_result();
            $result2=$stmt2->bind_result($username, $description, $timestamp);

            echo "<div class='comment-section'>";
            while($stmt2->fetch()){
              //echo(date("Y-m-d",$timestamp));

              $date = date("Y-m-d", $timestamp);
              echo "<div class='comment'>";
              echo "<p><strong>$username</strong></p>";
              echo "<p>$date</p>";
              echo "<p>$description</p>";
              echo "</div>";
            }
            echo "</div>";


            if (!empty($_SESSION['username'])) {
              echo "<textarea name='comment' rows='4' columns='50' placeholder='Write a comment'></textarea>";
              echo "<input type='submit' name='submit' value='Submit'/>";
            } else {
              echo "<p>Please login to add a comment</p>";
            }
            ?>


       
          </form>
        </div>
      </div>

    <?php
      mysqli_close($connection);
     ?>
  </body>

</html>
