<?php
/*    <!-- CRUD Operations for the Admin Event View   -->    */
/*    <!-- All Written By: Cole McAnelly              -->    */
include('config.php');
$method = $_SERVER['REQUEST_METHOD'];

switch ($method) {
  case 'GET':     /* <!-- READ   --> */
    read_event($conn);
    break;
  default:        /* <!-- ERROR --> */
    handle_error();
    echo "ERR: [request type] " . "Invalid request method";
    break;
}

function read_event($conn)
{
  $query = "SELECT event_id, meal_name, food_id, food_name, user.user_id AS user_id, first_name, last_name FROM ((meal_event INNER JOIN user USING (user_id)) INNER JOIN food USING(food_id));";
  $result = mysqli_query($conn, $query);
  if ($result) {
    $data = array();
    while ($row = mysqli_fetch_assoc($result)) {
      $datum = new stdClass();
      $datum->title = $row["meal_name"];
      $datum->eventId = $row["event_id"];
      $datum->foodId = $row["food_id"];
      $datum->foodName = $row["food_name"];
      $datum->userId = $row["user_id"];
      $datum->fname = $row["first_name"];
      $datum->lname = $row["last_name"];

      $data[] = $datum;
    }
    header('Content-Type: application/json; charset=utf-8', true, 200);
    echo json_encode($data);
  } else {
    handle_error();
    echo "ERR: [read event] " . mysqli_error($conn);
  }
}

function handle_error()
{
  header('Content-Type: text; charset=utf-8', true, 500);
}
