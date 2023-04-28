<?php
    $title = 'Home Page';
    $childView = 'views/_index.php';
    include('layouts/default.php');
    include('./connect_db.php');

# convenient functions
function query($query) {
    $result = mysqli_query($conn, $query);
    return $result;
}

?>
