<?php
/*    <!-- REST API (CRUD Operations) for Calendar Events -->    */
/*    <!-- By: Cole McAnelly                              -->    */
include('config.php');
$method = $_SERVER['REQUEST_METHOD'];

switch ($method) {
  case 'POST':    /* <!-- CREATE --> */
    create_event($conn);
    break;
  case 'GET':     /* <!-- READ   --> */
    read_event($conn);
    break;
  case 'PUT':     /* <!-- UPDATE --> */
    update_event($conn);
    break;
  case 'DELETE':  /* <!-- DELETE --> */
    delete_event($conn);
    break;
  default:        /* <!-- ERROR --> */
    handle_error($conn);
    break;
}

function create_event($conn)
{
  try {
    // Query attributes in order
    $event_id = 'default';   // NULL so PK can auto-increment
    $meal_name = mysqli_real_escape_string($conn, $_POST['event-title']);
    $meal_date = mysqli_real_escape_string($conn, $_POST['event-date']);
    $time_start = mysqli_real_escape_string($conn, $_POST['start-time']);
    $time_end = mysqli_real_escape_string($conn, $_POST['end-time']);
    $user_id = $_SESSION['user_id'];
    $food_id = mysqli_real_escape_string($conn, $_POST['food-id']);
    if (                // Check the atts for NULL
      strlen(trim($meal_name)) == 0 ||
      strlen(trim($meal_date)) == 0 ||
      strlen(trim($time_start)) == 0 ||
      strlen(trim($time_end)) == 0 ||
      strlen(trim($food_id)) == 0
    ) {
      echo "ERR: [form input] " . "All fields required";      // This should NEVER happen lol
    } else {
      $query = "INSERT INTO meal_event VALUES ($event_id, '$meal_name', \"$meal_date\", '$time_start', '$time_end', $user_id, $food_id);";
      if (mysqli_query($conn, $query)) {
        echo "Submitted";
      } else {
        echo "ERR: [create event] " . mysqli_error($conn);
      }
    }
  } catch (\Throwable $th) {
    echo "ERR: [unknown] " . $th;
  }
}

function read_event($conn)
{
}

function update_event($conn)
{
}

function delete_event($conn)
{
}

function handle_error($conn)
{
}
