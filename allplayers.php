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
      // Check the id and see which whole rank was clicked
      $title='';
      if($id==1){
        $title="Points";
      }else if($id==2){
        $title="Assists";
      }else if($id==3){
        $title="Rebounds";
      }else if($id==4){
        $title="Steals";
      }else if($id==5){
        $title="Blocks";
      }
    ?>
  <div class="page-content">

    <form action="" method="post">



    <h1 class="allplayers">Season Leaders</h1>

    <div class="allplayers">
      <?php

      echo '<h2 class="allplayers">'.$title.' Per Game</h2>';
      ?>
      <table class="topplayer">

        <tr><th class="playername">Player</th><th class="playerstat">Points</th></tr>
        <?php
          // Get the whole list of the category
          getWholeRank($id, $db);
        ?>


     </table>

    </div>
  </form>
</div>
</body>
</html>
