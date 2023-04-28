<?php
    $title = 'Login';
    $childView = 'views/_login.php';
    include('layouts/default.php');
    
    # send form data to server
    if ($_SERVER[ 'REQUEST_METHOD'] == 'POST') {
        # use mysql connection script
        require('./connect_db.php');
        if (mysqli_ping($conn)) {
            echo 'MariaDB Server ' . mysqli_get_server_info($conn).
            ' connected on ' . mysqli_get_host_info($conn);
        }
        # login data
        if (empty($_POST['loginName'])) { $errors[] = 'loginName'; }
        else { $loginName = mysqli_real_escape_string($conn, trim($_POST['loginName'])); }

        if (empty($_POST['loginPassword'])) { $errors[] = 'loginPassword'; }
        else { $loginPassword = mysqli_real_escape_string($conn, trim($_POST['loginName'])); }
        
        #registration data
        if (empty($_POST['registerFName'])) { $errors[] = 'registerFName'; }
        else { $registerFName = mysqli_real_escape_string($conn, trim($_POST['loginName'])); }
        
        if (empty($_POST['registerLName'])) { $errors[] = 'registerLName'; }
        else { $registerLName = mysqli_real_escape_string($conn, trim($_POST['loginName'])); }
        
        if (empty($_POST['registerEmail'])) { $errors[] = 'registerEmail'; }
        else { $registerEmail = mysqli_real_escape_string($conn, trim($_POST['loginName'])); }
       
        if (empty($_POST['registerPassword'])) { $errors[] = 'registerPassword'; }
        else { $registerPassword = mysqli_real_escape_string($conn, trim($_POST['loginName'])); };
       
        if (empty($_POST['registerRepeatPassword'])) { $errors[] = 'registerRepeatPassword'; }
        else { $registerRepeatPassword = mysqli_real_escape_string($conn, trim($_POST['loginName']));
    }
?>
