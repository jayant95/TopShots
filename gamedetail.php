<html>
  <head>
    <title>Gamedetail Page</title>
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
  		
  		$gameID=$_GET['gameID'];

  		$db=new mysqli('localhost','root','','topshots');
  		if(mysqli_connect_errno()){
			echo '<p>Error: Could not connect to database.<br/> Please try again later. </p>';
			exit;	
		}
		$query="SELECT hometeam,guestteam,hometeamScore,guestteamScore,data FROM games WHERE gameID=?";
		$stmt=$db->prepare($query);
		$stmt->bind_param('i',$gameID);
		$stmt->execute();
		$stmt->store_result();
		$result=$stmt->bind_result($hometeam,$guestTeam,$hometeamScore,$guestteamScore,$date);

  	?>

	<form action="" method="post">

	<ul>
		<li><a href="schedule_page.php?date=2017-01-31">Last day</a></li>
		<li><a href="schedule_page.php?date=2017-02-01">Today</a></li>
		<li><a href="schedule_page.php?date=2017-02-02">Next day</a></li>
	</ul>

	
	<?php 
		while($stmt->fetch()){
			echo "<h1>".$hometeam."    ".$hometeamScore."   :  ".$guestteamScore."    ".$guestTeam."</h1>";
		}
	?>

	<table>
		<tr><th>Player Name</th><th>Points</th><th>Assists</th><th>Rebounds</th><th>Playtime</th></tr>
		<?php
		
			$query2="SELECT playerName,points,assists,rebounds,playtime FROM gameDetail WHERE gameID=?";
			$stmt2=$db->prepare($query2);
			$stmt2->bind_param('i',$gameID);
			$stmt2->execute();
			$stmt2->store_result();
			$result2=$stmt2->bind_result($playerName,$points,$assists,$rebounds,$playtime);
			while($stmt2->fetch()){
				echo "<tr><th>".$playerName." </th> <th>  ".$points."  </th> <th>   ".$assists."  </th> <th>   ".$rebounds."</th><th>".$playtime."</th></tr>";
			}
		?>

	</table>


	</form>
  </body>

</html>