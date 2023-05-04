<!-- Created by Cole McAnelly -->
<select required id="food-id" name="food-id" class="select form-control active" value="">
  <?php
  $userid = $_SESSION['user_id'];
  $query = "SELECT food_id, food_name FROM food WHERE user_id = $userid;";
  $result = mysqli_query($conn, $query);
  while ($row = mysqli_fetch_assoc($result)) {
    $id = $row["food_id"];
    $name = $row["food_name"];
    echo "<option value=\"{$id}\">{$name}</option>";
  }
  ?>
</select>
<!-- DONE: Get meals from database -->