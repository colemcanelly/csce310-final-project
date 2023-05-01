<!-- Margaret Zhuang -->
<?php
$title = 'My Food';
$childView = 'views/_food.php';
include('layouts/default.php');
include_once('config.php');

if (isset($_POST['postFood'])) {
  $food_name = mysqli_real_escape_string($conn, $_POST['food_name']);
  $calories = mysqli_real_escape_string($conn, $_POST['calories']);
  $protein = mysqli_real_escape_string($conn, $_POST['protein']);
  $carbs = mysqli_real_escape_string($conn, $_POST['carbs']);

  // error check: prompt user to not leave any field blank
  if (strlen(trim($food_name)) == 0 || strlen(trim($calories)) == 0 || strlen(trim($protein)) == 0 || strlen(trim($carbs)) == 0) {
    $error = "All fields are required";
  } else {
    // check if food name already exists in database
    $check_query = "SELECT * FROM food WHERE food_name = '$food_name'";
    $check_result = mysqli_query($conn, $check_query);
    if (mysqli_num_rows($check_result) > 0) {
      // food already exists, update their values
      $update_query = "UPDATE food SET calories = '$calories', protein = '$protein', carbs = '$carbs' WHERE food_name = '$food_name'";
      if (mysqli_query($conn, $update_query)) {
        $success = "Food updated successfully";
      } else {
        $error = "Error updating food: " . mysqli_error($conn);
      }
    } else {
      // food doesn't exist, insert new row
      $insert_query = "INSERT INTO food (food_name, calories, protein, carbs) VALUES ('$food_name', '$calories', '$protein', '$carbs')";
      if (mysqli_query($conn, $insert_query)) {
        $success = "Food added successfully";
      } else {
        $error = "Error adding food: " . mysqli_error($conn);
      }
    }
  }
}
mysqli_close($conn);

?>
