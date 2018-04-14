<?php
  // Starting the session and require other files
  session_start();
  require_once("includes/helper_functions.php");

  // Switch from HTTPS to HTTP
  HTTPStoHTTP();
  // Get team ID from URL (GEt request)
  $name='';
  $teamID=$_GET['teamID'];
  $db=new mysqli('localhost','root','','topshots');
  if(mysqli_connect_errno()){
    echo '<p>Error: Could not connect to database.<br/> Please try again later. </p>';
    exit;
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
      // Get the team statistics according to team ID
  		$query="SELECT ID,name, wins,losses,w_pct,efg_pct,off_rating,def_rating,ast_pct,ast_to,shortname FROM teams WHERE ID=?";
  		$stmt=$db->prepare($query);
  		$stmt->bind_param('i',$teamID);
  		$stmt->execute();
  		$stmt->store_result();
  		$result=$stmt->bind_result($teamID,$teamname, $wins,$losses,$w_pct,$efg_pct,$off_rating,$def_rating,$ast_pct,$ast_to,$shortname);


  	?>
  	<div class="stattitle">
  			<table>
  			<?php
          // Get wins and losses for the team
  				while($stmt->fetch()){
  					echo "<h1>".$teamname."</h1>";
  	  				$name=$teamname;
  	  				echo "		<tr><th class='playerstat1'>Wins</th><th class='playerstat'>Losses</th><th class='playerstat'>w_pct</th><th class='playerstat'>efg_pct</th><th class='playerstat'>off_rating</th><th class='playerstat'>def_rating</th><th class='playerstat'>ast_pct</th><th class='playerstat'>ast_to</th></tr>";
  					echo "<tr><td class='playerstat'>  ".$wins."  </th><td class='playerstat'>  ".$losses."</th><td class='playerstat'>".$w_pct."  </th><td class='playerstat'>  ".$efg_pct."  </th><td class='playerstat'>  ".$off_rating."  </th><td class='playerstat'>  ".$def_rating."  </th><td class='playerstat'>  ".$ast_pct."  </th><td class='playerstat'>  ".$ast_to."</th></tr>";
  				}
  			?>
  		</table>
  	</div>

    <div class="page-content">
		<form action="" method="post">
			<h2>Players</h2>
			<div class="leftcontent">
				<table>
					<tr><th class='playername'>Player name</th><th class='playerstat'>Age</th><th class='playerstat'>Points</th><th class='playerstat'>Assists</th><th class='playerstat'>Rebounds</th><th class='playerstat'>Play Time</th><th class='playerstat'>Games played</th></tr>
					<?php
            // Get the player list from the team and show the stats
						$query2="SELECT id,name, team,age,points,assists,rebounds,minutes,gamesPlayed FROM players WHERE team=?";
						$stmt2=$db->prepare($query2);
						$stmt2->bind_param('s',$shortname);
						$stmt2->execute();
						$stmt2->store_result();
						$result2=$stmt2->bind_result($playerID,$playername, $teamname,$age,$points,$assists,$rebounds,$minutes,$gamesPlayed);
						while($stmt2->fetch()){
							echo "<tr><td><a href='playerdetail.php?playerID=".$playerID."&playerteam=".$name."'>".$playername." </a> </th><td class='playerstat'>  ".$age."  </th><td class='playerstat'>  ".$points."  </th><td class='playerstat'>  ".$assists."  </th><td class='playerstat'>  ".$rebounds."  </th><td class='playerstat'>  ".$minutes."  </th><td class='playerstat'>  ".$gamesPlayed."</th></tr>";
						}
					?>

				</table>
			</div>
			<div class="rightcontent">
				<h2>Games</h2>
				<table>
					<?php
            // Get the recent games according to that teams schedule
						$query3="SELECT gameID,hometeam,guestteam,hometeamScore,guestteamScore,data FROM games WHERE hometeam=? OR guestteam=?";
						$stmt3=$db->prepare($query3);
						$stmt3->bind_param('ss',$name,$name);
						$stmt3->execute();
						$stmt3->store_result();
						$result3=$stmt3->bind_result($gameID,$hometeam,$guestTeam,$hometeamScore,$guestteamScore,$date);
						while($stmt3->fetch()){
							echo "<tr><a href='gamedetail.php?gameID=".$gameID."'>".$hometeam."    ".$hometeamScore."   :  ".$guestteamScore."    ".$guestTeam."</a></tr><br>";
						}
					?>
				</table>
			</div>
		</form>
	</div>
  </body>

</html>
