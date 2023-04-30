<!-- Margaret Zhuang -->

<?php
$title = 'My Food';
    $childView = 'views/_food.php';
    include('layouts/default.php');
    include('config.php');
  // Get the form data
  $foodName = $_POST['food-name'];
  $calories = $_POST['calories'];
  $protein = $_POST['protein'];
  $carbs = $_POST['carbs'];

  // Create a new post
  $post = array(
    'post_title' => $foodName,
    'post_content' => 'Calories: ' . $calories . ', Protein: ' . $protein . ', Carbs: ' . $carbs,
    'post_status' => 'publish',
    'post_type' => 'post'
  );

  // Insert the post into the database
  $postId = wp_insert_post($post);

  // Redirect the user to the post
  header('Location: ' . get_permalink($postId));
  exit();
?>


<!-- 

<?php
    # publish new post
    if (isset($_POST['publishPost'])) {
        $post = mysqli_real_escape_string($conn, $_REQUEST['publishPost']);
    }

    # list my posts ordered by reverse id (recent) WIP
    $query = "select * from post order by post_id desc";
    $result = mysqli_query($conn, $query);
    print "<table border=1>";
    while ($row = mysqli_fetch_assoc($result)) {
        $fname = $row[''];
        $lname = $row[''];
    }
?>

<?php
    $title = 'My Food';
    $childView = 'views/_food.php';
    include('layouts/default.php');
    include('config.php');

  // Check if form has been submitted
  if(isset($_POST['submit'])) {

    // Connect to database, fill in own details
    $conn = mysqli_connect("localhost", "username", "password", "database_name");

    // Check if connection was successful
    if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
    }

    // Sanitize user input
    $foodName = mysqli_real_escape_string($conn, $_POST['foodName']);

    // Query the database for the food attributes
    $query = "SELECT * FROM food WHERE name='$foodName'";
    $result = mysqli_query($conn, $query);

    // Display the food attributes if the query was successful
    if (mysqli_num_rows($result) > 0) {
      while ($row = mysqli_fetch_assoc($result)) {
        echo "<h2>" . $row['name'] . "</h2>";
        echo "<p>Calories: " . $row['calories'] . "</p>";
        echo "<p>Protein: " . $row['protein'] . "</p>";
        echo "<p>Carbs: " . $row['carbs'] . "</p>";
      }
    } else {
      echo "No food found.";
    }

    // Close connection?
    mysqli_close($conn);
  }
?>

 -->
