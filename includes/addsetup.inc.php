<?php
  if (isset($_POST['setups-submit'])) {
    session_start();
    require 'dbh.inc.php';
    
    $setupName = $_POST['setupName'];
    $gameId = (int)$_POST['gameId'];
    $userId = (int)$_SESSION['userId'];
    $frontWing = (int)$_POST['frontWing'];
    $rearWing = (int)$_POST['rearWing'];
    $onThrottleDiff = (int)$_POST['onThrottleDiff'];
    $offThrottleDiff = (int)$_POST['offThrottleDiff'];
    $frontCamber = (double)$_POST['frontCamber'];
    $rearCamber = (double)$_POST['rearCamber'];
    $frontToe = (double)$_POST['frontToe'];
    $rearToe = (double)$_POST['rearToe'];
    $frontSuspension = (int)$_POST['frontSuspension'];
    $rearSuspension = (int)$_POST['rearSuspension'];
    $frontAntiRoll = (int)$_POST['frontAntiRoll'];
    $rearAntiRoll = (int)$_POST['rearAntiRoll'];
    $frontRideHeight = (int)$_POST['frontRideHeight'];
    $rearRideHeight = (int)$_POST['rearRideHeight'];
    $brakePressure = (int)$_POST['brakePressure'];
    $frontBrakeBias = (int)$_POST['frontBrakeBias'];
    $frontRightPressure = (double)$_POST['frontRightPressure'];
    $frontLeftPressure = (double)$_POST['frontLeftPressure'];
    $rearRightPressure = (double)$_POST['rearRightPressure'];
    $rearLeftPressure = (double)$_POST['rearLeftPressure'];

    if (empty($setupName) || empty($gameId) || empty($frontWing) || empty($rearWing) || empty($onThrottleDiff) || empty($offThrottleDiff)
        || empty($frontCamber) || empty($rearCamber) || empty($frontToe) || empty($rearToe) || empty($frontSuspension) || empty($rearSuspension)
        || empty($frontAntiRoll) || empty($frontRideHeight) || empty($rearRideHeight) || empty($brakePressure) || empty($frontBrakeBias)
        || empty($frontRightPressure) || empty($frontLeftPressure) || empty($rearRightPressure) || empty($rearLeftPressure)) {
      header("Location: ../setups.php?error=emptyfields");
      exit();
    }
    else {

      $sql = "SELECT nameSetups FROM Setups WHERE nameSetups=? AND idUsers=?";
      $stmt = mysqli_stmt_init($conn);
      if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("Location: ../setups.php?error=sqlerror".mysqli_error($conn));
        exit();
      }
      else {
        mysqli_stmt_bind_param($stmt, "si", $setupName, $userId);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_store_result($stmt);
        $resultCheck = mysqli_stmt_num_rows($stmt);
        echo ''.$resultCheck;
        if ($resultCheck > 0) {
          // header("Location: ../setups.php?error=alreadyexists");
          exit();
        }
        else {

          $sql = "INSERT INTO Setups (idUsers, idGames, nameSetups, frontWing, rearWing, onThrottleDiff, offThrottleDiff, frontCamber, rearCamber,
            frontToe, rearToe, frontSuspension, rearSuspension, frontAntiRoll, rearAntiRoll, frontRideHeight, rearRideHeight, brakePressure,
            frontBrakeBias, frontRightPressure, frontLeftPressure, rearRightPressure, rearLeftPressure) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
          if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location: ../setups.php?error=sqlerror".mysqli_error($conn));
            exit();
          }
          else {
            mysqli_stmt_bind_param($stmt, "iisiiiiddddiiiiiiiidddd", $userId, $gameId, $setupName, $frontWing, $rearWing, $onThrottleDiff, $offThrottleDiff,
              $frontCamber, $rearCamber, $frontToe, $rearToe, $frontSuspension, $rearSuspension, $frontAntiRoll, $rearAntiRoll, $frontRideHeight, $rearRideHeight,
              $brakePressure, $frontBrakeBias, $frontRightPressure, $frontLeftPressure, $rearRightPressure, $rearLeftPressure);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
            header("Location: ../setups.php?add=success");
            exit();
          }
        }
      }
    }
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
  }
  else {
    die("Location: ../setups.php");
  }
