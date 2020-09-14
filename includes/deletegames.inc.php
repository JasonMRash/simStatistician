<?php
  require 'dbh.inc.php';

  $sql= "DELETE FROM games WHERE idGames = ?";
  $id= (int)$_GET['id'];
  $stmt = mysqli_stmt_init($conn);
  if (!mysqli_stmt_prepare($stmt, $sql)) {
    header("Location: ../games.php?error=sqlerror");
    exit();
  }
  else {
    mysqli_stmt_bind_param($stmt, "i", $id);
    mysqli_stmt_execute($stmt);
    header("Location: ../games.php?delete=success");
  }