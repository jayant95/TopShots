<?php
  // Starting the session and require other files
  session_start();
  require_once("includes/db_connection.php");
  require_once("includes/helper_functions.php");

  // Switch from HTTPS to HTTP
  HTTPStoHTTP();

  $comment = "";
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


  // if form was submitted
  if (isset($_POST["submit"])) {
    $comment = !empty($_POST['comment']) ? $_POST['comment'] : "";

    if (!empty(trim($comment))) {
      $info = [];
      $info['username'] = $_SESSION['username'];
      $info['gameID'] = $gameID;
      $info['comment'] = $comment;
      $info['timestamp'] = time();
      insertGameDetailComment($info, $connection);
    }

  }

?>

<html>
  <head>
    <title>Gamedetail Page</title>
    <link rel="stylesheet" type="text/css" href="css/main.css">

  </head>

  <body>
    <?php
      require("includes/header.php");
    ?>


	<form action="" method="post">

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
    // Retrieve comments on page
    $sql = "SELECT username, description, timestamp ";
    $sql .= "FROM comments ";
    $sql .= "WHERE gameID = ?";
    $stmt2=$db->prepare($sql);
    $stmt2->bind_param('i',$gameID);
    $stmt2->execute();
    $stmt2->store_result();
    $result2=$stmt2->bind_result($username, $description, $timestamp);

    echo "<div class='comment-section'>";
    while($stmt2->fetch()){
      //echo(date("Y-m-d",$timestamp));

      $date = date("Y-m-d", $timestamp);
      echo "<div class='comment'>";
      echo "<p><strong>$username</strong></p>";
      echo "<p>$date</p>";
      echo "<p>$description</p>";
      echo "</div>";
    }
    echo "</div>";


    if (!empty($_SESSION['username'])) {
      echo "<textarea name='comment' rows='4' columns='50' placeholder='Write a comment'></textarea>";
      echo "<input type='submit' name='submit' value='Submit'/>";
    } else {
      echo "<p>Please login to add a comment</p>";
    }
    ?>



  <form>

  </body>

</html>
