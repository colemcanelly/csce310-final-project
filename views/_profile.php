<!-- written by Ian Beckett -->
<section>
  <h1>My Profile</h1>
  <?php
  include_once('profile.php');
  ?>
</section>

<!-- <h2>New Food</h2> --> <!-- keeping this in case we decide to put food back in profile instead of its own page -->
 <!-- <form action="">
  <div class="form-outline mb-4">
    <input type="text" id="foodName" name= "foodName" class="form-control" />
    <label class="form-label" for="foodName">food name</label>
  </div>
  <div class="form-outline mb-4">
    <input type="text" id="calories" name= "calories" class="form-control" />
    <label class="form-label" for="calories">calories</label>
  </div>
  <div class="form-outline mb-4">
    <input type="text" id="protein" name= "protein" class="form-control" />
    <label class="form-label" for="protein">protein</label>
  </div>
  <div class="form-outline mb-4">
    <input type="text" id="carbs" name= "carbs" class="form-control" />
    <label class="form-label" for="carbs">carbs</label>
  </div>
  <button type="submit" name="postFood" value="postFood">publish new food</button>
 </form> --> 


<h2>New Post</h2>
<!-- publish post button -->
<form action="">
  <textarea ></textarea>
  <button type="submit" name="publishPost" value="publishPost">post</button>
</form>

<h2>Post History</h2>
