<!-- written by Ian Beckett -->
<section>
  <?php
    echo $title;
    # profile info (need to get user_id from somewhere for these queries to work)
    # we could make this into a view
    # firstname
    $fname = getSingle("select first_name from user where user_id = '".$id."'");
    print($fname);
    # lastname
    $lname = getSingle("select first_name from user where user_id = '".$id."'");
    print($lname);
    # DOB
    $dob = getSingle("select first_name from user where user_id = '".$id."'");
    print($dob);
    # email
    $email = getSingle("select first_name from user where user_id = '".$id."'");
    print($email);
    # account type
    $acctType = getSingle("select first_name from user where user_id = '".$id."'");
    print($acctType);
  ?>
</section>

<h2>New Food</h2>
<form action="">
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
  <!-- publish food button -->
  <button type="submit" name="postFood" value="postFood">publish new food</button>
</form>

<h2>New Post</h2>
<!-- food dropdown selects an option from food table -->
<!-- publish post button -->
<form action="">
  <textarea ></textarea>
  <button type="submit" name="publishPost" value="publishPost">post</button>
</form>

<h2>Post History</h2>
