<?php
    $title = 'My Profile';
    $childView = 'views/_profile.php';
    include('layouts/default.php');

    # publish new post
    if ($_REQUEST['post']) {
        $post = mysqli_real_escape_string($conn, $_REQUEST['post']);
    }
    # list my posts ordered by reverse id (recent)
?>
