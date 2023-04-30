<?php
    $title = 'Home Page';
    $childView = 'views/_index.php';
    include_once('layouts/default.php');
    
    # redirect to login page if not logged in
    if (!isset($_SESSION['user_id'])) {
        require('login_tools.php');
        load();
    }
    echo $title;
?>
