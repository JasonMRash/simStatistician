<?php
  session_start();
?>
<DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title></title>
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<body class="wrapper-site">
  <header>
    <nav class="navbar navbar-expand-lg navbar-dark bg-custom">
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
              <button class="btn btn-sm btn-outline-dark" type="submit" name="logout-submit">Logout</button>
              </form>';
            }
            else {
              echo '<form action="includes/login.inc.php" method="post">
              <input type="text" name="mailuid" placeholder="Username/Email...">
              <input type="password" name="pwd" placeholder="Password...">
              <button class ="btn btn-sm btn-outline-dark" type="submit" name="login-submit">Login</button>
              <a class="btn btn-sm btn-dark" href="signup.php">Signup</a>
              </form>';
            }
          ?>
        </div>
      </div>  
    <nav>
  </header>