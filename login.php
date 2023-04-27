<?php
    $title = 'Login';
    $childView = 'views/_login.php';
    include('layouts/default.php');
    
    # send form data to server
    if ($_SERVER[ 'REQUEST_METHOD'] == 'POST') {
        # use mysql connection script
        require('./connect_db.php');
        if (mysqli_ping($db)) {
            echo 'MariaDB Server ' . mysqli_get_server_info($db).
            ' connected on ' . mysqli_get_host_info($db);
        }
       /*  if (empty($_POST['loginName'])) { $errors[] = 'loginName'; }
        else { $loginName = trim($_POST['loginName']); } */
    }
?>
