<!-- written by Ian Beckett -->
<?php
    $title = 'My Profile';
    $childView = 'views/_profile.php';
    include('layouts/default.php');

    # publish new post
    if (isset($_POST['publishPost'])) {
        $post = mysqli_real_escape_string($conn, $_REQUEST['publishPost']);
    }
    # list my posts ordered by reverse id (recent)
?>
