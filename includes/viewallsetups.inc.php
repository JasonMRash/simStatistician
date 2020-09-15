<?php
  $id = (int)$_SESSION['userId'];
  $sql = 'SELECT nameSetups, idSetups FROM Setups WHERE idUsers = ?';
  $stmt = mysqli_stmt_init($conn);
  if (!mysqli_stmt_prepare($stmt, $sql)) {
    header("Location: setups.php?error=sqlerror");
    exit();
  }
  mysqli_stmt_bind_param($stmt, "i", $id);
  mysqli_stmt_execute($stmt);
  $result = mysqli_stmt_get_result($stmt);
  while($row = mysqli_fetch_assoc($result)) {
    
    echo '<tr>
    <td>'.$row['nameSetups'].'</td>
    <td><a class="btn btn-sm btn-light" href="includes/viewsetup.inc.php?id='.$row['idSetups'].'">View</a></td>
    <td><a class="btn btn-sm btn-warning" href="includes/deletesetup.inc.php?id='.$row['idSetups'].'">Delete</a></td>
    </tr>';
   }