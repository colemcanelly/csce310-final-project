<?php
/*    <!-- REST API (CRUD Operations) for Calendar Events -->    */
/*    <!-- By: Cole McAnelly                              -->    */
include('config.php');
$method = $_SERVER['REQUEST_METHOD'];

switch ($method) {
  case 'GET':     /* <!-- READ   --> */
    read_event($conn);
    break;
  case 'POST':
    if (isset($_POST['new-meal'])) { /* <!-- CREATE --> */
      create_event($conn);
      break;
    }
    if (isset($_POST['edit-meal'])) { /* <!-- UPDATE --> */
      update_event($conn);
      break;
    }
    if (isset($_POST['delete-meal'])) { /* <!-- DELETE --> */
      delete_event($conn);
      break;
    }
  default:        /* <!-- ERROR --> */
    handle_error();
    echo "ERR: [request type] " . "Invalid request method";
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
      handle_error();
      echo "ERR: [form input] " . "All fields required";      // This should NEVER happen lol
    } else {
      $query = "INSERT INTO meal_event VALUES ($event_id, '$meal_name', \"$meal_date\", '$time_start', '$time_end', $user_id, $food_id);";
      if (mysqli_query($conn, $query)) {
        echo "Submitted";
      } else {
        handle_error();
        echo "ERR: [create event] " . mysqli_error($conn);
      }
    }
  } catch (\Throwable $th) {
    handle_error();
    echo "ERR: [unknown] " . $th;
  }
}

function read_event($conn)
{
  $user_id = 1; //$_SESSION['user_id'];
  $query = "SELECT event_id, meal_name, meal_date, meal_start_time, meal_end_time, food_id FROM meal_event WHERE user_id = $user_id;";
  $result = mysqli_query($conn, $query);
  if ($result) {
    $data = array();
    while ($row = mysqli_fetch_assoc($result)) {
      $datum = new stdClass();
      $datum->title = $row["meal_name"];
      $datum->start = $row["meal_date"] . 'T' . $row["meal_start_time"];
      $datum->end = $row["meal_date"] . 'T' . $row["meal_end_time"];
      $datum->eventId = $row["event_id"];
      $datum->foodId = $row["food_id"];

      $data[] = $datum;
    }
    header('Content-Type: application/json; charset=utf-8', true, 200);
    echo json_encode($data);
  } else {
    handle_error();
    echo "ERR: [read event] " . mysqli_error($conn);
  }
}

function update_event($conn)
{
  try {
    // Query attributes in order
    $event_id = mysqli_real_escape_string($conn, $_POST['edit-event-id']);
    $meal_name = mysqli_real_escape_string($conn, $_POST['edit-event-title']);
    $meal_date = mysqli_real_escape_string($conn, $_POST['edit-event-date']);
    $time_start = mysqli_real_escape_string($conn, $_POST['edit-start-time']);
    $time_end = mysqli_real_escape_string($conn, $_POST['edit-end-time']);
    $food_id = mysqli_real_escape_string($conn, $_POST['edit-food-id']);
    if (                // Check the atts for NULL
      strlen(trim($event_id)) == 0 ||
      strlen(trim($meal_name)) == 0 ||
      strlen(trim($meal_date)) == 0 ||
      strlen(trim($time_start)) == 0 ||
      strlen(trim($time_end)) == 0 ||
      strlen(trim($food_id)) == 0
    ) {
      handle_error();
      echo "ERR: [form input] " . "All fields required";      // This should NEVER happen lol
    } else {
      $query = "" .
        "UPDATE meal_event SET " .
        "meal_name = '$meal_name', " .
        "meal_date = \"$meal_date\", " .
        "meal_start_time = '$time_start', " .
        "meal_end_time = '$time_end', " .
        "food_id = $food_id " .
        "WHERE event_id = $event_id;";
      echo $query;
      if (mysqli_query($conn, $query)) {
        echo "Updated";
      } else {
        handle_error();
        echo "ERR: [update event] " . mysqli_error($conn);
      }
    }
  } catch (\Throwable $th) {
    handle_error();
    echo "ERR: [unknown] " . $th;
  }
}

function delete_event($conn)
{
  try {
    // Query attributes in order
    $event_id = mysqli_real_escape_string($conn, $_POST['edit-event-id']);
    if (strlen(trim($event_id)) == 0) {
      handle_error();
      echo "ERR: [form input] " . "All fields required";      // This should NEVER happen lol
    } else {
      $query = "DELETE FROM meal_event WHERE event_id = $event_id;";
      echo $query;
      if (mysqli_query($conn, $query)) {
        echo "Deleted";
      } else {
        handle_error();
        echo "ERR: [delete event] " . mysqli_error($conn);
      }
    }
  } catch (\Throwable $th) {
    handle_error();
    echo "ERR: [unknown] " . $th;
  }
}

function handle_error()
{
  header('Content-Type: text; charset=utf-8', true, 500);
}
