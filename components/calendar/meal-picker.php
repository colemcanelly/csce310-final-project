<?php
/*  All Written By: Cole McAnelly
  This file is a meal selector drop down component to be used in the 
  edit and new events components. It loads the users food from the DB and displays them
  in a dropdown.
*/ 
$userid = $_SESSION['user_id'];
$query = "SELECT * FROM food_id_name WHERE user_id = $userid;";
$result = mysqli_query($conn, $query);
while ($row = mysqli_fetch_assoc($result)) {
  $id = $row["food_id"];
  $name = $row["food_name"];
  echo "<option id= \"{$component_id}--{$id}\" value=\"{$id}\">{$name}</option>";
}
?>