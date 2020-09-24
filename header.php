<?php
  session_start();
?>
<DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sim Statistician</title>
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
  <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
  <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
  <link rel="manifest" href="/site.webmanifest">
  <script type="text/javascript" src="includes/sliderValue.js"></script>
<body class="wrapper-site">
  <header>
    <nav class="navbar navbar-expand-lg navbar-dark bg-main">
      <a class="navbar-brand" href="index.php">Sim Statistician</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarText">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="index.php">Home</span></a>
          </li>
          <?php
            if (isset($_SESSION['userId'])) {
              echo '<li class="nav-item">
              <a class="nav-link" href="profile.php">Profile</a>
              </li>
              <li class="nav-item">
              <a class="nav-link" href="games.php">Games</a>
              </li>
              <li class="nav-item">
              <a class="nav-link" href="races.php">Races</a>
              </li>
              <li class="nav-item">
              <a class="nav-link" href="setups.php">Setups</a>
              </li>';
            }
          ?>
          <li class="nav-item">
            <a class="nav-link" href="about.php">About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="contact.php">Contact</a>
          </li>
        </ul>
          <?php
            if (isset($_SESSION['userId'])) {
              echo '<form class ="form-inline" action = "includes/logout.inc.php" method="post">
              <button class="btn btn-sm btn-outline-light" type="submit" name="logout-submit">Logout</button>
              </form>';
            }
            else {
              echo '<form action="includes/login.inc.php" method="post">
              <input type="text" name="mailuid" placeholder="Username/Email...">
              <input type="password" name="pwd" placeholder="Password...">
              <button class ="btn btn-sm btn-outline-light" type="submit" name="login-submit">Login</button>
              <a class="btn btn-sm btn-dark" href="signup.php">Signup</a>
              </form>';
            }
          ?>
        </div>
      </div>  
    <nav>
  </header>