<!-- written by Ian Beckett 
used by login_action to perform login validation
-->
<?php
# check login credentials
function validate($conn, $email='', $pwd='') {
    if (empty($email)) { $errors[] = 'enter email address'; }
    else { $e = mysqli_real_escape_string($conn, trim($email)); }
    
    if (empty($pwd)) { $errors[] = 'enter password'; }
    else { $p = mysqli_real_escape_string($conn, trim($pwd)); }
    if (empty($errors)) {
        $query = "select user_id, first_name, last_name from user where email = '$e' and passphrase = '$p'";
        $result = mysqli_query($conn, $query);
        if (mysqli_num_rows($result) == 1) {
            $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
            return array(true, $row);
        } else {
            $errors[] = 'login info not found. ';
            return array(false, $errors);
        }
    }
}
?>
