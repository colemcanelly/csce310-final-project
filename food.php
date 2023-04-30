<!-- Margaret Zhuang -->
<?php
$title = 'My Food';
$childView = 'views/_food.php';
include_once('layouts/default.php');
include_once('config.php');

if(isset($_POST['postFood'])){
  $foodName = mysqli_real_escape_string($conn, $_POST['foodName']);
  $calories = mysqli_real_escape_string($conn, $_POST['calories']);
  $protein = mysqli_real_escape_string($conn, $_POST['protein']);
  $carbs = mysqli_real_escape_string($conn, $_POST['carbs']);

  // error check: prompt user to not leave any field blank
  if(strlen(trim($foodName)) == 0 || strlen(trim($calories)) == 0 || strlen(trim($protein)) == 0 || strlen(trim($carbs)) == 0) {
    $error = "All fields are required";
  } else {
    $query = "INSERT INTO food (food_name, calories, protein, carbs) VALUES ('$foodName', '$calories', '$protein', '$carbs')";
    if (mysqli_query($conn, $query)) {
      $success = "Food added successfully";
    } else {
      $error = "Error adding food: " . mysqli_error($conn);
    }
  }
}
mysqli_close($conn);
?>
