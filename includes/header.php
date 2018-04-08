<div class="topBanner">
  <div class="innerBanner">
    <div class="title">
      <img class="nba-logo" src="img/nba-logo-transparent.png">
      <h1><a href="homepage.php">TopShots</a></h1>
    </div>
    <nav class="login-logout">
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
  </div>
  <nav class="website-nav">
    <ul class="links">
      <li class="page-link"><a href="teams.php">Teams</a></li>
      <li class="page-link"><a href="players.php">Players</a></li>
      <li class="page-link"><a href="schedule.php?date=2017-02-01">Schedule</a></li>
    </ul>
    <ul class="links schedule-dates">
      <li><a href="schedule.php?date=2017-01-31">Last day</a></li>
      <li><a href="schedule.php?date=2017-02-01">Today</a></li>
      <li><a href="schedule.php?date=2017-02-02">Next day</a></li>
    </ul>
  </nav>
</div>
