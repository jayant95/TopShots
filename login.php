<?php
  // Starting the session and require other files
  session_start();
  require_once("includes/db_connection.php");
  require_once("includes/helper_functions.php");

  // Switch from HTTP to HTTPS on login page
  //HTTPtoHTTPS();

  // Initialize variables
  $username = "";
  $password = "";
  $errors = [];

  // If the form was submitted
  if (isset($_POST["submit"])) {
    // Retrieve the email and password credentials
    $username = !empty($_POST['email']) ? $_POST['email'] : "";
    $password = !empty($_POST['password']) ? $_POST['password'] : "";

    // Check if valid
    if (empty($username)) {
      $errors[] = "Email cannot be blank";
    }

    if (empty($password)) {
      $errors[] = "Password cannot be blank";
    }

    // If there were no errors
    if (empty($errors)) {
      $errors[] = logInUserByUsername($username, $password, $connection);

      mysqli_close($connection);

    }

  }


?>

<html>
  <head>
    <title>Login Page</title>
  </head>

  <body>

    <nav>
      <ul>
        <?php
          // Check if user is logged in
          if (empty($_SESSION['username'])) {
            echo "<li><a href=\"login.php\">Login</a></li>";
          } else {
            echo "<li><a href=\"logout.php\">Logout</a></li>";
          }
        ?>
      </ul>
    </nav>

    <div>
      <h1>Log in</h1>

      <?php
        echo $_SESSION['username'] ?? '';
        // Show validation errors
        if ($errors) {
          foreach ($errors as $opt) {
            echo "<li>$opt</li>";
          }
        }
      ?>

      <form action="" method="post">
        Username:<br />
        <input type="text" name="email" value="" /><br />
        Password:<br />
        <input type="password" name="password" value="" /><br />
        <input type="submit" name="submit" value="Submit"  />
      </form>

      <p>Not registered yet? <a href="register.php">Register Here</a></p>

    </div>


  </body>

</html>
