<!-- written by Ian Beckett-->
<?php
if ($_SERVER[ 'REQUEST_METHOD'] == 'POST') { # do we even need this if its already being checked in login.php?
   include('config.php');
   include('login_tools.php');

    list($success, $data) = validate($conn, $_REQUEST['loginName'], $_REQUEST['loginPassword']);
    if ($success) {
        # using session data instead of cookies so user doesn't disable it
        $_SESSION['user_id'] = $data['user_id'];
        $_SESSION['first_name'] = $data['first_name'];
        $_SESSION['last_name'] = $data['last_name'];
        mysqli_close($conn);
    } else { $errors[] = $data; }
}
?>
