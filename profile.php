<!-- written by Ian Beckett -->
<?php
    $title = 'My Profile';
    $childView = 'views/_profile.php';
    include_once('layouts/default.php');
    include_once('config.php');
    include_once('login_action.php');

    # print user's profile info using the user_profile view 
    $profile_q = "select "$_SESSION['user_id']" from user_profile";
    $result = mysqli_query($conn, $profile_q);

/*     # publish new post # FIXME $_SESSION variables not recognized

    if (isset($_POST['publishPost'])) {
        # validate post info: food, description
        $post = mysqli_real_escape_string($conn, $_REQUEST['publishPost']);
        $query = "insert into post
        values (NULL, $_SESSION['user_id'], $food_id,,,,)"; # FIXME: how do we get food_id?
        $result = mysqli_query($conn, $query) 
    }

    # list my posts ordered by reverse id (recent) WIP
    $query = "select * from post where user_id = "$_SESSION['user_id']" order by post_id desc";
    $result = mysqli_query($conn, $query); */
?>
