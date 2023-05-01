<!--Margaret Zhuang-->
<?php if(isset($success)): ?>
  <div class="alert alert-success"><?php echo $success; ?></div>
<?php endif; ?>
<?php if(isset($error)): ?>
  <div class="alert alert-danger"><?php echo $error; ?></div>
<?php endif; ?>


<h2>New Food</h2>
<form action="food.php" method="post">
<div class="form-outline mb-4">
    <label class="form-label" for="foodName">Food Name</label>
    <br>
    <input type="text" id="foodName" name="foodName" class="form-control" />
  </div>
  <div class="form-outline mb-4">
    <label class="form-label" for="calories">Calories</label>
    <br>
    <input type="text" id="calories" name="calories" class="form-control" />
  </div>
  <div class="form-outline mb-4">
    <label class="form-label" for="protein">Protein</label>
    <br>
    <input type="text" id="protein" name="protein" class="form-control" />
  </div>
  <div class="form-outline mb-4">
    <label class="form-label" for="carbs">Carbs</label>
    <br>
    <input type="text" id="carbs" name="carbs" class="form-control" />
  </div>
  <!-- publish food button -->
  <button type="submit" name="postFood" value="postFood">Publish New Food</button>
</form>


<!-- food dropdown selects an option from food table, NOTE: add_post.php does not exist currently -->
<form action="add_post.php" method="post">
  <div class="form-outline mb-4">
    <select name="foodName">
      <option value="">Select a food</option>
      <?php
        include('config.php');
        $query = "SELECT food_name FROM food";
        $result = mysqli_query($conn, $query);
        while ($row = mysqli_fetch_assoc($result)) {
          echo '<option value="'.$row['food_name'].'">'.$row['food_name'].'</option>';
        }
      ?>
    </select>
  </div>
</form>
