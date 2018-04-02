<html>
  <head>
    <title>Players Page</title>
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

	</style>
  </head>

  <body>

  	<?php
  		

  		$db=new mysqli('localhost','root','','topshots');
  		if(mysqli_connect_errno()){
			echo '<p>Error: Could not connect to database.<br/> Please try again later. </p>';
			exit;	
		}

  	?>
 
	<form action="" method="post">

	<ul>
		<li><a href="teams.php">Teams</a></li>
		<li><a href="players.php">Players</a></li>
		<li><a href="schedule.php?date=2017-02-01">Schedule</a></li>
	</ul>
 	<h1>Players</h1>
	<table>
		<tr><th>Player</th><th>Age</th><th>Team</th><th>Points</th><th>Assists</th><th>Rebounds</th></tr>
		<?php 
			$query="SELECT players.id,players.name, players.team,players.age,players.points,players.assists,players.rebounds, teams.name, teams.shortname FROM players JOIN teams WHERE teams.shortname=players.team  ORDER BY points DESC";
			$stmt=$db->prepare($query);
		
			$stmt->execute();
			$stmt->store_result();
			$result=$stmt->bind_result($id,$name, $team,$age,$points,$assists,$rebounds,$teamname,$shortname);
			while($stmt->fetch()){
				echo "<tr><th><a href='playerdetail.php?playerID=".$id."&playerteam=".$teamname."'>".$name." </a> </th><th>  ".$age."  </th><th>  ".$team."  </th><th>  ".$points."  </th><th>  ".$assists."  </th><th>  ".$rebounds."</th></tr>";
			}
		?>

	</table>
	</form>
  </body>

</html>