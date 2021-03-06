<?php
  require "header.php";
?>

  <main>
    <div class="wrapper-main section-padding">
      <section class="container section-wrapper">
        <div class="text-center">
          <h1>View Race</h1>
        </div>
        <?php
          if (isset($_SESSION['userId'])) {
            if(isset($_GET['id'])){
              require 'includes/dbh.inc.php';
              $raceId = (int)$_GET['id'];
              $sql = "SELECT Games.nameGames as game, Setups.nameSetups as setup, Races.date, Races.trackName, Races.fastestLap,
              Races.startPosition, Races.finishPosition, Races.aiDifficulty, Races.controllerType FROM Races INNER JOIN Games ON Games.idGames=Races.idGames LEFT OUTER JOIN Setups ON Setups.idSetups=Races.idSetups WHERE idRaces = ?";
              $stmt = mysqli_stmt_init($conn);
              if (!mysqli_stmt_prepare($stmt, $sql)) {
                //header("Location: viewsetup.php?error=sqlerror");
                echo mysqli_error($conn);
                exit();
              }
  
              mysqli_stmt_bind_param($stmt, "i", $raceId);
              mysqli_stmt_execute($stmt);
              $result = mysqli_stmt_get_result($stmt);
              if ($row = mysqli_fetch_assoc($result)) {
                echo '<p class="text-center">Game Name: '.$row['game'].'</p>
                <p class="text-center">Setup Name: '.$row['setup'].'</p>
                <div class="row justify-content-center">
                  <div class="col-lg">
                    <div>
                      <p>Race Date: '.$row['date'].'</br>
                      Track Name: '.$row['trackName'].'</p>
                    </div>
                  </div>
                  <div class="col-lg"> 
                    <div>
                      <p>Fastest Lap: '.$row['fastestLap'].'<br>
                      Start Position: '.$row['startPosition'].'<br>
                      Finish Position: '.$row['finishPosition'].'<br>
                    </div>
                  </div>
                  <div class="col-lg">
                    <div>
                      <p>AI Difficulty: '.$row['aiDifficulty'].'<br>
                      Controller Type: '.$row['controllerType'].'</p>
                    </div>
                  </div>
                </div>';
            }
            }
          }
          else {
            echo '<p class="login-status">Login to view Race details!</p>';
          }
        ?>
      </section>
    </div>
  </main>

<?php
  require "footer.php";
?>