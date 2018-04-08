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
    <link rel="stylesheet" type="text/css" href="css/main.css">
  </head>

  <body>
    <?php
      require("includes/header.php");
    ?>

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
