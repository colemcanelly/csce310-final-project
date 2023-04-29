<!-- written by Ian Beckett -->
<?php
if ($_SERVER[ 'REQUEST_METHOD'] == 'POST') { # do we even need this if its already being checked in login.php?
    require('config.php');
    require('login_tools.php');

    list($success, $data) = validate($conn, $_POST['loginEmail'], $_POST['loginPass']);
    if ($success) {
        session_start();
        $_SESSION['user_id'] = $data['user_id'];
        $_SESSION['first_name'] = $data['first_name'];
        $_SESSION['last_name'] = $data['last_name'];
        load('profile.php');  # home?
        mysqli_close($conn);
    } else { $errors[] = $data; }
}
?>
