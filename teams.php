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
    <title>Teams Page</title>
    <link rel="stylesheet" type="text/css" href="css/main.css">
  </head>

  <body>
    <?php
      require("includes/header.php");
    ?>


	<form action="" method="post">

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
