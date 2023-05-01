<!-- written by Ian Beckett -->
<?php
    $title = 'My Profile';
    $childView = 'views/_profile.php';
    include('layouts/default.php');
    include_once('config.php');
    include('login_action.php');
?>
<section>
<h1>My Profile</h1>
</section>
<?php
    # print user's profile info
    $uid = $_SESSION["user_id"];
    $user_q = "select * from user where user_id = " . $uid;
    $result = $conn->query($user_q);
    $row = $result->fetch_assoc();
    echo "Name: " . $row["first_name"] . " " . $row["last_name"] . "<br>";
    echo "Email: " . $row["email"] . "<br>";
    echo "Date of Birth: " . $row["dob"] . "<br>";
    echo "Account: ";
    if ($row["account_type"] == 2) echo "admin <br>"; else echo "member <br>";

    # using a view, show info about foods this user has added
    $profile_q = "select $uid from user_profile"; # ???
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
          echo "Name: " . $row["first_name"] . " " . $row["last_name"] . "<br>";
        }
    } else {
        echo "0 results";
    }
?>
<h2>New Post</h2>
<!-- publish post button -->
<form action="">
<textarea ></textarea>
<button type="submit" name="publishPost" value="publishPost">post</button>
</form>
<?php
    # publish new post
    if (isset($_POST['publishPost'])) {
        # validate post info: food, description
        $post = mysqli_real_escape_string($conn, $_REQUEST['publishPost']);
        /*         $fid = 
        $query = "insert into post values
        (NULL, uid, $food_id, , , , )"; # how do we get food_id?
        $result = mysqli_query($conn, $query)  */
    }
?>
<h2>My Post History</h2>
<?php
    # list my posts ordered by reverse id (recent) WIP
    /* maybe make a new view that combines food info and post info */
    $query = "select * from post where user_id = $uid order by post_id desc";
    $result = mysqli_query($conn, $query);
?>
