<?php
  require "header.php";
?>

  <main>
    <div class="wrapper-main">
      <section class="container section-padding">
        <div class="section-wrapper">
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
            <div class="col-auto custom-column">
              <div class="info-box bg-dark">
                <div class="table-size overflow-auto">
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

            echo '  </tbody>
                  </table>
                </div>
              </div>
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
                    <div class="text-center">Front Wing (1-11): <strong id="frontWing"></strong></div>
                    <input class="form-control form-control-sm" type="range" step="1" min="1" max="11" title="Front Wing" name="frontWing" onchange="sliderValue(this.value, this.name);">
                    <div class="text-center">Rear Wing (1-11): <strong id="rearWing"></strong></div>
                    <input class="form-control form-control-sm" type="range" step="1" min="1" max="11" title="Rear Wing" name="rearWing" onchange="sliderValue(this.value, this.name);">
                  </div>
                  <div class="text-center">
                  <strong class="justify-content-center">Transmission</strong>
                </div>
                <div>
                  <div class="text-center">On Throttle Differential (50-100): <strong id="onThrottleDiff"></strong></div>
                  <input class="form-control form-control-sm" type="range" step="5" min="50" max="100" title="On Throttle Differential" name="onThrottleDiff" onchange="sliderValue(this.value, this.name);">
                  <div class="text-center">Off Throttle Differential (50-100): <strong id="offThrottleDiff"></strong></div>
                  <input class="form-control form-control-sm" type="range" step="5" min="50" max="100" title="Off Throttle Differential" name="offThrottleDiff" onchange="sliderValue(this.value, this.name);">
                </div>
                <div class="text-center">
                  <strong class="justify-content-center">Suspension Geometry</strong>
                </div>
                <div>
                  <div class="text-center">Front Camber (-3.50 to -2.50): <strong id="frontCamber"></strong></div>
                  <input class="form-control form-control-sm" type="range" min="-3.50" max="-2.50" step="0.10" id="frontCamber" name="frontCamber" onchange="sliderValue(this.value, this.name);">
                  <div class="text-center">Rear Camber (-2.00 to -1.00): <strong id="rearCamber"></strong></div>
                  <input class="form-control form-control-sm" type="range" min="-2.00" max="-1.00" step="0.10" title="Rear Camber" name="rearCamber" onchange="sliderValue(this.value, this.name);">
                  <div class="text-center">Front Toe (0.05 to 0.15): <strong id="frontToe"></strong></div>
                  <input class="form-control form-control-sm" type="range" min="0.05" max="0.15" step="0.01" title="Front Toe" name="frontToe" onchange="sliderValue(this.value, this.name);">
                  <div class="text-center">Rear Toe (0.20 to 0.50): <strong id="rearToe"></strong></div>
                  <input class="form-control form-control-sm" type="range" min="0.20" max="0.50" step="0.03" title="Rear Toe" name="rearToe" onchange="sliderValue(this.value, this.name);">
                </div>
                </div>
              <div class="col-lg">
                <div class="text-center">
                  <strong class="justify-content-center">Suspension</strong>
                </div>
                <div>
                  <div class="text-center">Front Suspension (1-11): <strong id="frontSuspension"></strong></div>
                  <input class="form-control form-control-sm" type="range" step="1" min="1" max="11" title="Front Suspension" name="frontSuspension" onchange="sliderValue(this.value, this.name);">
                  <div class="text-center">Rear Suspension (1-11): <strong id="rearSuspension"></strong></div>
                  <input class="form-control form-control-sm" type="range" step="1" min="1" max="11" title="Rear Suspension" name="rearSuspension" onchange="sliderValue(this.value, this.name);">
                  <div class="text-center">Front Anti-Roll Bar (1-11): <strong id="frontAntiRoll"></strong></div>
                  <input class="form-control form-control-sm" type="range" step="1" min="1" max="11" title="Front Anti-Roll Bar" name="frontAntiRoll" onchange="sliderValue(this.value, this.name);">
                  <div class="text-center">Rear Anti-Roll Bar (1-11): <strong id="rearAntiRoll"></strong></div>
                  <input class="form-control form-control-sm" type="range" step="1" min="1" max="11" title="Rear Anti-Roll Bar" name="rearAntiRoll" onchange="sliderValue(this.value, this.name);">
                  <div class="text-center">Front Ride Height (1-11): <strong id="frontRideHeight"></strong></div>
                  <input class="form-control form-control-sm" type="range" step="1" min="1" max="11" title="Front Ride Height" name="frontRideHeight" onchange="sliderValue(this.value, this.name);">
                  <div class="text-center">Rear Ride Height (1-11): <strong id="rearRideHeight"></strong></div>
                  <input class="form-control form-control-sm" type="range" step="1" min="1" max="11" title="Rear Ride Height" name="rearRideHeight" onchange="sliderValue(this.value, this.name);">
                </div>
              </div>
              <div class="col-lg">
                <div class="text-center">
                  <strong class="justify-content-center">Brakes</strong>
                </div>
                <div>
                  <div class="text-center">Brake Pressure (50-100): <strong id="brakePressure"></strong></div>
                  <input class="form-control form-control-sm" type="range" step="2" min="50" max="100" title="Brake Pressure" name="brakePressure" onchange="sliderValue(this.value, this.name);">
                  <div class="text-center">Front Brake Bias (50-70): <strong id="frontBrakeBias"></strong></div>
                  <input class="form-control form-control-sm" type="range" step="2" min="50" max="70" title="Front Brake Bias" name="frontBrakeBias" onchange="sliderValue(this.value, this.name);">
                </div>
                <div class="text-center">
                  <strong class="justify-content-center">Tyres</strong>
                </div>
                <div>
                  <div class="text-center">Front Right Tyre Pressure (21.0 - 25.0): <strong id="frontRightPressure"></strong></div>
                  <input class="form-control form-control-sm" type="range" min="21.0" max="25.0" step="0.4" name="frontRightPressure" onchange="sliderValue(this.value, this.name);">
                  <div class="text-center">Front Left Tyre Pressure (21.0 - 25.0): <strong id="frontLeftPressure"></strong></div>
                  <input class="form-control form-control-sm" type="range" min="21.0" max="25.0" step="0.4" name="frontLeftPressure" onchange="sliderValue(this.value, this.name);">
                  <div class="text-center">Rear Right Tyre Pressure (19.5 - 23.5): <strong id="rearRightPressure"></strong></div>
                  <input class="form-control form-control-sm" type="range" min="19.5" max="23.5" step="0.4" name="rearRightPressure" onchange="sliderValue(this.value, this.name);">
                  <div class="text-center">Rear Left Tyre Pressure (19.5 - 23.5): <strong id="rearLeftPressure"></strong></div>
                  <input class="form-control form-control-sm" type="range" min="19.5" max="23.5" step="0.4" name="rearLeftPressure" onchange="sliderValue(this.value, this.name);">
                </div>
              </div>
              </div>
              <div class="text-center">
                <button class="btn btn-dark" type="submit" name="setups-submit">Add Setup</button>
              </div>
            </form>';
          }
          else {
            echo '<p">Log in to view your profile.</p>';
          }
        ?>
        </div>
      </section>
    </div>
  </main>

<?php
  require "footer.php";
?>