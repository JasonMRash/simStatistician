<?php
  if (isset($_POST['races-submit'])) {
    session_start();
    require 'dbh.inc.php';

    $gameId = (int)$_POST['gameId'];
    $userId = (int)$_SESSION['userId'];
    $setupId = (int)$_POST['setupId'];
    $inputDate = $_POST['raceDate'];
    $date=date("Y-m-d",strtotime($inputDate));
    $trackName = $_POST['trackName'];
    $fastestLap = $_POST['fastestLap'];
    $startPosition = (int)$_POST['startPosition'];
    $finishPosition = (int)$_POST['finishPosition'];
    $aiDifficulty = (int)$_POST['aiDifficulty'];
    $controllerType = $_POST['controllerType'];

    if (empty($userId) || empty($gameId) || empty($inputDate) || empty($trackName) || empty($fastestLap) || empty($startPosition) 
      || empty($finishPosition) || empty($aiDifficulty) || empty($controllerType)) {
      header("Location: ../races.php?error=emptyfields");
      exit();
    }
    else {
      // setup is not required to save race
      if (empty($setupId)) {
        $sql = "INSERT INTO Races (idUsers, idGames, date, trackName, fastestLap, startPosition, finishPosition, aiDifficulty, controllerType)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
      }
      else {
        $sql = "INSERT INTO Races (idUsers, idGames, idSetups, date, trackName, fastestLap, startPosition, finishPosition, aiDifficulty, controllerType)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
      }
      $stmt = mysqli_stmt_init($conn);
      if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("Location: ../races.php?error=sqlerror");
        exit();
      }
      else {
        // setup is not required to save race
        if (empty($setupId)) {
          mysqli_stmt_bind_param($stmt, "iisssiiis", $userId, $gameId, $date, $trackName, $fastestLap, $startPosition, $finishPosition, $aiDifficulty, $controllerType);
        }
        else {
          mysqli_stmt_bind_param($stmt, "iiisssiiis", $userId, $gameId, $setupId, $date, $trackName, $fastestLap, $startPosition, $finishPosition, $aiDifficulty, $controllerType);
        }
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