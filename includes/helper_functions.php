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
        header("Location: homepage.php");
      } else {
        $errors = "Incorrect password";
      }
    } else {
      $errors = "Incorrect username";
    }

    return $errors;

  }

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
      header("Location: homepage.php");
    } else {
      echo mysqli_error($connection);
    }

//    mysqli_close($connection);

    // Assign session variables
    $_SESSION['username'] = $user['username'];
  }

  function insertGameDetailComment($info, $connection) {
    // Insert new entry into the db
    $sql = "INSERT INTO comments ";
    $sql .= "(gameID, username, description, timestamp) ";
    $sql .= "VALUES (";
    $sql .= "'" . $info['gameID'] . "',";
    $sql .= "'" . $info['username'] . "',";
    $sql .= "'" . $info['comment'] . "',";
    $sql .= "'" . $info['timestamp'] . "'";
    $sql .= ")";

    $result = mysqli_query($connection, $sql);
  //  mysqli_close($connection);

  }


  function insertPlayerDetailComment($info, $connection) {
    // Insert new entry into the db
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
  //  mysqli_close($connection);

  }

  function retrieveGameComments($gameID, $connection) {
    //  Retrieve comments from db
    $sql = "SELECT username, description ";
    $sql .= "FROM comments ";
    $sql .= "WHERE gameID = $gameID";
    $result = mysqli_query($connection, $sql);

    return $result;
  }


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
    //mysqli_close($connection);

    return $isFollowing;
  }

  function insertPlayerFollow($info, $connection) {
    // Insert new entry into the db
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
    //mysqli_close($connection);

  }

  function removePlayerFollow($info, $connection) {
    // Delete entry from the db
    $sql = "DELETE FROM following ";
    $sql .= "WHERE username='" . $info['username'] . "' ";
    $sql .= "AND playerid='" . $info['playerID'] . "' ";

    $result = mysqli_query($connection, $sql);
    //mysqli_close($connection);

  }

  function getPlayerNameAndTwitter($info, $connection) {
    $sql = "SELECT name, twitter ";
    $sql .= "FROM players ";
    $sql .= "WHERE id='" . $info['playerID'] . "' ";
    $result = mysqli_query($connection, $sql);

    return $result;
  }

  function getFollowingList($info, $connection) {
    $sql = "SELECT playername, playerid, playerTeam, twitter ";
    $sql .= "FROM following ";
    $sql .= "WHERE username='" . $info['username'] . "' ";
    $result = mysqli_query($connection, $sql);
    return $result;
  }

  function getRecentCommentList($info, $connection) {
    // SELECT * FROM (
    //   SELECT * FROM comments ORDER BY commentID DESC LIMIT 3
    // ) as r ORDER BY commentID
    $innersql = "SELECT * FROM comments ";
    $innersql .= "WHERE username='" . $info['username'] . "' ";
    $innersql .= "ORDER BY commentID DESC LIMIT 3";
    $sql = "SELECT * FROM ";
    $sql .= "($innersql) ";
    $sql .= "as r ORDER BY commentID";
    $result = mysqli_query($connection, $sql);

    return $result;
  }

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

?>
