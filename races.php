<?php
  require "header.php";
?>

  <main>
    <div class="wrapper-main">
      <section class="container">
        <?php
          if (isset($_SESSION['userId'])) {
            echo '<h1 class="header-text">'.$_SESSION['userUid'].'\'s Races</h1>';
            if (isset($_GET['error'])) {
              if($_GET['error'] == "emptyfields") {
                echo '<p class="error">Fill in all fields!</p>';
              }
              else if ($_GET['error'] == "alreadyexists") {
                echo '<p class="error">Race already exists for user!</p>';
              }
              else if ($_GET['error'] == "sqlerror") {
                echo '<p class="error">SQL database Error!</p>';
              }
              
            }
            else if (isset($_GET['add'])) {
              if ($_GET['add'] == "success") {
                echo '<p class="success">Race added sucessfully!</p>';
              }
            }
            else if (isset($_GET['delete'])) {
              if ($_GET['delete'] == "success") {
                echo '<p class="success">Race deleted sucessfully!</p>';
              }
            }
            require 'includes/dbh.inc.php';
            
            echo '<div class="row justify-content-center">
            <div class="col-auto">
              <table class="table table-striped table-dark">
                <thead>
                  <th>Game</th>
                  <th>Date</th>
                  <th>Track</th>
                  <th>Setup</th>
                  <th>View</th>
                  <th>Delete</th>
                </thead>
                <tbody>';

            require 'includes/viewallraces.inc.php';

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