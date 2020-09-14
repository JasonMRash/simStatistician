<?php
  require "header.php";
?>

  <main>
    <div class="wrapper-main">
      <section class="container">
        <?php
          if (isset($_SESSION['userId'])) {
            echo '<h1>'.$_SESSION['userUid'].' Profile</h1>';
            require 'includes/dbh.inc.php';
            $user = $_SESSION['userId'];
            // sql query to count current user total number of games
            $sql ="SELECT COUNT FROM games WHERE user = ?";
            $stmt = mysqli_stmt_init($conn);
            if (!mysqli_stmt_prepare($stmt, $sql)) {
              echo '<p>Error in query for number of games owned</p>';
              exit();
            }
            else {
              mysqli_stmt_bind_param($stmt, "s", $user);
              mysqli_stmt_execute($stmt);
              $result = mysqli_stmt_get_result($stmt);
              echo '<p>Number of games: '.$result.'</p>';
            }
            // query to count current user total number of races  
            $sql = "SELECT COUNT FROM races WHERE user = ?";
            if (!mysqli_stmt_prepare($stmt, $sql)) {
              echo '<p>Error in query for number of races</p>';
              exit();
            }
            else {
              mysqli_stmt_bind_param($stmt, "s", $user);
              mysqli_stmt_execute($stmt);
              $result = mysqli_stmt_get_result($stmt);
              echo '<p>Number of races: '.$result.'</p>';
            }
          }
          else {
            echo '<p">Log in to view your profile.</p>';
          }
        ?>
      </section>
    </div>
  </main>

<?php
  require "footer.php";
?>