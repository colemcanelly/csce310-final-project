<!-- written by Ian Beckett and editted by thuc-->
<?php
    $title = 'Home Page';
    $childView = 'views/_index.php';
    include('layouts/default.php');
?>

<section>
<h1>All Posts</h1>
</section>
<?php
    echo "post ID | Food | Description<br>";
    # list my posts ordered by reverse id (recent) WIP
    $post_q = "select * from post where flag = 0 order by post_id desc";
    $post_r = mysqli_query($conn, $post_q);
    $adminType = 1;
    # checks if admin
    if (isset($_SESSION['user_id'])) {
    $uid = $_SESSION["user_id"];
    $user_q = "select account_type from user where user_id = ".$uid;
    $result = $conn->query($user_q);
    $row = $result->fetch_assoc();
    $adminType = $row["account_type"];
    }
    if ($post_r->num_rows > 0) { # apparently returns true even on empty set; find alternative
        while($post_row = $post_r->fetch_assoc()) {
            $food_q = "select food_name from food where food_id = ".$post_row["food_id"];
            $food_r = mysqli_query($conn, $food_q);
            $food_row = $food_r->fetch_assoc();

            echo '<div style="display:flex; align-items:center;">';
            echo $post_row["post_id"]." | ".$food_row["food_name"]." | ".$post_row["post_desc"];
            # show delete button if user is admin
            if($adminType == 2){
                echo '<form method="post" action="">';
                echo '<input type="hidden" name="postID" value="'.$post_row["post_id"].'" />';
                echo '<button type="submit" name="deletePost" value="deletePost" style="margin-left: 10px;">delete</button>';
                echo '</form>';
                if (isset($_POST['deletePost'])){
                    $postID = $_POST["postID"];
                    $deleteQuery = "delete from post where post_id = $postID";
                    $query = mysqli_query($conn, $deleteQuery);
                }
            }
            echo '</div>';
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
    }

?>

<section>
<h2>New Comment</h2>
</section>
<form autocomplete="on" method="post" action="" name="post-form">
    <div>
        <input type="text" id="post_id" name="post_id" class="form-control"/>
        <label class="form-label" for="comment_text">comment_text</label>
        <input type="text" id="comment_text" name="comment_text" class="form-control"/>
        <!-- publish comment button -->
        <button type="submit" name="publishComment" value="publishComment">publish comment</button>
    </div>
</form>
<?php
    if (isset($_POST['publishComment'])) {
        # post data
        if (empty($_POST['description'])) { $errors[] = 'description'; }
        else { $description = mysqli_real_escape_string($conn, trim($_POST['description'])); }

        # lookup food_id by food_name
        $food = $_POST["new_post_food"];
        $post_desc = $_POST["description"];
        $food_id_q = mysqli_real_escape_string($conn, "select food_id from food");
        $food_id_r = mysqli_query($conn, $food_id_q);
        $food_id_row = $food_id_r->fetch_assoc();
        $foodID = $food_id_row['food_id'];
        
        if (!empty($errors)) {  # missing form data for expected request
            echo 'error: missing the following form data: <p id = "error_msg">';
            foreach($errors as $msg) {
                echo " $msg";
            }
            echo '<br>try again</p>';
        } else {  # send query to register new user
            # publish new post
            $publish_q = "insert into post values (NULL, '$uid', '$foodID', '$post_desc', 0);";
            mysqli_query($conn, $publish_q);
        }
    }
?>
