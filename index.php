<?php
  require "header.php";
?>

  <main>
    <div class="wrapper-main">
      <section class="container section-padding">
        <div class="section-wrapper">
        <?php
          if (isset($_GET['error'])) {
            if($_GET['error'] == "emptyfields") {
              echo '<p class="error">Fill in all fields!</p>';
            }
            else if ($_GET['error'] == "wrongpwd") {
              echo '<p class="error">Password is incorrect!</p>';
            }
            else if ($_GET['error'] == "nouser") {
              echo '<p class="error">Username does not exist!</p>';
            }
            else if ($_GET['error'] == "sqlerror") {
              echo '<p class="error">SQL database Error!</p>';
            }
          }
          else if (isset($_GET['login'])) {
            if ($_GET['login'] == "success") {
              echo '<p class="success">Login successful!</p>';
            }
          }
          else if (isset($_GET['signup'])) {
            if ($_GET['signup'] == "success") {
              echo '<p class="success">Signup successful</p>';
            }
          }
        ?>
        <?php
          if (isset($_SESSION['userId'])) {
            echo '<div class="text-center"><strong class="login-status header-text">Welcome '.$_SESSION['userUid'].'!</strong></div>
            <p class="login-status text-center">You are now logged in and can view your racing data!';
          }
          else {
            echo '<h1 class="text-center header-text">Sim Statistician</h1>
            <p class="login-status text-center">You are logged out!</p>
            <p class="login-status text-center">Signup and Login or use the Username: test and Password: test to view sample usage.';
          }
        ?>
        </div>
      </section>
    </div>
  </main>

<?php
  require "footer.php";
?>