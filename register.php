<?php

  // Starting the session and require other files
  session_start();
  require_once("includes/db_connection.php");
  require_once("includes/helper_functions.php");

  // Switch from HTTP to HTTPS on login page
  HTTPtoHTTPS();

  $user = [];
  $user['first-name'] = "";
  $user['last-name'] = "";
  $user['email'] = "";
  $user['username'] = "";
  $user['favTeam'] = "";
  $errors = [];

  // if form was submitted
  if (isset($_POST["submit"])) {
    // Get user input
    $user['first-name'] = !empty($_POST['first-name']) ? $_POST['first-name'] : "";
    $user['last-name'] = !empty($_POST['last-name']) ? $_POST['last-name'] : "";
    $user['email'] = !empty($_POST['email']) ? $_POST['email'] : "";
    $user['username'] = !empty($_POST['username']) ? $_POST['username'] : "";
    $user['favTeam'] = !empty($_POST['favTeam']) ? $_POST['favTeam'] : "";
    $user['password'] = !empty($_POST['password']) ? $_POST['password'] : "";
    $user['confirm-password'] = !empty($_POST['password-confirm']) ? $_POST['password-confirm'] : "";


    $incomplete = false;
    // Check validation and if form is complete
    $errors = validation($user);
    if ($errors) {
      $incomplete = true;
    }

    if (!$incomplete) {
      $registeredUsername = isExistingUsername($user['username'], $connection);
      $registeredEmail = isExistingEmail($user['email'], $connection);

      if (!$registeredEmail && !$registeredUsername) {
        registernewUser($user, $connection);
      } else {
        $errors[] = $registeredUsername;
        $errors[] = $registeredEmail;
      }
    }
  }
?>

<html>
  <head>
    <title>Register Page</title>
    <link rel="stylesheet" type="text/css" href="css/main.css">
  </head>

  <body>
    <?php
      require("includes/header.php");
    ?>

    <div>
      <h1>Register</h1>
      <?php
        if (!empty($errors)) {
          // List out form errors
          foreach ($errors as $opt) {
            echo "<li>$opt</li>";
          }
        }

      ?>

      <form action="register.php" method="post">
        First Name:<br />
        <input type="text" name="first-name" value="<?php echo $user['first-name'] ?>" /><br />
        Last Name:<br />
        <input type="text" name="last-name" value="<?php echo $user['last-name'] ?>" /><br />
        Email:<br />
        <input type="text" name="email" value="<?php echo $user['email'] ?>" /><br />
        Username:<br />
        <input type="text" name="username" value="<?php echo $user['username'] ?>" /><br />
        Password:<br />
        <input type="password" name="password" value="" /><br />
        Confirm Password:<br />
        <input type="password" name="password-confirm" value="" /><br />
        Favourite Team:<br />

        <?php
          $teamVal = ['', 'ATL', 'BOS', 'BKN', 'CHA', 'CHI', 'CLE', 'DAL', 'DEN', 'DET',
          'GSW', 'HOU', 'IND', 'LAC', 'LAL', 'MEM', 'MIA', 'MIL', 'MIN', 'NOP',
          'NYK', 'OKC', 'ORL', 'PHI', 'PHO', 'POR', 'SAC', 'SAS', 'TOR', 'UTA', 'WAS'];

          $teamName = ['--Select One--', 'Atlanta Hawks', 'Boston Celtics', 'Brooklyn Nets', 'Charlotte Hornets', 'Chicago Bulls', 'Cleveland Cavaliers', 'Dallas Mavericks', 'Denver Nuggets', 'Detroit Pistons',
          'Golden State Warriors', 'Houston Rockets', 'Indiana Pacers', 'Los Angeles Clippers', 'Los Angeles Lakers', 'Memphis Grizzlies', 'Miami Heat', 'Milwaukee Bucks', 'Minnesota Timberwolves', 'New Orleans Pelicans',
          'New York Knicks', 'Oklahoma City Thunder', 'Orlando Magic', 'Philadelphia 76ers', 'Phoenix Suns', 'Portland Trail Blazers', 'Sacramento Kings', 'San Antonio Spurs', 'Toronto Raptors', 'Utah Jazz', 'Washington Wizards'];

          echo "<select name='favTeam'>";
          $i = 0;
          foreach ($teamVal as $opt) {
            $match = "";
            if ($opt == $user['favTeam']) {
              $match = "selected='selected'";
            }
            echo "<option value=$opt $match>$teamName[$i]</option>";
            $i++;
          }
          echo "<select>";

        ?>
        <input type="submit" name="submit" value="Submit"  />
      </form>
    </div>

  </body>

</html>
