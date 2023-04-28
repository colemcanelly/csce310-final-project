<?php
    $title = 'Login';
    $childView = 'views/_login.php';
    include('layouts/default.php');

    # send form data to server
    # FIXME: detect if theyre trying to login or register to determins which
    # form data to check for
    if ($_SERVER[ 'REQUEST_METHOD'] == 'POST') {
        # use mysql connection script
        if (mysqli_ping($conn)) {
            echo 'MariaDB Server ' . mysqli_get_server_info($conn).
            ' connected on ' . mysqli_get_host_info($conn);
        }

        # detect if user is doing login or registration      
        if (isset($_POST['login'])) {  # log in
            echo "Logging in";
            # login data
            if (empty($_POST['loginName'])) { $errors[] = 'loginName'; }
            else { $loginName = mysqli_real_escape_string($conn, trim($_POST['loginName'])); }
            
            if (empty($_POST['loginPassword'])) { $errors[] = 'loginPassword'; }
            else { $loginPassword = mysqli_real_escape_string($conn, trim($_POST['loginPassword'])); }
            
            if (!empty($errors)) {  # missing form data for expected request
                echo '<h2>error: missing the following form data: </h2>
                <p id = "error_msg">';
                foreach($errors as $msg) {
                    echo " $msg";
                }
                echo '<br>try again</p>';
                mysqli_close($conn);
            } else {  # log in

            }
        } else if (isset($_POST['register'])) {  # register
            echo "Registering";
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
                echo '<h2>error: missing the following form data: </h2>
                <p id = "error_msg">';
                foreach($errors as $msg) {
                    echo " $msg";
                }
                echo '<br>try again</p>';
            } else {  # send query to register new user
                $query = "INSERT INTO user
                VALUES (NULL,'$registerFName','$registerLName','$registerDOB','$registerEmail','$registerPassword','$registerAccountType');";
                $result = mysqli_query($conn, $query);
            }
        } else { $errors[] = 'neither login nor signIn detected'; }  # something went wrong (this shouldn't happen if we do it right)
    }
    mysqli_close($conn);
    exit();
?>
