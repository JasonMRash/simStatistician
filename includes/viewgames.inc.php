<?php
  $sql = 'SELECT nameGames, idGames FROM Games';
  $stmt = mysqli_query( $conn, $sql );
   
  if(! $stmt ) {
    header("Location: ../games.php?error=sqlerror");
    exit();
  }
   
  while($row = mysqli_fetch_assoc($stmt)) {
    echo '<tr>
    <td>'.$row['nameGames'].'</td>
    <td><a href="includes/deletegames.inc.php?id='.$row['idGames'].'">Delete</a></td>
    </tr>';
   }