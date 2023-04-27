<?php
    $title = 'Login';
    $childView = 'views/_login.php';
    include('layouts/default.php');
    
    # send form data to server
    if ($_SERVER[ 'REQUEST_METHOD'] == 'POST'){
        # use mysql connection script
        require('./connect_db.php');
        if (mysqli_ping($dbc)) {
            echo 'MariaDB Server ' . msqli_get_server_info($dbc).
            'connected on ' . mysqli_get_host_info($dbc);
        }
        $errors = array();
        if (empty($_POST[''])) {
        }
    }
?>
