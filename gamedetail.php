<?php
  // Starting the session and require other files
  session_start();
  require_once("includes/helper_functions.php");

  // Switch from HTTPS to HTTP
  HTTPStoHTTP();

?>

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
		<li><a href="teams.php">Teams</a></li>
		<li><a href="players.php">Players</a></li>
		<li><a href="schedule.php?date=2017-02-01">Schedule</a></li>
	</ul>
	<ul>
		<li><a href="schedule.php?date=2017-01-31">Last day</a></li>
		<li><a href="schedule.php?date=2017-02-01">Today</a></li>
		<li><a href="schedule.php?date=2017-02-02">Next day</a></li>
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

  <form action="gameDetail.php?gameID=<?php echo $gameID?>" method="post">
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
