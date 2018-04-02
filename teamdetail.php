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
			width:100px;
		}
		th.teamname{
			width:150px;
		}


	</style>
  </head>

  <body>

  	<?php
  		$name='';
  		$teamID=$_GET['teamID'];
  		$db=new mysqli('localhost','root','','topshots');
  		if(mysqli_connect_errno()){
			echo '<p>Error: Could not connect to database.<br/> Please try again later. </p>';
			exit;	
		}
		$query="SELECT ID,name, wins,losses,w_pct,efg_pct,off_rating,def_rating,ast_pct,ast_to,shortname FROM teams WHERE ID=?";
		$stmt=$db->prepare($query);
		$stmt->bind_param('i',$teamID);
		$stmt->execute();
		$stmt->store_result();
		$result=$stmt->bind_result($teamID,$teamname, $wins,$losses,$w_pct,$efg_pct,$off_rating,$def_rating,$ast_pct,$ast_to,$shortname);


  	?>

	<form action="" method="post">

	<ul>
		<li><a href="teams.php">Teams</a></li>
		<li><a href="players.php">Players</a></li>
		<li><a href="schedule.php?date=2017-02-01">Schedule</a></li>
	</ul>
  	
  	<?php 

		while($stmt->fetch()){
  			echo "<h1>".$teamname."</h1>";
  			$name=$teamname;
  		}
  	 ?>
	<table>
		<tr><th>Team</th><th>Wins</th><th>Losses</th><th>w_pct</th><th>efg_pct</th><th>off_rating</th><th>def_rating</th><th>ast_pct</th><th>ast_to</th></tr>
		<?php 

			while($stmt->fetch()){
				echo "<tr><th class='teamname'><a href='teamdetail.php?teamID=".$teamID."'>".$teamname." </a> </th><th>  ".$wins."  </th><th>  ".$losses."</th><th>".$w_pct."  </th><th>  ".$efg_pct."  </th><th>  ".$off_rating."  </th><th>  ".$def_rating."  </th><th>  ".$ast_pct."  </th><th>  ".$ast_to."</th></tr>";
			}
		?>

	</table>

	<h2>players</h2>

	<table>

		<tr><th>Player name</th><th>Age</th><th>Points</th><th>Assists</th><th>Rebounds</th><th>Play Time</th><th>Games played</th></tr>

		<?php 
			$query2="SELECT id,name, team,age,points,assists,rebounds,minutes,gamesPlayed FROM players WHERE team=?";
			$stmt2=$db->prepare($query2);
			$stmt2->bind_param('s',$shortname);
			$stmt2->execute();
			$stmt2->store_result();
			$result2=$stmt2->bind_result($playerID,$playername, $teamname,$age,$points,$assists,$rebounds,$minutes,$gamesPlayed);
			while($stmt2->fetch()){
				echo "<tr><th><a href='playerdetail.php?playerID=".$playerID."&playerteam=".$name."'>".$playername." </a> </th><th>  ".$age."  </th><th>  ".$points."  </th><th>  ".$assists."  </th><th>  ".$rebounds."  </th><th>  ".$minutes."  </th><th>  ".$gamesPlayed."</th></tr>";

			}
		?>

	</table>

	<h2>games</h2>
	<table>


		<?php

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
	</form>
  </body>

</html>