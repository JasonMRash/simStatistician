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
            
            echo '<div class="row justify-content-center">
            <div class="col-auto">
              <table class="table table-striped table-dark">
                <thead>
                  <th>Setup Name</th>
                  <th>View</th>
                  <th>Delete</th>
                </thead>
                <tbody>';

            require 'includes/viewallsetups.inc.php';

            echo '</tbody>
                </table>
              </div>
            </div>';

            echo '<form class="form-setups" action="includes/addsetup.inc.php" method="post">
            <div class="container">
              <div class="row justify-content-center">
                <div class="form-group">
                  <input class="form-control" type="text" name="setupName" placeholder="Setup Name">
                </div>
              </div>
              <div class="row justify-content-center">
                <div class="col-lg">
                  <div class="text-center">
                    <strong class="justify-content-center">Aerodynamics</strong>
                  </div>
                  <div class="form-group">
                    <input class="form-control" type="number" min="1" max="11" name="frontWing" placeholder="Front Wing (1-11)">
                    <input class="form-control" type="number" min="1" max="11" name="rearWing" placeholder="Rear Wing (1-11)">
                  </div>
                  
                </div>
                <div class="col-lg">
                <div class="text-center">
                <strong class="justify-content-center">Transmission</strong>
              </div>
              <div class="form-group">
                <input class="form-control" type="number" min="50" max="100" name="onThrottleDiff" placeholder="On Throttle Diff (50-100)">
                <input class="form-control" type="number" min="50" max="100" name="offThrottleDiff" placeholder="Off Throttle Diff (50-100)">
              </div>
                </div>
                <div class="col-lg">
                <div class="text-center">
                <strong class="justify-content-center">Suspension Geometry</strong>
              </div>
              <div class="form-group">
                <input class="form-control" type="number" min="" max="" name="frontCamber" placeholder="Front Camber ()">
                <input class="form-control" type="number" min="" max="" name="rearCamber" placeholder="Rear Camber ()">
                <input class="form-control" type="number" min="" max="" name="frontToe" placeholder="Front Toe ()">
                <input class="form-control" type="number" min="" max="" name="rearToe" placeholder="Rear Toe ()">
              </div>
                </div>
              </div>
              <div class="text-center">
                <button class="btn btn-dark" type="submit" name="setups-submit">Add Setup</button>
              </div>
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