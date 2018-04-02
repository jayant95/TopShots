<?php
  // Starting the session and require other files
  session_start();
  require_once("includes/helper_functions.php");

  // Switch from HTTPS to HTTP
  HTTPStoHTTP();

?>

<html>
  <head>
    <title>Schedule Page</title>
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

  		$date='';
  		if($_GET['date']!=null){
  			$date=$_GET['date'];
  		}
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
	<h1>Schedule</h1>
	<ul>
		<li><a href="schedule.php?date=2017-01-31">Last day</a></li>
		<li><a href="schedule.php?date=2017-02-01">Today</a></li>
		<li><a href="schedule.php?date=2017-02-02">Next day</a></li>
	</ul>

	<table>
		<?php
			$query="SELECT gameID,hometeam,guestteam,hometeamScore,guestteamScore,data FROM games WHERE data=?";
			$stmt=$db->prepare($query);
			$stmt->bind_param('s',$date);
			$stmt->execute();
			$stmt->store_result();
			$result=$stmt->bind_result($gameID,$hometeam,$guestTeam,$hometeamScore,$guestteamScore,$date);
			while($stmt->fetch()){
				echo "<tr><a href='gamedetail.php?gameID=".$gameID."'>".$hometeam."    ".$hometeamScore."   :  ".$guestteamScore."    ".$guestTeam."</a></tr><br>";
			}
		?>

	</table>
	</form>
  </body>

</html>
