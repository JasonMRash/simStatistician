<?php
  require 'dbh.inc.php';

  $sql= "DELETE FROM Setups WHERE idSetups = ?";
  $id= (int)$_GET['id'];
  $stmt = mysqli_stmt_init($conn);
  if (!mysqli_stmt_prepare($stmt, $sql)) {
    header("Location: ../setups.php?error=sqlerror");
    exit();
  }
  else {
    mysqli_stmt_bind_param($stmt, "i", $id);
    mysqli_stmt_execute($stmt);
    header("Location: ../setups.php?delete=success");
  }