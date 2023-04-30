<!-- Margaret Zhuang -->
<?php
$title = 'My Food';
$childView = 'views/_food.php';
include('layouts/default.php');
include('config.php');

if(isset($_POST['postFood'])){
  $foodName = mysqli_real_escape_string($conn, $_POST['foodName']);
  $calories = mysqli_real_escape_string($conn, $_POST['calories']);
  $protein = mysqli_real_escape_string($conn, $_POST['protein']);
  $carbs = mysqli_real_escape_string($conn, $_POST['carbs']);

  $sql = "INSERT INTO food (food_name, calories, protein, carbs) VALUES ('$foodName', '$calories', '$protein', '$carbs')";
  if(mysqli_query($conn, $sql)){
    echo "Food added successfully";
  } else {
    echo "Error: " . mysqli_error($conn);
  }
}
mysqli_close($conn);
?>
