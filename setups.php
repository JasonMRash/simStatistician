<?php
  require "header.php";
?>

  <main>
    <div class="wrapper-main">
      <section class="container">
        <?php
          // check if user is logged in
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
                  <th>Game Name</th>
                  <th>View</th>
                  <th>Delete</th>
                </thead>
                <tbody>';
            // show all user setups
            require 'includes/viewallsetups.inc.php';

            echo '</tbody>
                </table>
              </div>
            </div>';
            // add setup form
            echo '<form class="form-setups" action="includes/addsetup.inc.php" method="post">
            <div class="container">
              <div class="row justify-content-center">
                <div class="">
                  <input class="form-control form-control-sm" type="text" name="setupName" placeholder="Setup Name">
                </div>
              </div>
              <div class="row justify-content-center">
                <div class="">';
            require 'includes/gamenamedropdown.inc.php';
            echo '</div>
              </div>
              <div class="row justify-content-center">
                <div class="col-lg">
                  <div class="text-center">
                    <strong class="justify-content-center">Aerodynamics</strong>
                  </div>
                  <div class="">
                    <input class="form-control form-control-sm" type="number" min="1" max="11" id="frontWing" name="frontWing" placeholder="Front Wing (1-11)">
                    <input class="form-control form-control-sm" type="number" min="1" max="11" name="rearWing" placeholder="Rear Wing (1-11)">
                  </div>
                  <div class="text-center">
                  <strong class="justify-content-center">Transmission</strong>
                </div>
                <div class="">
                  <input class="form-control form-control-sm" type="number" min="50" max="100" name="onThrottleDiff" placeholder="On Throttle Diff (50-100)">
                  <input class="form-control form-control-sm" type="number" min="50" max="100" name="offThrottleDiff" placeholder="Off Throttle Diff (50-100)">
                </div>
                <div class="text-center">
                  <strong class="justify-content-center">Suspension Geometry</strong>
                </div>
                <div class="">
                  <input class="form-control form-control-sm" type="number" min="-3.50" max="-2.50" name="frontCamber" placeholder="Front Camber (-3.50 to -2.50)">
                  <input class="form-control form-control-sm" type="number" min="-3.50" max="-2.50" name="rearCamber" placeholder="Rear Camber (-3.50 to -2.50)">
                  <input class="form-control form-control-sm" type="number" min="0.05" max="0.15" name="frontToe" placeholder="Front Toe (0.05 to 0.15)">
                  <input class="form-control form-control-sm" type="number" min="0.20" max="0.50" name="rearToe" placeholder="Rear Toe (0.20 to 0.50)">
                </div>
                </div>
              <div class="col-lg">
                
                <div class="text-center">
                  <strong class="justify-content-center">Suspension</strong>
                </div>
                <div class="">
                  <input class="form-control form-control-sm" type="number" min="1" max="11" name="frontSuspension" placeholder="Front Suspension (1-11)">
                  <input class="form-control form-control-sm" type="number" min="1" max="11" name="rearSuspension" placeholder="Rear Suspension (1-11)">
                  <input class="form-control form-control-sm" type="number" min="1" max="11" name="frontAntiRoll" placeholder="Front Anti-Roll Bar (1-11)">
                  <input class="form-control form-control-sm" type="number" min="1" max="11" name="rearAntiRoll" placeholder="Rear Anti-Roll Bar (1-11)">
                  <input class="form-control form-control-sm" type="number" min="1" max="11" name="frontRideHeight" placeholder="Front Ride Height (1-11)">
                  <input class="form-control form-control-sm" type="number" min="1" max="11" name="rearRideHeight" placeholder="Rear Ride Height (1-11)">
                </div>
              </div>
              <div class="col-lg">
                <div class="text-center">
                  <strong class="justify-content-center">Brakes</strong>
                </div>
                <div class="">
                  <input class="form-control form-control-sm" type="number" min="50" max="100" name="brakePressure" placeholder="Brake Pressure (50-100)">
                  <input class="form-control form-control-sm" type="number" min="50" max="70" name="frontBrakeBias" placeholder="Front Brake Bias (70-50)">
                </div>
                <div class="text-center">
                  <strong class="justify-content-center">Tyres</strong>
                </div>
                <div class="">
                  <input class="form-control form-control-sm" type="number" min="-3.50" max="-2.50" name="frontCamber" placeholder="Front Camber (-3.50 to -2.50)">
                  <input class="form-control form-control-sm" type="number" min="-3.50" max="-2.50" name="rearCamber" placeholder="Rear Camber (-3.50 to -2.50)">
                  <input class="form-control form-control-sm" type="number" min="0.05" max="0.15" name="frontToe" placeholder="Front Toe (0.05 to 0.15)">
                  <input class="form-control form-control-sm" type="number" min="0.20" max="0.50" name="rearToe" placeholder="Rear Toe (0.20 to 0.50)">
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