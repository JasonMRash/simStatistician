<?php
  if (isset($_POST['setups-submit'])) {
    session_start();
    require 'dbh.inc.php';

    $setupName = $_POST['setupName'];
    $userId = (int)$_SESSION['userId'];
    if (empty($setupName)) {
      header("Location: ../setups.php?error=emptyfields");
      exit();
    }
    else {

      $sql = "SELECT nameSetups FROM Setups WHERE nameSetups=? & idUsers=?";
      $stmt = mysqli_stmt_init($conn);
      if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("Location: ../setups.php?error=sqlerror");
        exit();
      }
      else {
        mysqli_stmt_bind_param($stmt, "si", $setupName, $userId);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_store_result($stmt);
        $resultCheck = mysqli_stmt_num_rows($stmt);
        if ($resultCheck > 0) {
          header("Location: ../setups.php?error=alreadyexists");
          exit();
        }
        else {

          $sql = "INSERT INTO Setups (nameSetups, idUsers) VALUES (?, ?)";
          if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location: ../setups.php?error=sqlerror");
            exit();
          }
          else {
            mysqli_stmt_bind_param($stmt, "ss", $gameName, $userId);
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