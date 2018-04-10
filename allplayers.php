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
      $id=$_GET['id'];
    ?>
  <div class="page-content">

    <form action="" method="post">


    <h1 class="allplayers">Season Leaders</h1>

    <div class="allplayers">
      <h2 class="allplayers">Points Per Game</h2>
      <table class="topplayer">

        <tr><th class="playername">Player</th><th class="playerstat">Points</th></tr>
        <?php
          
          getWholeRank($id, $db);
        ?>


     </table>

    </div>
  </form>
</div>
</body>
</html>