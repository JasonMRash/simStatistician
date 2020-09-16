<?php
  require "header.php";
?>

  <main>
    <div class="wrapper-main">
      <section class="container">
        <?php
          if (isset($_SESSION['userId'])) {
            echo '<h1 class="header-text">'.$_SESSION['userUid'].'\'s Games</h1>';
            if (isset($_GET['error'])) {
              if($_GET['error'] == "emptyfields") {
                echo '<p class="error">Fill in all fields!</p>';
              }
              else if ($_GET['error'] == "alreadyexists") {
                echo '<p class="error">Game already exists for user!</p>';
              }
              else if ($_GET['error'] == "sqlerror") {
                echo '<p class="error">SQL database Error!</p>';
              }
              
            }
            else if (isset($_GET['add'])) {
              if ($_GET['add'] == "success") {
                echo '<p class="success">Game added sucessfully!</p>';
              }
            }
            else if (isset($_GET['delete'])) {
              if ($_GET['delete'] == "success") {
                echo '<p class="success">Game deleted sucessfully!</p>';
              }
            }
            require 'includes/dbh.inc.php';
            
            echo '<div class="row justify-content-center">
            <div class="col-auto">
              <table class="table table-bordered table-striped table-dark">
                <thead>
                  <th>Games</th>
                  <th>Delete</th>
                </thead>
                <tbody>';

            require 'includes/viewgames.inc.php';

            echo '</tbody>
                </table>
              </div>
            </div>';

            echo '<form class="form-games" action="includes/addgame.inc.php" method="post">
              <div class="-sm text-center">
                <input class="form-control" type="text" name="gameName" placeholder="Game Name">
              </div>
              <div class=" text-center">
                <button class="btn btn-dark" type="submit" name="games-submit">Add Game</button>
              </div>
            </form>
            </section>';
          }
          else {
            echo '<p">Log in to view your profile.</p>';
          }
        ?>
    </div>
  </main>
  
<?php
  require "footer.php";
?>