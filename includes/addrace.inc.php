<?php
  if (isset($_POST['races-submit'])) {
    session_start();
    require 'dbh.inc.php';

    $gameId = (int)$_POST['gameId'];
    $userId = (int)$_SESSION['userId'];
    $setupID = (int)$_POST['setupId'];
    if (empty($idGames)) {
      header("Location: ../races.php?error=emptyfields");
      exit();
    }
    else {
      $sql = "INSERT INTO Races (idGames, idUsers) VALUES (?, ?)";
      if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("Location: ../races.php?error=sqlerror");
        exit();
      }
      else {
        mysqli_stmt_bind_param($stmt, "ii", $idGames, $userId);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_store_result($stmt);
        header("Location: ../races.php?add=success");
        exit();
      }
    }
  mysqli_stmt_close($stmt);
  mysqli_close($conn);
  }
  else {
    header("Location: ../races.php");
    exit();
  }