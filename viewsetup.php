<?php
  require "header.php";
?>

  <main>
    <div class="wrapper-main">
      <section class="container">
        <div class="text-center">
          <h1>View Setup</h1>
        </div>
        <?php
          if (isset($_SESSION['userId'])) {
            if(isset($_GET['id'])){
              require 'includes/dbh.inc.php';
              $setupId = (int)$_GET['id'];
              $sql = "SELECT * FROM Setups WHERE idSetups = ?";
              $stmt = mysqli_stmt_init($conn);
              if (!mysqli_stmt_prepare($stmt, $sql)) {
                //header("Location: viewsetup.php?error=sqlerror");
                exit();
              }
  
              mysqli_stmt_bind_param($stmt, "i", $setupId);
              mysqli_stmt_execute($stmt);
              $result = mysqli_stmt_get_result($stmt);
              while($row = mysqli_fetch_assoc($result)) {
                echo '<p class="text-center">Setup Name: '.$row['nameSetups'].'</p>
                <div class="row justify-content-center">
                <div class="col-lg">
                  <div class="text-center">
                    <strong class="justify-content-center">Aerodynamics</strong>
                  </div>
                  <div>
                    <p>Front Wing: '.$row['frontWing'].'</p>
                    <p>Rear Wing: '.$row['rearWing'].'</p>
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
                <td><a class="btn btn-sm btn-danger" href="includes/deletegame.inc.php?id='.$row['idGames'].'">Delete</a></td>
                </tr>';
            }
            }
          }
          else {
            echo '<p class="login-status">You are logged out!</p>';
          }
        ?>
      </section>
    </div>
  </main>

<?php
  require "footer.php";
?>