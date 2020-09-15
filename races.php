<?php
  require "header.php";
?>

  <main>
    <div class="wrapper-main">
      <section class="container">
        <?php
          if (isset($_SESSION['userId'])) {
            echo '<h1>'.$_SESSION['userUid'].' Games</h1>';
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
            
            echo '<form class="form-games" action="includes/addgames.inc.php" method="post">
            <div class="text-center form-group">
              <input class="form-control" type="text" name="gameName" placeholder="Game Name">
            </div>
            <div class="text-center form-group">
              <button class="btn btn-dark" type="submit" name="games-submit">Add Game</button>
            </div>
            </form>
            </section>';
            
            echo '<div class="row justify-content-center">
            <div class="col-auto">
              <table class="table table-striped table-dark">
                <thead>
                  <th>Game</th>
                  <th>Date</th>
                  <th>Track</th>
                  <th>Delete</th>
                </thead>
                <tbody>';

            require 'includes/viewraces.inc.php';

            echo '</tbody>
                </table>
              </div>
            </div>';
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