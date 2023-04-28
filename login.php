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
        else { $loginPassword = mysqli_real_escape_string($conn, trim($_POST['loginPassword'])); }
        
        #registration data
        if (empty($_POST['registerFName'])) { $errors[] = 'registerFName'; }
        else { $registerFName = mysqli_real_escape_string($conn, trim($_POST['registerFName'])); }
        
        if (empty($_POST['registerLName'])) { $errors[] = 'registerLName'; }
        else { $registerLName = mysqli_real_escape_string($conn, trim($_POST['registerLName'])); }
        
        if (empty($_POST['registerEmail'])) { $errors[] = 'registerEmail'; }
        else { $registerEmail = mysqli_real_escape_string($conn, trim($_POST['registerEmail'])); }
       
        if (empty($_POST['registerPassword'])) { $errors[] = 'registerPassword'; }
        else { $registerPassword = mysqli_real_escape_string($conn, trim($_POST['registerPassword'])); }
       
        # we don't need to send this to the DB; just use it to check that they match
        if (empty($_POST['registerRepeatPassword'])) { $errors[] = 'registerRepeatPassword'; }
        else { $registerRepeatPassword = mysqli_real_escape_string($conn, trim($_POST['registerRepeatPassword'])); }

        if (empty($errors)) {# insert the data into the DB table
            $query = "INSERT INTO user (first_name, last_name, dob, email, passphrase, account_type)
                VALUES ();";
            $result = mysqli_query($conn, $query);
        } else {
            echo '<h2>error: missing the following form data: </h2>
            <p id = "error_msg">';
            foreach($errors as $msg) {
                echo " $msg";
            }
            echo '<br>try again</p>';
            mysqli_close($conn);
        }
    }
?>
