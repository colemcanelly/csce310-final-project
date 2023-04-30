<!-- written by Ian Beckett -->
<?php
if ($_SERVER[ 'REQUEST_METHOD'] == 'POST') { # do we even need this if its already being checked in login.php?
   include_once('config.php');
   include_once('login_tools.php');

    list($success, $data) = validate($conn, $_REQUEST['loginName'], $_REQUEST['loginPassword']);
    if ($success) {
        session_start(); # FIXME warning: Session cannot be started after headers have already been sent in
        $_SESSION['user_id'] = $data['user_id'];
        $_SESSION['first_name'] = $data['first_name'];
        $_SESSION['last_name'] = $data['last_name'];
        load('profile.php');  # home?
        mysqli_close($conn);
    } else { $errors[] = $data; }
}
?>
