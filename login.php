<?php
# written by Ian Beckett and Cole McAnelly
$title = 'Login';
    $childView = 'views/_login.php';
    include('layouts/default.php');
    include('config.php');

    # send form data to server
    # FIXME: detect if theyre trying to login or register to determins which
    # form data to check for
    if ($_SERVER[ 'REQUEST_METHOD'] == 'POST') {
        # use mysql connection script
        if (mysqli_ping($conn)) {
            // echo 'MariaDB Server ' . mysqli_get_server_info($conn).' connected on ' . mysqli_get_host_info($conn);
        }

        # detect if user is doing login or registration      
        if (isset($_POST['login'])) {  # log in
            // echo "Logging in";
            # login data

            } else {  # log in WIP
                
                
/*                 # check that the inputs given match a row in user table
                $email_q = getAttr("select email from user where email = '".$loginName."'", 4); # idk
                $pass_q = getAttr("select passphrase from user where email = '".$loginName."'", 5); # idk
                $email = mysqli_query($conn, $email_q);
                $pass = mysqli_query($conn, $pass_q);
                if ($email == $_POST['loginEmail']) {
                    # go to the user's profile
                    session_start();
                    $_SESSION['user_id'] =
                    load ('profile.php');
                } else {
                    echo "email and password not found";                
                } */
            }
        } else if (isset($_POST['register'])) {  # register
            // echo "Registering";
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
                // echo '<h2>error: missing the following form data: </h2><p id = "error_msg">';
                foreach($errors as $msg) {
                    echo " $msg";
                }
                // echo '<br>try again</p>';
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
