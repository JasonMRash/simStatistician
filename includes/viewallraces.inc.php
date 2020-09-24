<?php
  $id = (int)$_SESSION['userId'];
  $sql = 'SELECT Races.idRaces, Races.trackName, Races.fastestLap, Games.nameGames as game, Races.date FROM Races INNER JOIN Games ON Games.idGames = Races.idGames WHERE Races.idUsers = ?';
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
    <td>'.$row['game'].'</td>
    <td>'.$row['date'].'</td>
    <td>'.$row['trackName'].'</td>
    <td>'.$row['fastestLap'].'</td>
    <td><a class="btn btn-sm btn-success" href="viewrace.php?id='.$row['idRaces'].'">View</a></td>
    <td><a class="btn btn-sm btn-danger" href="includes/deleterace.inc.php?id='.$row['idRaces'].'">Delete</a></td>
    </tr>';
   }