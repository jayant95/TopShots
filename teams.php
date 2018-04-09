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

    <div class="page-content">

       	<h1>Teams</h1>
        <h2 class="conference-header">Eastern Conference</h2>
        <h2 class="conference-header">Western Conference</h2>
    	<div class="team-list">


      	<table class="conference-teams">

      		<tr><th>Team</th><th class="team-rank">Wins</th><th class="team-rank">Losses</th></tr>
      		<?php
            // Get Eastern Conference
            getTeamByConference("East", $db);
          ?>

      	</table>
        <table class="conference-teams">
      		<tr><th>Team</th><th class="team-rank">Wins</th><th class="team-rank">Losses</th></tr>
      		<?php
            // Get Eastern Conference
            getTeamByConference("West", $db);
          ?>

      	</table>
    	</div>

  </div>
  </body>

</html>
