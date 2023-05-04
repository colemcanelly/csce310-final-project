<?php
    $title = 'Users';
    $childView = 'views/_index.php';
    include('layouts/default.php');
?>

<section>
<h1>List of users</h1>
</section>

<?php
    echo "ID | First | Last | Email<br>";
    $user_q = "select * from user where account_type = 1";
    $user_r = mysqli_query($conn, $user_q);
    $adminType = 1;
    # checks if admin
    if (isset($_SESSION['user_id'])) {
    $uid = $_SESSION["user_id"];
    $q = "select account_type from user where user_id = ".$uid;
    $result = $conn->query($q);
    $row = $result->fetch_assoc();
    $adminType = $row["account_type"];
    }
    if ($adminType == 2) {
        while($user_row = $user_r->fetch_assoc()) {
            echo '<div style="display:flex; align-items:center;">';
            echo $user_row["user_id"]." | ".$user_row["first_name"]." | ".$user_row["last_name"]." | ".$user_row["email"];
            echo '<form method="post" action="">';
            echo '<input type="hidden" name="userID" value="'.$user_row["user_id"].'" />';
            echo '<button type="submit" name="deleteUser" value="deleteUser" style="margin-left: 10px;">delete</button>';
            echo '</form>';
            if (isset($_POST['deleteUser'])){
                $userID = $_POST["userID"];
                $deleteQuery = "delete from user where user_id = $userID";
                $query = mysqli_query($conn, $deleteQuery);
            }
            echo '</div>';
        }
    }
?>