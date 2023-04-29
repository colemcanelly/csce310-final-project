<!-- written by Ian Beckett -->
<?php
    $title = 'My Profile';
    $childView = 'views/_profile.php';
    include('layouts/default.php');

    function query($query) {
        $result = mysqli_query($conn, $query);
        return $result;
      }
      
    function getSingle($query) {
    $result = query($query);
    $row = mysql_fetch_row($result);
    return $row[0];
    }
      
    # profile info (need to get user_id from somewhere for these queries to work)
    # firstname
    $fname = getSingle("select first_name from user where user_id = '".$id."'");
    print($fname);
    # lastname
    $lname = getSingle("select first_name from user where user_id = '".$id."'");
    print($lname);
    # DOB
    $dob = getSingle("select first_name from user where user_id = '".$id."'");
    print($dob);
    # email
    $email = getSingle("select first_name from user where user_id = '".$id."'");
    print($email);
    # account type
    $acctType = getSingle("select first_name from user where user_id = '".$id."'");
    print($acctType);
    
    # publish new post
    if (isset($_POST['publishPost'])) {
        $post = mysqli_real_escape_string($conn, $_REQUEST['publishPost']);
    }

    # list my posts ordered by reverse id (recent)
    $result = query("select * from post order by post_id desc");
    print "<table border=1>";
    while ($row = mysqli_fetch_assoc($result)) {
        $fname = $row[''];
        $lname = $row[''];
    }
?>
