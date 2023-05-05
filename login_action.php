<!-- written by Ian Beckett-->
<!-- validates login and saves the relevant data as session variable for use
in the rest of the website -->
<?php
if ($_SERVER[ 'REQUEST_METHOD'] == 'POST') { # do we even need this if its already being checked in login.php?
   include('api/config.php');
   include_once('login_tools.php');

    list($success, $data) = validate($conn, $_REQUEST['loginName'], $_REQUEST['loginPassword']);
    if ($success) {
        # using session data instead of cookies so user doesn't disable it
        $_SESSION['user_id'] = $data['user_id'];
        $_SESSION['first_name'] = $data['first_name'];
        $_SESSION['last_name'] = $data['last_name'];
        $_SESSION['account_type'] = $data['account_type'];
        mysqli_close($conn);
    } else { $errors[] = $data; }
}
?>
