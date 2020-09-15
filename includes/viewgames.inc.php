<?php
  $sql = "SELECT nameGames, idGames FROM Games WHERE idUsers = ?";
  $idUsers= (int)$_SESSION['userId'];
  $stmt = mysqli_stmt_init($conn);
  if (!mysqli_stmt_prepare($stmt, $sql)) {
    header("Location: games.php?error=sqlerror".mysqli_error($conn));
    exit();
  }
  
  mysqli_stmt_bind_param($stmt, "i", $idUsers);
  mysqli_stmt_execute($stmt);
  $result = mysqli_stmt_get_result($stmt);
  while($row = mysqli_fetch_assoc($result)) {
    echo '<tr>
    <td>'.$row['nameGames'].'</td>
    <td><a class="btn btn-sm btn-danger" href="includes/deletegame.inc.php?id='.$row['idGames'].'">Delete</a></td>
    </tr>';
   }