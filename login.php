<?php
/* written by Ian Beckett and Cole McAnelly */
    $title = 'Login';
    $childView = 'views/_login.php';
    include_once('layouts/default.php');

    if ($_SERVER[ 'REQUEST_METHOD'] == 'POST') {
        # detect if user is doing login or registration      
        if (isset($_POST['login'])) {
            include('login_action.php');  # does this run the script?
        } else if (isset($_POST['register'])) {  # register
            # registration data
            if (empty($_POST['registerFName'])) { $errors[] = 'registerFName'; }
            else { $registerFName = mysqli_real_escape_string($conn, trim($_POST['registerFName'])); }

            if (empty($_POST['registerLName'])) { $errors[] = 'registerLName'; }
            else { $registerLName = mysqli_real_escape_string($conn, trim($_POST['registerLName'])); }
            
            if (empty($_POST['registerDOB'])) { $errors[] = 'registerDOB'; }
            else { $registerDOB = mysqli_real_escape_string($conn, trim($_POST['registerDOB'])); }

            if (empty($_POST['registerEmail'])) { $errors[] = 'registerEmail'; }
            else { $registerEmail = mysqli_real_escape_string($conn, trim($_POST['registerEmail'])); }

            if (empty($_POST['registerPassword'])) { $errors[] = 'registerPassword'; }
            else { $registerPassword = mysqli_real_escape_string($conn, trim($_POST['registerPassword'])); }
            
            if ($_POST['registerPassword'] != $_POST['registerRepeatPassword']) { $errors[] = 'non-matching passwords'; }
            
            if (empty($_POST['registerAccountType'])) { $errors[] = 'registerAccountType'; }
            else { $registerAccountType = mysqli_real_escape_string($conn, trim($_POST['registerAccountType'])); }
            
            if (!empty($errors)) {  # missing form data for expected request
                echo 'error: missing the following form data: <p id = "error_msg">';
                foreach($errors as $msg) {
                    echo " $msg";
                }
                echo '<br>try again</p>';
            } else {  # send query to register new user
                $query = "INSERT INTO user
                VALUES (NULL,'$registerFName','$registerLName','$registerDOB','$registerEmail','$registerPassword','$registerAccountType');";
                $result = mysqli_query($conn, $query);
            }
        } else { $errors[] = 'neither login nor signIn detected'; }
    }
    mysqli_close($conn);
    exit();
?>