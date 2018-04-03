<?php
  // Starting the session and require other files
  session_start();
  require_once("includes/helper_functions.php");

  // Switch from HTTPS to HTTP
  HTTPStoHTTP();

?>

<html>
  <head>
    <title>Teams Detail Page</title>

    <style type="text/css">
		a{
			text-decoration: none;
			color:black;
		}
		a:hover{
			color:grey;
		}
		ul{
			text-align: center;
			padding-bottom: 10px;
			border-bottom: 2px solid black;
		}
		li{
			display: inline-block;
			width: 20%;
		}
		th{
			width:150px;
		}
		th.teamname{
			width:150px;
		}


	</style>
  </head>

  <body>

    <nav>
      <ul>
        <?php
          // Check if user is logged in
          if (empty($_SESSION['username'])) {
            echo "<li><a href=\"login.php\">Login</a></li>";
          } else {
            echo "<li><a href=\"logout.php\">Logout</a></li>";
          }
        ?>
      </ul>
    </nav>

  	<?php

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

  	?>

	<form action="" method="post">

	<ul>
		<li><a href="teams.php">Teams</a></li>
		<li><a href="players.php">Players</a></li>
		<li><a href="schedule.php?date=2017-02-01">Schedule</a></li>
	</ul>

	<table>
		<tr><th>Player name</th><th>Team</th><th>Age</th><th>Points</th><th>Assists</th><th>Rebounds</th><th>Play time</th><th>Played games</th><th>Wins</th><th>Losses</th><th>fgAttempted</th><th>fgPercentage</th><th>3PM</th><th>3PA</th><th>3Percetage</th><th>ftMade</th><th>ftAttempted</th><th>ftPercentage</th><th>offRebounds</th><th>defRebounds</th><th>turnovers</th><th>steals</th><th>blocks</th><th>fouls</th><th>plusMinus</th></tr>
		<?php

			while($stmt->fetch()){
				echo "<h1>".$playername."</h1>";
				echo "<tr><th>".$playername."</th><th>".$team."</th><th>".$age."</th><th>".$points."</th><th>".$assists."</th><th>".$rebounds."</th><th>".$minutes."</th><th>".$gamesPlayed."</th><th>".$wins."</th><th>".$losses."</th><th>".$fgAttempted."</th><th>".$fgPercentage."</th><th>".$PM."</th><th>".$PA."</th><th>".$Ppercentage."</th><th>".$ftMade."</th><th>".$ftAttempted."</th><th>".$ftPercentage."</th><th>".$offRebounds."</th><th>".$defRebounds."</th><th>".$turnovers."</th><th>".$steals."</th><th>".$blocks."</th><th>".$fouls."</th><th>".$plusMinus."</th></tr>";
			}
		?>

	</table>

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

  <form action="playerDetail.php?playerID=<?php echo "$playerID&playerteam=$playerteam"?>" method="post">
    <h2>Discussion</h2>

    <?php
    // Add code to retrieve comments on page


    if (!empty($_SESSION['username'])) {
      echo "<textarea rows='4' columns='50' placeholder='Write a comment'></textarea>";
      echo "<input type='submit' name='submit' value='Submit'/>";
    } else {
      echo "<p>Please login to add a comment</p>";
    }
    ?>


  <form>
  </body>

</html>
