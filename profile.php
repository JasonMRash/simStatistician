<?php
  require "header.php";
?>

  <main>
    <div class="wrapper-main">
      <section class="container section-padding">
        <div class="section-wrapper">
        <?php
          if (isset($_SESSION['userId'])) {
            echo '<div class="text-center"><h1 class="header-text">'.$_SESSION['userUid'].'\'s Profile</h1></div>';
            require 'includes/dbh.inc.php';
            $user = (int)$_SESSION['userId'];
            // sql query to count current user total number of games
            $sql ="SELECT * FROM Games WHERE idUsers = ?";
            $stmt = mysqli_stmt_init($conn);
            if (!mysqli_stmt_prepare($stmt, $sql)) {
              echo '<p class="profile-text text-center">Error in SQL query for number of games owned</p>'.mysqli_error($conn);
              exit();
            }
            else {
              mysqli_stmt_bind_param($stmt, "i", $user);
              mysqli_stmt_execute($stmt);
              $result = mysqli_stmt_get_result($stmt);
              $countRows = mysqli_num_rows($result);
              echo '<p class="profile-text text-center">Number of Games: '.$countRows.'</p>';
            }
            // query to count current user total number of races  
            $sql = "SELECT * FROM Races WHERE idUsers = ?";
            if (!mysqli_stmt_prepare($stmt, $sql)) {
              echo '<p class="profile-text text-center">Error in SQL query for number of races</p>';
              exit();
            }
            else {
              mysqli_stmt_bind_param($stmt, "i", $user);
              mysqli_stmt_execute($stmt);
              $result = mysqli_stmt_get_result($stmt);
              $countRows = mysqli_num_rows($result);
              echo '<p class="profile-text text-center">Number of Races: '.$countRows.'</p>';
            }
            // query to count current user total number of setups  
            $sql = "SELECT * FROM Setups WHERE idUsers = ?";
            if (!mysqli_stmt_prepare($stmt, $sql)) {
              echo '<p class="profile-text text-center">Error in SQL query for number of setups</p>';
              exit();
            }
            else {
              mysqli_stmt_bind_param($stmt, "i", $user);
              mysqli_stmt_execute($stmt);
              $result = mysqli_stmt_get_result($stmt);
              $countRows = mysqli_num_rows($result);
              echo '<p class="profile-text text-center">Number of Setups: '.$countRows.'</p>';
            }
          }
          else {
            echo '<p class="profile-text text-center">Log in to view your profile.</p>';
          }
        ?>
        </div>
      </section>
    </div>
  </main>

<?php
  require "footer.php";
?>