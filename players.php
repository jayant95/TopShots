<?php
  // Starting the session and require other files
  session_start();
  require_once("includes/helper_functions.php");

  // Switch from HTTPS to HTTP
  HTTPStoHTTP();

  $db=new mysqli('localhost','root','','topshots');
  if(mysqli_connect_errno()){
       echo '<p>Error: Could not connect to database.<br/> Please try again later. </p>';
       exit;
  }

?>

<html>
  <head>
    <title>Players Page</title>

    <link rel="stylesheet" type="text/css" href="css/main.css">
  </head>

  <body>

    <?php
      require("includes/header.php");
    ?>


	<form action="" method="post">

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
