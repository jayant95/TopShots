<?php
  // Starting the session and require other files
  session_start();
  require_once("includes/helper_functions.php");

  // Switch from HTTPS to HTTP
  HTTPStoHTTP();

?>

<html>
  <head>
    <title>Teams Page</title>
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
 	<h1>Teams</h1>
	<table>
		<tr><th>Team</th><th>Wins</th><th>Losses</th></tr>
		<?php
			$query="SELECT ID,name, wins,losses FROM teams";
			$stmt=$db->prepare($query);

			$stmt->execute();
			$stmt->store_result();
			$result=$stmt->bind_result($teamID,$teamname, $wins,$losses);
			while($stmt->fetch()){
				echo "<tr><th><a href='teamdetail.php?teamID=".$teamID."'>".$teamname." </a> </th><th>  ".$wins."  </th><th>  ".$losses."</th></tr>";
			}
		?>

	</table>
	</form>
  </body>

</html>
