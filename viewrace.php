<?php
  require "header.php";
?>

  <main>
    <div class="wrapper-main">
      <section class="container">
        <div class="text-center">
          <h1>View Race</h1>
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
              if ($row = mysqli_fetch_assoc($result)) {
                echo '<p class="text-center">Setup Name: '.$row['nameSetups'].'</p>
                <div class="row justify-content-center">
                <div class="col-lg">
                  <div class="text-center">
                    <strong class="justify-content-center">Aerodynamics</strong>
                  </div>
                  <div>
                    <p>Front Wing: '.$row['frontWing'].'</br>
                    Rear Wing: '.$row['rearWing'].'</p>
                  </div>
                  <div class="text-center">
                    <strong class="justify-content-center">Transmission</strong>
                  </div>
                <div>
                  <p>On Throttle Differential: '.$row['onThrottleDiff'].'%</br>
                  Off Throttle Differential: '.$row['offThrottleDiff'].'%</p>
                </div>
                <div class="text-center">
                  <strong class="justify-content-center">Suspension Geometry</strong>
                </div>
                <div>
                  <p>Front Camber: '.$row['frontCamber'].'&#176<br>
                  Rear Camber: '.$row['rearCamber'].'&#176<br>
                  Front Toe: '.$row['frontToe'].'&#176<br>
                  Rear Toe: '.$row['rearToe'].'&#176</p>
                </div>
                </div>
              <div class="col-lg">
                
                <div class="text-center">
                  <strong class="justify-content-center">Suspension</strong>
                </div>
                <div>
                  <p>Front Suspension: '.$row['frontSuspension'].'<br>
                  Rear Suspension: '.$row['rearSuspension'].'<br>
                  Front Anti Roll Bar: '.$row['frontAntiRoll'].'<br>
                  Rear Anti Roll Bar: '.$row['rearAntiRoll'].'<br>
                  Front Ride Height: '.$row['frontRideHeight'].'<br>
                  Rear Ride Height: '.$row['rearRideHeight'].'</p>
                </div>
              </div>
              <div class="col-lg">
                <div class="text-center">
                  <strong class="justify-content-center">Brakes</strong>
                </div>
                <div class="">
                  <p>Brake Pressure: '.$row['brakePressure'].'&#176<br>
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