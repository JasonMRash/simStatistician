<div class="text-center">
  <strong>Game Name</strong>
</div>
<select class="form-control form-control-sm" name="gameId" id="gameId">
  <option disabled selected value="">Select Game</option selected>
<?php
  $userId =$_SESSION['userId'];
  $sql = "SELECT nameGames, idGames FROM Games WHERE idUsers=?";
  $stmt = mysqli_stmt_init($conn);
  if (!mysqli_stmt_prepare($stmt, $sql)) {
    header("Location: ../setups.php?error=sqlerror");
    exit();
  }
  mysqli_stmt_bind_param($stmt, "i", $userId);
  mysqli_stmt_execute($stmt);
  $result = mysqli_stmt_get_result($stmt);
  while($row = mysqli_fetch_assoc($result)) {
    echo '<option value="'.$row['idGames'].'">'.$row['nameGames'].'</option>';
  }
?>
</select>