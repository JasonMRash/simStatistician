<?php
  if (isset($_POST['races-submit'])) {
    session_start();
    require 'dbh.inc.php';

    $gameId = (int)$_POST['gameId'];
    $userId = (int)$_SESSION['userId'];
    $setupID = (int)$_POST['setupId'];
    $date = $_POST['date'];
    $trackName = $_POST['trackName'];
    $fastestLap = $_POST['fastestLap'];
    $startPosition = (int)$_POST['startPosition'];
    $finishPosition = (int)$_POST['finishPosition'];
    $aiDifficulty = (int)$_POST['aiDifficulty'];
    $controllerType = $_POST['controllerType'];

    if (empty($gameID)) {
      header("Location: ../races.php?error=emptyfields");
      exit();
    }
    else {
      $sql = "INSERT INTO Races (idGames, idUsers, idSetups, date, trackName, fastestLap, startPosition, finishPosition, aiDifficulty, controllerType)
      VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
      if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("Location: ../races.php?error=sqlerror");
        exit();
      }
      else {
        mysqli_stmt_bind_param($stmt, "iiisssiiis", $gameId, $userId, $setupId, $date, $trackName, $fastestLap, $startPosition, $finishPosition, $aiDifficulty, $controllerType);
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