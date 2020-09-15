<select class="form-control form-control-sm" name="games" id="games">
  <option value="">Select Game</option selected>
<?php
  $userID =$_SESSION['userID'];
  $sql = "SELECT nameGames FROM Games WHERE idUsers=?";
  $stmt = mysqli_stmt_init($conn);
  if (!mysqli_stmt_prepare($stmt, $sql)) {
    header("Location: ../setups.php?error=sqlerror");
    exit();
  }
  mysqli_stmt_bind_param($stmt, "i", $id);
  mysqli_stmt_execute($stmt);
  $result = mysqli_stmt_get_result($stmt);
  while($row = mysqli_fetch_assoc($result)) {
    echo '<option value="'.$row['nameGames'].'">'.$row['nameGames'].'</option>';
  }
?>
</select>