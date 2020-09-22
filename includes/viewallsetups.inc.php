<?php
  $id = (int)$_SESSION['userId'];
  $sql = 'SELECT Setups.nameSetups, Games.nameGames as game, Setups.idSetups FROM Setups INNER JOIN Games ON Setups.idGames = Games.idGames WHERE Setups.idUsers = ?';
  $stmt = mysqli_stmt_init($conn);
  if (!mysqli_stmt_prepare($stmt, $sql)) {
    die(mysqli_error($conn));
    header("Location: setups.php?error=sqlerror");
    exit();
  }
  mysqli_stmt_bind_param($stmt, "i", $id);
  mysqli_stmt_execute($stmt);
  $result = mysqli_stmt_get_result($stmt);
  while($row = mysqli_fetch_assoc($result)) {

    echo '<tr>
    <td>'.$row['nameSetups'].'</td>
    <td>'.$row['game'].'</td>
    <td><a class="btn btn-sm btn-success" href="viewsetup.php?id='.$row['idSetups'].'">View</a></td>
    <td><a class="btn btn-sm btn-danger" href="includes/deletesetup.inc.php?id='.$row['idSetups'].'">Delete</a></td>
    </tr>';
   }
   