<!-- written by Ian Beckett -->
<?php
    $title = 'My Profile';
    $childView = 'views/_profile.php';
    include('layouts/default.php');
    include('config.php');
    
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
