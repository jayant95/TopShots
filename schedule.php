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
      // Get the date from URL (GET request)
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
 	<div class="page-content">
		<form action="" method="post">
			<h1>Schedule</h1>
			<ul class="datelist">
				<li class="datelist"><a href="schedule.php?date=2017-01-31">Jan 31</a></li>
				<li class="datelist"><a href="schedule.php?date=2017-02-01">Feb 1</a></li>
				<li class="datelist"><a href="schedule.php?date=2017-02-02">Feb 2</a></li>
			</ul>

			<table class="games">
				<?php

          // Show the games according to the date passed
					showGamesByDate($date,$db);
				?>

			</table>
		</form>
	</div>
  </body>

</html>
