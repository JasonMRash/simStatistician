<?php
  require "header.php";
?>

<main>
    <div class="wrapper-main">
      <section class="container">
        <h1 class="text-center">Signup</h1>
        <?php
          if (isset($_GET['error'])) {
            if($_GET['error'] == "emptyfields") {
              echo '<p class="error">Fill in all fields!</p>';
            }
            else if ($_GET['error'] == "invalidmailuid") {
              echo '<p class="error">Invalid username and e-mail!</p>';
            }
            else if ($_GET['error'] == "invaliduid") {
              echo '<p class="error">Invalid username!</p>';
            }
            else if ($_GET['error'] == "invalidmail") {
              echo '<p class="error">Invalid e-mail!</p>';
            }
            else if ($_GET['error'] == "passwordcheck") {
              echo '<p class="error">Your passwords do not match!</p>';
            }
            else if ($_GET['error'] == "usertaken") {
              echo '<p class="error">Username is alread taken!</p>';
            }
          }
        ?>
        <form class="form-signup" action="includes/signup.inc.php" method="post">
          <div class="text-center ">
            <input class="form-control" type="text" name="uid" placeholder="Username">
          </div>
          <div class="text-center ">
            <input class="form-control" type="text" name="mail" placeholder="E-mail">
          </div>
          <div class="text-center ">
            <input class="form-control" type="password" name="pwd" placeholder="Password">
          </div>
          <div class="text-center ">
            <input class="form-control" type="password" name="pwd-repeat" placeholder="Repeat password">
          </div>
          <div class="text-center ">
            <button class="btn btn-dark" type="submit" name="signup-submit">Signup</button>
          </div>
        </form>
      </section>
    </div>
    <div class="push">
    </div>
  </main>

<?php
  require "footer.php";
?>