<?php
  if (isset($_POST['games-submit'])) {
    session_start();
    require 'dbh.inc.php';

    $gameName = $_POST['gameName'];
    $userId = (int)$_SESSION['userId'];
    echo $gameName;
    echo $userId;
    if (empty($gameName)) {
      header("Location: ../games.php?error=emptyfields");
      exit();
    }
    else {

      $sql = "SELECT nameGames FROM Games WHERE idUsers=? AND nameGames=?";
      $stmt = mysqli_stmt_init($conn);
      if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("Location: ../games.php?error=sqlerror");
        exit();
      }
      else {
        mysqli_stmt_bind_param($stmt, "is", $userId, $gameName);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_store_result($stmt);
        $resultCheck = mysqli_stmt_num_rows($stmt);
        if ($resultCheck > 0) {
          header("Location: ../games.php?error=alreadyexists");
          exit();
        }
        else {

          $sql = "INSERT INTO Games (nameGames, idUsers) VALUES (?, ?)";
          if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location: ../games.php?error=sqlerror");
            exit();
          }
          else {
            mysqli_stmt_bind_param($stmt, "si", $gameName, $userId);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
            header("Location: ../games.php?add=success");
            exit();
          }
        }
      }
    }
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
  }
  else {
    header("Location: ../games.php");
    exit();
  }