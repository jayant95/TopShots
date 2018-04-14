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
  <div class="page-content">

  	<form action="" method="post">


   	<h1>Season Leaders</h1>

    <div class="topplayer">
      <h2>Points Per Game</h2>
  	  <table class="topplayer">

    		<tr><th class="playername">Player</th><th class="playerstat">Points</th></tr>
    		<?php
          // Get the top 5 points ranking
    			$query="SELECT players.id,players.name,players.points,teams.name FROM players JOIN teams WHERE teams.shortname=players.team  ORDER BY points DESC Limit 5";
    			$stmt=$db->prepare($query);

    			$stmt->execute();
    			$stmt->store_result();
    			$result=$stmt->bind_result($id,$name,$points,$teamname);
    			while($stmt->fetch()){
    				echo "<tr><td><a href='playerdetail.php?playerID=".$id."&playerteam=".$teamname."'>".$name." </a> </td><td class='team-rank'>  ".$points."  </td></tr>";
    			}
    		?>


  	 </table>
      <a class="wholerank" href="allplayers.php?id=1">-view all-</a>
    </div>
    <div class="topplayer">
      <h2>Assists Per Game</h2>
      <table class="topplayer">

        <tr><th class="playername">Player</th><th class="playerstat">Assists</th></tr>
        <?php
          // Get the top 5 assists ranking
          $query2="SELECT players.id,players.name,players.assists,teams.name FROM players JOIN teams WHERE teams.shortname=players.team  ORDER BY assists DESC Limit 5";
          $stmt2=$db->prepare($query2);

          $stmt2->execute();
          $stmt2->store_result();
          $result2=$stmt2->bind_result($id,$name,$assists,$teamname);
          while($stmt2->fetch()){
            echo "<tr><td><a href='playerdetail.php?playerID=".$id."&playerteam=".$teamname."'>".$name." </a> </td><td class='team-rank'>  ".$assists."  </td></tr>";
          }
        ?>
      </table>
      <a  class="wholerank" href="allplayers.php?id=2">-view all-</a>
    </div>


    <div class="topplayer">
      <h2>Rebounds Per Game</h2>
       <table class="topplayer">

        <tr><th class="playername">Player</th><th class="playerstat">Rebounds</th></tr>
        <?php
          // Get the top 5 rebounds ranking
          $query3="SELECT players.id,players.name,players.rebounds,teams.name FROM players JOIN teams WHERE teams.shortname=players.team  ORDER BY rebounds DESC Limit 5";
          $stmt3=$db->prepare($query3);

          $stmt3->execute();
          $stmt3->store_result();
          $result3=$stmt3->bind_result($id,$name,$rebounds,$teamname);
          while($stmt3->fetch()){
            echo "<tr><td><a href='playerdetail.php?playerID=".$id."&playerteam=".$teamname."'>".$name." </a> </td><td class='team-rank'>  ".$rebounds."  </td></tr>";
          }
        ?>

      </table>
     <a class="wholerank" href="allplayers.php?id=3">-view all-</a>
    </div>


    <div class="topplayer">
      <h2>Steals Per Game</h2>

      <table class="topplayer">

        <tr><th class="playername">Player</th><th class="playerstat">Steals</th></tr>
        <?php
          // Get the top 5 steals ranking
          $query3="SELECT players.id,players.name,players.steals,teams.name FROM players JOIN teams WHERE teams.shortname=players.team  ORDER BY steals DESC Limit 5";
          $stmt3=$db->prepare($query3);

          $stmt3->execute();
          $stmt3->store_result();
          $result3=$stmt3->bind_result($id,$name,$steals,$teamname);
          while($stmt3->fetch()){
            echo "<tr><td><a href='playerdetail.php?playerID=".$id."&playerteam=".$teamname."'>".$name." </a> </td><td class='team-rank'>  ".$steals."  </td></tr>";
          }
        ?>


      </table>
      <a class="wholerank" href="allplayers.php?id=4"> -view all-</a>
    </div>

    <div class="topplayer">
      <h2>Blocks Per Game</h2>


      <table class="topplayer">

           <tr><th class="playername">Player</th><th class="playerstat">Blocks</th></tr>
        <?php
          // Get the top 5 blocks ranking
          $query3="SELECT players.id,players.name,players.blocks,teams.name FROM players JOIN teams WHERE teams.shortname=players.team  ORDER BY blocks DESC Limit 5";
          $stmt3=$db->prepare($query3);

          $stmt3->execute();
          $stmt3->store_result();
          $result3=$stmt3->bind_result($id,$name,$blocks,$teamname);
          while($stmt3->fetch()){
            echo "<tr><td><a href='playerdetail.php?playerID=".$id."&playerteam=".$teamname."'>".$name." </a> </td><td class='team-rank'>  ".$blocks."  </td></tr>";
          }
        ?>


      </table>
      <a class="wholerank" href="allplayers.php?id=5">-view all-</a>
    </div>



  	</form>
  </div>
  </body>

</html>
