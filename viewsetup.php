<?php
  require "header.php";
?>

  <main>
    <div class="wrapper-main section-padding">
      <section class="container section-wrapper">
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
                header("Location: viewsetup.php?error=sqlerror");
                exit();
              }
  
              mysqli_stmt_bind_param($stmt, "i", $setupId);
              mysqli_stmt_execute($stmt);
              $result = mysqli_stmt_get_result($stmt);
              if ($row = mysqli_fetch_assoc($result)) {
                echo '<p class="text-center">Setup Name: '.$row['nameSetups'].'</p>
                <div class="row">
                <div class="col-lg">
                  <strong>Aerodynamics</strong>
                  <p>Front Wing: '.$row['frontWing'].'</br>
                  Rear Wing: '.$row['rearWing'].'</p>
                  <strong>Transmission</strong>
                  <p>On Throttle Differential: '.$row['onThrottleDiff'].'%</br>
                  Off Throttle Differential: '.$row['offThrottleDiff'].'%</p>
                  <strong>Suspension Geometry</strong>
                  <p>Front Camber: '.$row['frontCamber'].'&#176<br>
                  Rear Camber: '.$row['rearCamber'].'&#176<br>
                  Front Toe: '.$row['frontToe'].'&#176<br>
                  Rear Toe: '.$row['rearToe'].'&#176</p>
                </div>
                <div class="col-lg">
                  <strong>Suspension</strong>
                  <p>Front Suspension: '.$row['frontSuspension'].'<br>
                  Rear Suspension: '.$row['rearSuspension'].'<br>
                  Front Anti Roll Bar: '.$row['frontAntiRoll'].'<br>
                  Rear Anti Roll Bar: '.$row['rearAntiRoll'].'<br>
                  Front Ride Height: '.$row['frontRideHeight'].'<br>
                  Rear Ride Height: '.$row['rearRideHeight'].'</p>
                  <strong class="justify-content-center">Brakes</strong>
                  <p>Brake Pressure: '.$row['brakePressure'].'%<br>
                  Front Brake Bias: '.$row['frontBrakeBias'].'%</p>
                </div>
                <div class="col-lg">
                  <strong>Tyres</strong>
                  <p>Front Right Tyre Pressure: '.$row['frontRightPressure'].' psi<br>
                  Front Left Tyre Pressure: '.$row['frontLeftPressure'].' psi<br>
                  Rear Right Tyre Pressure: '.$row['rearRightPressure'].' psi<br>
                  Rear Left Tyre Pressure: '.$row['rearLeftPressure'].' psi</p>
                </div>
                </div>';
            }
            }
          }
          else {
            echo '<p class="login-status">Login to view Setup details!</p>';
          }
        ?>
      </section>
    </div>
  </main>

<?php
  require "footer.php";
?>
