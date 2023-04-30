<!-- written by Ian Beckett -->
<?php
    $title = 'My Profile';
    $childView = 'views/_profile.php';
    include('layouts/default.php');
    include('config.php');
    include('login_action.php');

    # print user's profile info using the user_profile view 
    # TODO

/*     # publish new post # FIXME $_SESSION variables not recognized
    if (isset($_POST['publishPost'])) {
        # validate post info: food, description
        $post = mysqli_real_escape_string($conn, $_REQUEST['publishPost']);
        $query = "insert into post
        values (NULL, "$_SESSION['user_id']", ,,,,)";
        $result = mysqli_query($conn, $query)
    }

    # list my posts ordered by reverse id (recent) WIP
    $query = "select * from post where user_id = "$_SESSION['user_id']" order by post_id desc";
    $result = mysqli_query($conn, $query); */
?>
