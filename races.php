<?php
  require "header.php";
?>

  <main>
    <div class="wrapper-main">
      <section class="container">
        <?php
          if (isset($_SESSION['userId'])) {
            echo '<div class="text-center"><h1 class="header-text">'.$_SESSION['userUid'].'\'s Races</h1></div>';
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
            // add race form
            echo '<form class="form-setups" action="includes/addrace.inc.php" method="post">
            <div class="container">
              <div class="row justify-content-center">
                <div class="form-group">';
            
            require 'includes/gamenamedropdown.inc.php';

            echo '</div>
              </div>
              <div class="row justify-content-center">
                <div class="form-group">';

              require 'includes/setupnamedropdown.inc.php';

              echo '</div>
              </div>
              <div class="row justify-content-center">
                <div class="col-lg">
                  <div class="text-center">
                    <strong>Race Date</strong>
                  </div>
                  <div>
                    <input class="form-control form-control-sm" type="date" title="Race Date" name="date">
                  </div>
                  <div class="text-center">
                    <strong>Track Name</strong>
                  </div>
                  <div>
                    <input class="form-control form-control-sm" type="text" title="Track Name" name="trackName" placeholder="Track Name">
                  </div>
                </div>
                <div class="col-lg">
                  <div class="text-center">
                    <strong>Fastest Lap</strong>
                  </div>
                  <div>
                    <!-- Use a pattern to check if user entered correct time format --!>
                    <input class="form-control form-control-sm" type="text" title="Fastest Lap" name="fastestLap" placeholder="Fastest Lap (59:59:999)">
                  </div>
                  <div class="text-center">
                    <strong>Start Position</strong>
                  </div>
                  <div>
                    <input class="form-control form-control-sm" type="number" min="1" max="22" title="Start Position" name="startPosition" placeholder="Start Position (1-22)">
                  </div>
                  <div class="text-center">
                    <strong>Finish Position</strong>
                  </div>
                  <div>
                    <input class="form-control form-control-sm" type="number" min="1" max="22" title="Finish Position" name="finishPosition" placeholder="Finish Position (1-22)">
                  </div>
                </div>
              <div class="col-lg">
                <div class="text-center">
                  <strong>AI Difficulty</strong>
                </div>
                <div>
                  <input class="form-control form-control-sm" type="number" min="1" max="110" title="AI Difficulty" name="aiDifficulty" placeholder="AI Difficulty (1-110)">
                </div>
                <div class="text-center">
                  <strong>Controller Type</strong>
                </div>
                <div>
                  <input class="form-control form-control-sm" type="text" title="Controller Type" name="controllerType" placeholder="Controller Type">
                </div>
              </div>
              </div>
              <div class="text-center">
                <button class="btn btn-dark" type="submit" name="races-submit">Add Race</button>
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