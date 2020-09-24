<div class="text-center">
  <strong>Setup Name</strong>
</div>
<select class="form-control form-control-sm" name="setupId" id="setupId">
<option disabled selected value="">Setup Name</option selected>
  <option value="">No Setup/Default</option>
<?php
  $userId =$_SESSION['userId'];
  $sql = "SELECT nameSetups, idSetups FROM Setups WHERE idUsers=?";
  $stmt = mysqli_stmt_init($conn);
  if (!mysqli_stmt_prepare($stmt, $sql)) {
    header("Location: ../setups.php?error=sqlerror");
    exit();
  }
  mysqli_stmt_bind_param($stmt, "i", $userId);
  mysqli_stmt_execute($stmt);
  $result = mysqli_stmt_get_result($stmt);
  while($row = mysqli_fetch_assoc($result)) {
    echo '<option value="'.$row['idSetups'].'">'.$row['nameSetups'].'</option>';
  }
?>
</select>