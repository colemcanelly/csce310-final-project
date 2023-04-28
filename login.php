<?php
    $title = 'Login';
    $childView = 'views/_login.php';
    include('layouts/default.php');

    # send form data to server
    # FIXME: detect if theyre trying to login or register to determins which
    # form data to check for
    if ($_SERVER[ 'REQUEST_METHOD'] == 'POST') {
        # use mysql connection script
        require('./connect_db.php');
        if (mysqli_ping($conn)) {
            echo 'MariaDB Server ' . mysqli_get_server_info($conn).
            ' connected on ' . mysqli_get_host_info($conn);
        }

        if (empty($_POST['loginName'])) { $errors[] = 'loginName'; }
        else { $loginName = mysqli_real_escape_string($conn, trim($_POST['loginName'])); }
        
        if (empty($_POST['registerFName'])) { $errors[] = 'registerFName'; }
        else { $registerFName = mysqli_real_escape_string($conn, trim($_POST['registerFName'])); }
        
        # detect if user is doing login or registration
        if (!empty($_POST['registerFName'])) {
            $request = 0;
        }

        if (!empty($_POST['loginName'])) {
            $request = 1;
        }

        if ($request == 0) { # register
            # login data
            if (empty($_POST['loginPassword'])) { $errors[] = 'loginPassword'; }
            else { $loginPassword = mysqli_real_escape_string($conn, trim($_POST['loginPassword'])); }

        } else if ($request == 1) { # log in
            #registration data
            if (empty($_POST['registerLName'])) { $errors[] = 'registerLName'; }
            else { $registerLName = mysqli_real_escape_string($conn, trim($_POST['registerLName'])); }
            
            if (empty($_POST['registerdob'])) { $errors[] = 'registerdob'; }
            else { $registerdob = mysqli_real_escape_string($conn, trim($_POST['registerdob'])); }

            if (empty($_POST['registerEmail'])) { $errors[] = 'registerEmail'; }
            else { $registerEmail = mysqli_real_escape_string($conn, trim($_POST['registerEmail'])); }

            if (empty($_POST['registerPassword'])) { $errors[] = 'registerPassword'; }
            else { $registerPassword = mysqli_real_escape_string($conn, trim($_POST['registerPassword'])); }

            if ($_POST['registerPassword'] != $_POST['registerRepeatPassword']) { $errors[] = 'non-matching passwords'; }

            if (empty($_POST['registerAccountType'])) { $errors[] = 'registerAccountType'; }
            else { $registerAccountType = mysqli_real_escape_string($conn, trim($_POST['registerAccountType'])); }

            # insert the data into the DB for login or log the user in and navigate to their profile
            if (empty($errors)) {
                if ($request == 0) {
                    $query = "INSERT INTO user (first_name, last_name, dob, email, passphrase, account_type)
                        VALUES ($registerFName, $registerLName, $registerdob, $registerEmail, $registerPassword, $registerAccountType);";
                    $result = mysqli_query($conn, $query);
                }
                if ($request == 1) {
                    # log in and go to profile
                }
            } else { # missing form data for expected request
                echo '<h2>error: missing the following form data: </h2>
                <p id = "error_msg">';
                foreach($errors as $msg) {
                    echo " $msg";
                }
                echo '<br>try again</p>';
                mysqli_close($conn);
            }
        }
    }
?>
