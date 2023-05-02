<!-- written by Ian Beckett -->
<?php
    $title = 'My Profile';
    $childView = 'views/_profile.php';
    include('layouts/default.php');
    include_once('config.php');
?>

<section>
<h1>My Profile</h1>
</section>
<?php
    # print user's profile info
    if (!$_SESSION["user_id"]) echo "<h2>please log in to view your profile.</h2>";
    $uid = $_SESSION["user_id"];
    $user_q = "select * from user where user_id = ".$uid;
    $result = $conn->query($user_q);
    $row = $result->fetch_assoc();
    echo "Name: ".$row["first_name"]." | ".$row["last_name"]."<br>";
    echo "Email: ".$row["email"]."<br>";
    echo "Date of Birth: ".$row["dob"]."<br>";
    echo "Account: ";
    if ($row["account_type"] == 2) echo "admin <br>"; else echo "member <br>";
?>
<section>
<h2>My Foods</h2>
</section>
<?php
    # using a view, show foods this user has added
    echo "Name | Calories | Protein | Carbs<br>";
    $profile_q = "select food_name, calories, protein, carbs from food where user_id = ".$uid;
    $result = $conn->query($profile_q);
    if ($result->num_rows > 0) { # apparently returns true even on empty set; find alternative
        while($row = $result->fetch_assoc()) {
          echo $row["food_name"]." | ".$row["calories"]." | ".$row["protein"]." | ".$row["carbs"]."<br>";
        }
    } else {
        echo "0 results";
    }
    ?>

<section>
<h2>My Post History</h2>
</section>
<?php
    echo "post ID | Food | Description<br>";
    # list my posts ordered by reverse id (recent) WIP
    $post_q = "select * from post where user_id = $uid and flag = 0 order by post_id desc";
    $post_r = mysqli_query($conn, $post_q);
    if ($post_r->num_rows > 0) { # apparently returns true even on empty set; find alternative
        while($post_row = $post_r->fetch_assoc()) {
            $food_q = "select food_name from food where food_id = ".$post_row["food_id"];
            $food_r = mysqli_query($conn, $food_q);
            $food_row = $food_r->fetch_assoc();
            echo $post_row["post_id"]." | ".$food_row["food_name"]." | ".$post_row["post_desc"]."<br>";
            # show comments below the post
            $comment_q = "select * from comment where post_id = ".$post_row["post_id"]." order by comment_id";
            $comment_r = mysqli_query($conn, $comment_q);
            if ($comment_r->num_rows > 0) { # apparently returns true even on empty set; find alternative
                echo "comments:<br>";
                while($comment_row = $comment_r->fetch_assoc()) {
                    # fetch commenter's name
                    $name_q = "select first_name, last_name from user where user_id = ".$comment_row["user_id"];
                    $name_r = mysqli_query($conn, $name_q);
                    $name_row = $name_r->fetch_assoc();
                    echo $name_row["first_name"]." ".$name_row["last_name"]." : ";
                    echo $comment_row["comment_text"]." ".$comment_row["emoji"]."<br>";
                }
            }
        }
    } else echo "you haven't posted anything yet";
?>

<section>
<h2>New Post</h2>
</section>
<!-- food select -->
<form autocomplete="on" method="post" action="" name="post-form">
    <div class="form-outline mb-4">
        <input type="text" id="new_post_food" name= "new_post_food" class="form-control"/>
        <label class="form-label" for="new_post_food">food</label>
    </div>
    <div>
        <input type="text" id="description" name="description" class="form-control"/>
        <label class="form-label" for="description">description</label>
        <!-- publish post button -->
        <button type="submit" name="publishPost" value="publishPost">post</button>
    </div>
</form>
<?php
    if (isset($_POST['publishPost'])) {
        # post dataa
        if (empty($_POST['description'])) { $errors[] = 'description'; }
        else { $description = mysqli_real_escape_string($conn, trim($_POST['description'])); }

        # lookup food_id by food_name
        $food = $_POST["new_post_food"];
        $post_desc = $_POST["description"];
        $food_id_q = mysqli_real_escape_string($conn, "select food_id from food");
        $food_id_r = mysqli_query($conn, $food_id_q);
        $food_id_row = $food_id_r->fetch_assoc();
        
        if (!empty($errors)) {  # missing form data for expected request
            echo 'error: missing the following form data: <p id = "error_msg">';
            foreach($errors as $msg) {
                echo " $msg";
            }
            echo '<br>try again</p>';
        } else {  # send query to register new user
            # publish new post
            $publish_q = mysqli_real_escape_string($conn, "insert into post values (NULL, $uid, $food_id_row, $post_desc, NULL)");
            mysqli_query($conn, $publish_q);
        }

    }
?>
