<!-- Margaret Zhuang -->
<?php
$title = 'My Food';
$childView = 'views/_food.php';
include('layouts/default.php');
include_once('middleware/config.php');

if (isset($_POST['postFood'])) {
  $food_name = mysqli_real_escape_string($conn, $_POST['foodName']);
  $calories = mysqli_real_escape_string($conn, $_POST['calories']);
  $protein = mysqli_real_escape_string($conn, $_POST['protein']);
  $carbs = mysqli_real_escape_string($conn, $_POST['carbs']);

  // error check: prompt user to not leave any field blank
  if (strlen(trim($food_name)) == 0 || strlen(trim($calories)) == 0 || strlen(trim($protein)) == 0 || strlen(trim($carbs)) == 0) {
    echo "All fields are required";
  } else {
    // Check if food_id already exists in database
    $existing_food = mysqli_query($conn, "SELECT * FROM food WHERE food_name = '$food_name'");
    if(mysqli_num_rows($existing_food) > 0) {
      // Update existing food item
      $query = "UPDATE food SET calories='$calories', protein='$protein', carbs='$carbs' WHERE food_name='$food_name'";
      if (mysqli_query($conn, $query)) {
        echo "Food updated successfully";
      } else {
        echo "Error updating food: " . mysqli_error($conn);
      }
    } else {
      // Insert new food item
      $userid = $_SESSION['user_id'];   // colemcanelly
      $query = "INSERT INTO food (food_id, user_id, food_name, calories, protein, carbs) VALUES (NULL, $userid,'$food_name', '$calories', '$protein', '$carbs')";
      if (mysqli_query($conn, $query)) {
        echo "Food added successfully";
      } else {
        echo "Error adding food: " . mysqli_error($conn);
      }
    }
  }
}

//use a view to show how many foods have the same name?
if (isset($_POST['searchFood'])) {
  // Retrieve the food name entered by the user
  $foodName = mysqli_real_escape_string($conn, $_POST['getFoods']);

  // Query the food_names view to get the food ids associated with the given food name
  $query = "SELECT food_ids FROM food_names WHERE food_name = '$foodName';";
  $result = mysqli_query($conn, $query);

  // Check if the query returned any rows
  if (mysqli_num_rows($result) > 0) {
      // Output the food ids associated with the given food name
      $row = mysqli_fetch_assoc($result);
      echo "Food IDs for $foodName: " . $row['food_ids'];
  } else {
      // Output a message indicating that no foods were found with the given name
      echo "No foods found with name: $foodName";
  }
}

  // delete this?
  // Delete selected food item
  // if (isset($_POST['deleteFood'])) {
  //   $foodId = $_POST['deleteFoodId'];
  //   if (empty($foodId)) {
  //     echo "Please enter a food id to delete.";
  //   } else {
  //     $query = "DELETE FROM food WHERE food_id = $foodId";
  //     echo "Delete successful";
  //     // Execute the query and retrieve the results
  //     $result = mysqli_query($conn, $query);
  //     if (!$result) {
  //       echo "Error deleting food: " . mysqli_error($conn);
  //     } else if (mysqli_affected_rows($conn) == 0) {
  //       echo "No food found with id $foodId.";
  //     }
  //   }
  // }

//Get food info with cals
// Retrieve the user input for the minimum number of calories
if (isset($_POST['searchCals'])){
  // Retrieve the user input for the minimum number of calories
  $minCalories = mysqli_real_escape_string($conn, $_POST['calCount']);
  // error check: prompt user to not leave any field blank
  if (strlen(trim($minCalories)) == 0 ) {
    echo "Enter a number";
  }else{
    // Build the query to retrieve the foods with more calories than the user input
    //$query = "SELECT * FROM food WHERE calories > $minCalories ORDER BY food_name ASC";
    $query = "SELECT * FROM food USE INDEX (idx_calories) WHERE calories > $minCalories ORDER BY food_name ASC";

    // Execute the query and retrieve the results
    $result = mysqli_query($conn, $query);

    // Check if any rows were returned
    if (mysqli_num_rows($result) > 0) {
        // Loop through the rows and display the foods
        while ($row = mysqli_fetch_assoc($result)) {
            // Output the food information
            echo "<p>Food Name: " . $row['food_name'] . "</p>";
            echo "<p>Food ID: " . $row['food_id'] . "</p>";
            echo "<p>Calories: " . $row['calories'] . "</p>";
            echo "<p>Protein: " . $row['protein'] . "</p>";
            echo "<p>Carbs: " . $row['carbs'] . "</p>";
        }
    } else {
        // No foods were found with more calories than the user input
        echo "<p>No foods found with more than $minCalories calories.</p>";
    }
  }

  }
