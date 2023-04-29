<!-- written by Ian Beckett -->
<?php
    $title = 'My Profile';
    $childView = 'views/_profile.php';
    include('layouts/default.php');
    include('config.php');

/*     # profile info
    # we could make this into a view
    # firstname
    $fname_q = "select first_name from user where user_id = '$SESSION["user_id"]'";
    $fname_r = mysqli_query($conn, $fname_q);
    print($fname_r);
    # lastname
    $lname_q = "select first_name from user where user_id = '$SESSION["user_id"]'";
    $lname_r = mysqli_query($conn, $lname_q);
    print($lname_r);
    # DOB
    $dob_q = "select first_name from user where user_id = '$SESSION["user_id"]'";
    $dob_r = mysqli_query($conn, $dob_q);
    print($dob_r);
    # email
    $email_q = "select first_name from user where user_id = '$SESSION["user_id"]'";
    $_r = mysqli_query($conn, $_q);
    print($email_r);
    # account type
    $acctType_q = "select first_name from user where user_id = '$id'";
    $_r = mysqli_query($conn, $_q);
    print($acctType_r); # print the name of the acct type
*/
    
    # publish new post
    if (isset($_POST['publishPost'])) {
        $post = mysqli_real_escape_string($conn, $_REQUEST['publishPost']);
    }

    # list my posts ordered by reverse id (recent) WIP
    $query = "select * from post order by post_id desc";
    $result = mysqli_query($conn, $query);
    print "<table border=1>";
    while ($row = mysqli_fetch_assoc($result)) {
        $fname = $row[''];
        $lname = $row[''];
    }
?>
