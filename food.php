<!-- Margaret Zhuang -->
<?php
$title = 'My Food';
$childView = 'views/_food.php';
include('layouts/default.php');
include_once('config.php');

if (isset($_POST['postFood'])) {
  $food_id = mysqli_real_escape_string($conn, $_POST['foodId']);
  $food_name = mysqli_real_escape_string($conn, $_POST['foodName']);
  $calories = mysqli_real_escape_string($conn, $_POST['calories']);
  $protein = mysqli_real_escape_string($conn, $_POST['protein']);
  $carbs = mysqli_real_escape_string($conn, $_POST['carbs']);

  // error check: prompt user to not leave any field blank
  if (strlen(trim($food_id)) == 0 ||strlen(trim($food_name)) == 0 || strlen(trim($calories)) == 0 || strlen(trim($protein)) == 0 || strlen(trim($carbs)) == 0) {
    $error = "All fields are required";
  } else {
    // Check if food_id already exists in database
    $existing_food = mysqli_query($conn, "SELECT * FROM food WHERE food_id = '$food_id'");
    if(mysqli_num_rows($existing_food) > 0) {
      // Update existing food item
      $query = "UPDATE food SET food_name='$food_name', calories='$calories', protein='$protein', carbs='$carbs' WHERE food_id='$food_id'";
      if (mysqli_query($conn, $query)) {
        $success = "Food updated successfully";
      } else {
        $error = "Error updating food: " . mysqli_error($conn);
      }
    } else {
      // Insert new food item
      $query = "INSERT INTO food (food_id, food_name, calories, protein, carbs) VALUES ('$food_id', '$food_name', '$calories', '$protein', '$carbs')";
      if (mysqli_query($conn, $query)) {
        $success = "Food added successfully";
      } else {
        $error = "Error adding food: " . mysqli_error($conn);
      }
    }
  }
}

// Delete selected food item
if (isset($_POST['deleteFood'])) {
  $foodId = $_POST['deleteFoodId'];
  if (empty($foodId)) {
    echo "Please enter a food id to delete.";
  } else {
    $query = "DELETE FROM food WHERE food_id = $foodId";
    $result = mysqli_query($conn, $query);
    if (!$result) {
      echo "Error deleting food: " . mysqli_error($conn);
    } else if (mysqli_affected_rows($conn) == 0) {
      echo "No food found with id $foodId.";
    } else {
      echo "Food with id $foodId deleted successfully!";
    }
  }
}

mysqli_close($conn);

?>
