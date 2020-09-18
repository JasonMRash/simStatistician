<?php
  require "header.php";
?>

  <main>
    <div class="wrapper-main">
      <section class="container">
        <?php
          // check if user is logged in
          if (isset($_SESSION['userId'])) {
            echo '<div class="text-center"><h1 class="header-text">'.$_SESSION['userUid'].'\'s Setups</h1></div>';
            if (isset($_GET['error'])) {
              if($_GET['error'] == "emptyfields") {
                echo '<p class="error">Fill in all fields!</p>';
              }
              else if ($_GET['error'] == "alreadyexists") {
                echo '<p class="error">Setup Name already exists!</p>';
              }
              else if ($_GET['error'] == "sqlerror") {
                echo '<p class="error">SQL database Error!</p>';
              }
              
            }
            else if (isset($_GET['add'])) {
              if ($_GET['add'] == "success") {
                echo '<p class="success">Setup added sucessfully!</p>';
              }
            }
            else if (isset($_GET['delete'])) {
              if ($_GET['delete'] == "success") {
                echo '<p class="success">Setup deleted sucessfully!</p>';
              }
            }
            require 'includes/dbh.inc.php';
            
            echo '<div class="row justify-content-center">
            <div class="col-auto">
              <table class="table table-sm table-striped table-dark">
                <thead>
                  <th>Setup</th>
                  <th>Game</th>
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
                <div class="form-group">
                  <input class="form-control form-control-sm" type="text" title="Setup Name" name="setupName" placeholder="Setup Name">
                </div>
              </div>
              <div class="row justify-content-center">
                <div class="form-group">';
            
            require 'includes/gamenamedropdown.inc.php';

            echo '</div>
              </div>
              <div class="row justify-content-center">
                <div class="col-lg">
                  <div class="text-center">
                    <strong class="justify-content-center">Aerodynamics</strong>
                  </div>
                  <div>
                    <input class="form-control form-control-sm" type="number" min="1" max="11" title="Front Wing" name="frontWing" placeholder="Front Wing (1-11)">
                    <input class="form-control form-control-sm" type="number" min="1" max="11" title="Rear Wing" name="rearWing" placeholder="Rear Wing (1-11)">
                  </div>
                  <div class="text-center">
                  <strong class="justify-content-center">Transmission</strong>
                </div>
                <div>
                  <input class="form-control form-control-sm" type="number" min="50" max="100" title="On Throttle Differential" name="onThrottleDiff" placeholder="On Throttle Diff (50-100)">
                  <input class="form-control form-control-sm" type="number" min="50" max="100" title="Off Throttle Differential" name="offThrottleDiff" placeholder="Off Throttle Diff (50-100)">
                </div>
                <div class="text-center">
                  <strong class="justify-content-center">Suspension Geometry</strong>
                </div>
                <div>
                  <input class="form-control form-control-sm" type="number" min="-3.50" max="-2.50" step="0.01" title="Front Camber" name="frontCamber" placeholder="Front Camber (-3.50 to -2.50)">
                  <input class="form-control form-control-sm" type="number" min="-2.00" max="-1.00" step="0.01" title="Rear Camber" name="rearCamber" placeholder="Rear Camber (-2.00 to -1.00)">
                  <input class="form-control form-control-sm" type="number" min="0.05" max="0.15" step="0.01" title="Front Toe" name="frontToe" placeholder="Front Toe (0.05 to 0.15)">
                  <input class="form-control form-control-sm" type="number" min="0.20" max="0.50" step="0.01" title="Rear Toe" name="rearToe" placeholder="Rear Toe (0.20 to 0.50)">
                </div>
                </div>
              <div class="col-lg">
                
                <div class="text-center">
                  <strong class="justify-content-center">Suspension</strong>
                </div>
                <div>
                  <input class="form-control form-control-sm" type="number" min="1" max="11" title="Front Suspension" name="frontSuspension" placeholder="Front Suspension (1-11)">
                  <input class="form-control form-control-sm" type="number" min="1" max="11" title="Rear Suspension" name="rearSuspension" placeholder="Rear Suspension (1-11)">
                  <input class="form-control form-control-sm" type="number" min="1" max="11" title="Front Anti-Roll Bar" name="frontAntiRoll" placeholder="Front Anti-Roll Bar (1-11)">
                  <input class="form-control form-control-sm" type="number" min="1" max="11" title="Rear Anti-Roll Bar" name="rearAntiRoll" placeholder="Rear Anti-Roll Bar (1-11)">
                  <input class="form-control form-control-sm" type="number" min="1" max="11" title="Front Ride Height" name="frontRideHeight" placeholder="Front Ride Height (1-11)">
                  <input class="form-control form-control-sm" type="number" min="1" max="11" title="Rear Ride Height" name="rearRideHeight" placeholder="Rear Ride Height (1-11)">
                </div>
              </div>
              <div class="col-lg">
                <div class="text-center">
                  <strong class="justify-content-center">Brakes</strong>
                </div>
                <div class="">
                  <input class="form-control form-control-sm" type="number" min="50" max="100" title="Brake Pressure" name="brakePressure" placeholder="Brake Pressure (50-100)">
                  <input class="form-control form-control-sm" type="number" min="50" max="70" title="Front Brake Bias" name="frontBrakeBias" placeholder="Front Brake Bias (70-50)">
                </div>
                <div class="text-center">
                  <strong class="justify-content-center">Tyres</strong>
                </div>
                <div class="">
                  <input class="form-control form-control-sm" type="number" min="21.0" max="25.0" step="0.1" name="frontRightPressure" placeholder="Front Right Tyre Pressure (21.0 - 25.0)">
                  <input class="form-control form-control-sm" type="number" min="21.0" max="25.0" step="0.1" name="frontLeftPressure" placeholder="Front Left Tyre Pressure (21.0 - 25.0)">
                  <input class="form-control form-control-sm" type="number" min="19.5" max="23.5" step="0.1" name="rearRightPressure" placeholder="Rear Right Tyre Pressure (19.5 - 23.5)">
                  <input class="form-control form-control-sm" type="number" min="19.5" max="23.5" step="0.1" name="rearLeftPressure" placeholder="Rear Left Tyre Pressure (19.5 - 23.5)">
                </div>
              </div>
              </div>
              <div class="text-center">
                <button class="btn btn-dark" type="submit" name="setups-submit">Add Setup</button>
              </div>
            </form>
            </section>';
          }
          else {
            echo '<p">Log in to view your profile.</p>';
          }
        ?>
    </div>
    <div class="push">
    </div>
  </main>

<?php
  require "footer.php";
?>