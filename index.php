<?php
  require "header.php";
?>

  <main>
    <div class="wrapper-main">
      <section class="container">
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
            echo '<div class="text-center"><strong class="login-status header-text">Welcome '.$_SESSION['userUid'].'!</strong></div>';
          }
          else {
            echo '<p class="login-status">You are logged out!</p>';
          }
        ?>
      </section>
    </div>
    <div class="push">
    </div>
  </main>

<?php
  require "footer.php";
?>