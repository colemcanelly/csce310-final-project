<?php
    $title = 'Login';
    $childView = 'views/_login.php';
    include('layouts/default.php');
    
    # send form data to server
    if ($_SERVER[ 'REQUEST_METHOD'] == 'POST'){
        require('./connect_db.php');
        $errors = array();
        if (empty($_POST[''])) {
            ;
        }
    }
?>
