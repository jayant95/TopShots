<?php

  // Function to check if HTTP is on and change it to HTTPS
  function HTTPtoHTTPS() {
    if ($_SERVER["HTTPS"] != "on") {
      header("Location: https://" . $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"]);
      exit();
    }
  }

  // Function to check if HTTPS is on and change it to HTTP
  function HTTPStoHTTP() {
    if (isset($_SERVER["HTTPS"])) {
      header("Location: http://" . $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"]);
      exit();
    }
  }

  // Check validation errors and return the errors
  function validation($user) {
    $errors = [];

    // check validation for input and store errors in array
    if(empty($user['first-name'])) {
      $errors[] = "First Name is required";
    }

    if (empty($user['last-name'])) {
      $errors[] = "Last Name is required";
    }

    if (empty($user['email'])) {
      $errors[] = "Email cannot be blank";
    }

    if (empty($user['password'])) {
      $errors[] = "Password cannot be blank";
    }

    if (empty($user['username'])) {
      $errors[] = "Username cannot be blank";
    }

    if (empty($user['favTeam'])) {
      $errors[] = "Please choose a favourite team";
    }

    if (empty($user['confirm-password'])) {
      $errors[] = "Please confirm your password";
    }

    if ($user['password'] != $user['confirm-password']) {
      $errors[] = "Passwords must match";
    }

    return $errors;

  }

  // Login in the user by their username
  function logInUserByUsername($username, $password, $connection) {
    $errors = "";
    // Select the user from the database
    $sql = "SELECT * FROM members ";
    $sql .= "WHERE username='" . $username . "' ";
    $sql .= "LIMIT 1";

    $result = mysqli_query($connection, $sql);
    $user = mysqli_fetch_assoc($result);
    mysqli_free_result($result);

    if ($user) {
      // Verify hashed password in DB
      if (password_verify($password, $user['password'])) {
        session_regenerate_id();
        // Assign session variables and redirect
        $_SESSION['username'] = $user['username'];
        $_SESSION['email'] = $user['email'];
        $_SESSION['last-login'] = time();
        // Redirect to homepage after logging in
        header("Location: homepage.php");
      } else {
        $errors = "Incorrect password";
      }
    } else {
      $errors = "Incorrect username";
    }

    return $errors;

  }

  // Check if email already exists and return errors if there are any
  function isExistingEmail($email, $connection) {
    $errors = "";
    // Check if email exists in database
    $sql = "SELECT * FROM members ";
    $sql .= "WHERE email='" . $email . "' ";

    $result = mysqli_query($connection, $sql);
    if (mysqli_num_rows($result) > 0) {
      $newEmail = false;
      $errors = "This email has already been registered";
    } else {
      $newEmail = true;
    }
    mysqli_free_result($result);

    return $errors;
  }

  // Check if username already exists and return errors if there are any
  function isExistingUsername($username, $connection) {
    $errors = "";
    // Check if username exists in database
    $sql = "SELECT * FROM members ";
    $sql .= "WHERE username='" . $username . "' ";

    $result = mysqli_query($connection, $sql);
    if (mysqli_num_rows($result) > 0) {
      $newUsername = false;
      $errors = "This username has already been registered";
    } else {
      $newUsername = true;
    }
    mysqli_free_result($result);

    return $errors;
  }

  // Register new user in the database
  function registernewUser($user, $connection) {
    // Create hashed password to store
    $hashed_password = password_hash($user['password'], PASSWORD_BCRYPT);

    // Insert new entry into the db
    $sql = "INSERT INTO members ";
    $sql .= "(username, email, favouriteTeam, first_name, last_name, password) ";
    $sql .= "VALUES (";
    $sql .= "'" . $user['username'] . "',";
    $sql .= "'" . $user['email'] . "',";
    $sql .= "'" . $user['favTeam'] . "',";
    $sql .= "'" . $user['first-name'] . "',";
    $sql .= "'" . $user['last-name'] . "',";
    $sql .= "'" . $hashed_password . "'";
    $sql .= ")";

    $result = mysqli_query($connection, $sql);

    // Check if successful
    if ($result) {
      echo "Your registration was successful";
      // Redirect to homepage after registration is complete
      header("Location: homepage.php");
    } else {
      echo mysqli_error($connection);
    }

    // Assign session variables
    $_SESSION['username'] = $user['username'];
  }

  // Add a new comment to the game details page
  function insertGameDetailComment($info, $connection) {
    // Insert new entry into the db
    // Insert the gameID, username, description and timestamp
    $sql = "INSERT INTO comments ";
    $sql .= "(gameID, username, description, timestamp) ";
    $sql .= "VALUES (";
    $sql .= "'" . $info['gameID'] . "',";
    $sql .= "'" . $info['username'] . "',";
    $sql .= "'" . $info['comment'] . "',";
    $sql .= "'" . $info['timestamp'] . "'";
    $sql .= ")";

    $result = mysqli_query($connection, $sql);
  }

  // Add a new comment to the player details page
  function insertPlayerDetailComment($info, $connection) {
    // Insert new entry into the db
    // Insert the playerID, username, description, timestamp and playerTeam
    $sql = "INSERT INTO comments ";
    $sql .= "(username, playerID, description, timestamp, playerTeam) ";
    $sql .= "VALUES (";
    $sql .= "'" . $info['username'] . "',";
    $sql .= "'" . $info['playerID'] . "',";
    $sql .= "'" . $info['comment'] . "',";
    $sql .= "'" . $info['timestamp'] . "',";
    $sql .= "'" . $info['playerTeam'] . "'";
    $sql .= ")";
    $result = mysqli_query($connection, $sql);
  }

  // Retrieve all the game comments from the specific gameID
  function retrieveGameComments($gameID, $connection) {
    // Retrieve comments from db
    // Get the username and comment
    $sql = "SELECT username, description ";
    $sql .= "FROM comments ";
    $sql .= "WHERE gameID = $gameID";
    $result = mysqli_query($connection, $sql);

    return $result;
  }

  // Check if user is already following player
  function isPlayerFollowing($info, $connection) {
    $isFollowing = false;
    // Check if player followed exists in database
    $sql = "SELECT * FROM following ";
    $sql .= "WHERE username='" . $info['username'] . "' ";
    $sql .= "AND playerid='" . $info['playerID'] . "' ";

    $result = mysqli_query($connection, $sql);
    if (mysqli_num_rows($result) > 0) {
      $isFollowing = true;
    } else {
      $isFollowing = false;
    }
    mysqli_free_result($result);

    // Return a boolean
    return $isFollowing;
  }

  // Insert a new player to the users following list
  function insertPlayerFollow($info, $connection) {
    // Insert new entry into the db
    // Insert the twitter url also
    $sql = "INSERT INTO following ";
    $sql .= "(username, playername, playerid, playerTeam, twitter) ";
    $sql .= "VALUES (";
    $sql .= "'" . $info['username'] . "',";
    $sql .= "'" . $info['playerName'] . "',";
    $sql .= "'" . $info['playerID'] . "',";
    $sql .= "'" . $info['playerTeam'] . "',";
    $sql .= "'" . $info['twitter'] . "'";
    $sql .= ")";

    $result = mysqli_query($connection, $sql);
  }

  // Unfollow the player. Remove from database
  function removePlayerFollow($info, $connection) {
    // Delete entry from the db
    $sql = "DELETE FROM following ";
    $sql .= "WHERE username='" . $info['username'] . "' ";
    $sql .= "AND playerid='" . $info['playerID'] . "' ";

    $result = mysqli_query($connection, $sql);
  }

  // Get the name of the player and their twitter feed url
  function getPlayerNameAndTwitter($info, $connection) {
    $sql = "SELECT name, twitter ";
    $sql .= "FROM players ";
    $sql .= "WHERE id='" . $info['playerID'] . "' ";
    $result = mysqli_query($connection, $sql);

    return $result;
  }

  // Retrieve the users following list
  function getFollowingList($info, $connection) {
    $sql = "SELECT playername, playerid, playerTeam, twitter ";
    $sql .= "FROM following ";
    $sql .= "WHERE username='" . $info['username'] . "' ";
    $result = mysqli_query($connection, $sql);
    return $result;
  }

  // Retrive the 3 most recent comments from the user
  function getRecentCommentList($info, $connection) {
    $innersql = "SELECT * FROM comments ";
    $innersql .= "WHERE username='" . $info['username'] . "' ";
    $innersql .= "ORDER BY commentID DESC LIMIT 3";
    $sql = "SELECT * FROM ";
    $sql .= "($innersql) ";
    $sql .= "as r ORDER BY commentID";
    $result = mysqli_query($connection, $sql);

    return $result;
  }

  // Get the team list by conference (east, west)
  function getTeamByConference($conference, $db) {
    $query="SELECT ID,name, wins,losses FROM teams WHERE conference = ? ORDER BY wins DESC";
    $stmt=$db->prepare($query);
    $stmt->bind_param('s',$conference);
    $stmt->execute();
    $stmt->store_result();
    $result=$stmt->bind_result($teamID,$teamname, $wins,$losses);
    while($stmt->fetch()){
      echo "<tr><td><a href='teamdetail.php?teamID=".$teamID."'>".$teamname." </a> </td><td class='team-rank'>  ".$wins."  </td><td class='team-rank'>  ".$losses."</td></td>";
    }
  }

  // Get the rank of the players
 function getWholeRank($id, $db) {
   // Get whole rank for assists, points, rebounds, steals and blocks
    if($id==1){

          $query="SELECT players.id,players.name,players.points,teams.name FROM players JOIN teams WHERE teams.shortname=players.team  ORDER BY points DESC";
          $stmt=$db->prepare($query);

          $stmt->execute();
          $stmt->store_result();
          $result=$stmt->bind_result($id,$name,$points,$teamname);
          while($stmt->fetch()){
            echo "<tr><td><a href='playerdetail.php?playerID=".$id."&playerteam=".$teamname."'>".$name." </a> </td><td class='team-rank'>  ".$points."  </td></tr>";
          }
  }else if($id==2){
          $query2="SELECT players.id,players.name,players.assists,teams.name FROM players JOIN teams WHERE teams.shortname=players.team  ORDER BY assists DESC ";
          $stmt2=$db->prepare($query2);

          $stmt2->execute();
          $stmt2->store_result();
          $result2=$stmt2->bind_result($id,$name,$assists,$teamname);
          while($stmt2->fetch()){
            echo "<tr><td><a href='playerdetail.php?playerID=".$id."&playerteam=".$teamname."'>".$name." </a> </td><td class='team-rank'>  ".$assists."  </td></tr>";
          }
      }else if($id==3){
          $query3="SELECT players.id,players.name,players.rebounds,teams.name FROM players JOIN teams WHERE teams.shortname=players.team  ORDER BY rebounds DESC";
          $stmt3=$db->prepare($query3);

          $stmt3->execute();
          $stmt3->store_result();
          $result3=$stmt3->bind_result($id,$name,$rebounds,$teamname);
          while($stmt3->fetch()){
            echo "<tr><td><a href='playerdetail.php?playerID=".$id."&playerteam=".$teamname."'>".$name." </a> </td><td class='team-rank'>  ".$rebounds."  </td></tr>";
          }
        }else if($id==4){
         $query3="SELECT players.id,players.name,players.steals,teams.name FROM players JOIN teams WHERE teams.shortname=players.team  ORDER BY steals DESC ";
          $stmt3=$db->prepare($query3);

          $stmt3->execute();
          $stmt3->store_result();
          $result3=$stmt3->bind_result($id,$name,$steals,$teamname);
          while($stmt3->fetch()){
            echo "<tr><td><a href='playerdetail.php?playerID=".$id."&playerteam=".$teamname."'>".$name." </a> </td><td class='team-rank'>  ".$steals."  </td></tr>";
          }
        }else if($id==5){
         $query3="SELECT players.id,players.name,players.blocks,teams.name FROM players JOIN teams WHERE teams.shortname=players.team  ORDER BY blocks DESC ";
          $stmt3=$db->prepare($query3);

          $stmt3->execute();
          $stmt3->store_result();
          $result3=$stmt3->bind_result($id,$name,$blocks,$teamname);
          while($stmt3->fetch()){
            echo "<tr><td><a href='playerdetail.php?playerID=".$id."&playerteam=".$teamname."'>".$name." </a> </td><td class='team-rank'>  ".$blocks."  </td></tr>";
          }
        }
      }

  // Show games by date. Echo out a table row
  function showGamesByDate($date,$db){
      if($date=='2017-02-02'){
        $query="SELECT gameID,hometeam,guestteam,hometeamScore,guestteamScore,data FROM games WHERE data=?";
        $stmt=$db->prepare($query);
        $stmt->bind_param('s',$date);
        $stmt->execute();
        $stmt->store_result();
        $result=$stmt->bind_result($gameID,$hometeam,$guestTeam,$hometeamScore,$guestteamScore,$date);
        while($stmt->fetch()){
          echo "<tr class='games'><a class='games' href='gamedetail.php?gameID=".$gameID."'>".$hometeam."  : ".$guestTeam."</a></tr><br>";
        }
      }else{
        $query="SELECT gameID,hometeam,guestteam,hometeamScore,guestteamScore,data FROM games WHERE data=?";
        $stmt=$db->prepare($query);
        $stmt->bind_param('s',$date);
        $stmt->execute();
        $stmt->store_result();
        $result=$stmt->bind_result($gameID,$hometeam,$guestTeam,$hometeamScore,$guestteamScore,$date);
        while($stmt->fetch()){
          echo "<tr class='games'><a class='games' href='gamedetail.php?gameID=".$gameID."'>".$hometeam."    ".$hometeamScore."   :  ".$guestteamScore."    ".$guestTeam."</a></tr><br>";
        }
      }
  }

?>
