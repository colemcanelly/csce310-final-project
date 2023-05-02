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
    <label class="form-label" for="foodId">Food ID</label>
    <br>
    <input type="text" id="foodId" name="foodId" class="form-control" />
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

  <hr>

  <h2>Get Food Info</h2>
  <form action="food.php" method="post">
    <div class="form-outline mb-4">
      <label class="form-label" for="getFoods">Enter Existing Food Name</label>
      <br>
      <input type="text" id="getFoods" name="getFoods" class="form-control" />
    </div>
    <!-- publish food button -->
    <button type="submit" name="searchFood" value="searchFood">Search Food</button>
  </form>

  <hr>

  <h2>Delete Food</h2>
<form action="food.php" method="post">
  <div class="form-outline mb-4">
    <label class="form-label" for="deleteFoodId">Food ID</label>
    <br>
    <input type="text" id="deleteFoodId" name="deleteFoodId" class="form-control" />
  </div>
  <!-- delete food button -->
  <button type="submit" name="deleteFood" value="deleteFood">Delete Food</button>
</form>
  
</form>
