<!-- written by Ian Beckett -->
<?php
    $title = 'My Profile';
    $childView = 'views/_profile.php';
    include('layouts/default.php');
    include_once('config.php');
    include('login_action.php');

    # FIXME unexpected variable "$_SESSION" <-- THIS BREAKS EVERYTHING
    # print user's profile info using the user_profile view 
    $uid = $_SESSION[user_id];
    $profile_q = "select uid from user_profile";
    $result = mysqli_query($conn, $profile_q);

    # publish new post 
    if (isset($_POST['publishPost'])) {
        # validate post info: food, description
        $post = mysqli_real_escape_string($conn, $_REQUEST['publishPost']);
        $fid = 
        $query = "insert into post values
        (NULL, uid, $food_id, , , , )"; # how do we get food_id?
        $result = mysqli_query($conn, $query) 
    }

    # list my posts ordered by reverse id (recent) WIP
    $query = "select * from post where user_id = uid order by post_id desc";
    $result = mysqli_query($conn, $query);
?>
