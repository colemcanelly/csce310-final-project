<header class="sticky-top bg-white">
  <nav class="navbar navbar-expand-lg py-3">
    <div id="navbar-container" class="container-fluid d-flex justify-content-end">
      <div id="navbar">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0 justify-content-end">
          <li class="nav-item active">
            <a href="./index.php" class="btn btn-secondary btn-lg" aria-current="page" role="button">Home</a>
          </li>
          <li class="nav-item">
            <a href="./profile.php" class="btn btn-secondary btn-lg" role="button">Profile</a>
          </li>
          <li class="nav-item">
            <a href="./schedule.php" class="btn btn-secondary btn-lg" role="button">Schedule</a>
          </li>
          <li class="nav-item">
            <a href="./food.php" class="btn btn-secondary btn-lg" role="button">Food</a>
          </li>
          <li class="nav-item">
            <?php
              if (isset($_SESSION['user_id'])) {
                // user is logged in, display logout button
                $uid = $_SESSION["user_id"];
                $user_q = "select account_type from user where user_id = ".$uid;
                $result = $conn->query($user_q);
                $row = $result->fetch_assoc();
                $adminType = $row["account_type"];
                if($adminType == 2)
                {
                  echo '<a href="./user.php" class="btn btn-secondary btn-lg" role="button">Users</a>';
                }
                echo '<a href="./logout.php" class="btn btn-secondary btn-lg" role="button">Logout</a>';
              } else {
                // user is not logged in, display login button
                echo '<a href="./login.php" class="btn btn-secondary btn-lg" role="button">Login</a>';
              }
            ?>
          </li>
        </ul>
      </div>
    </div>
  </nav>
</header>

<style>
  #navbar-container {
    max-width: 95%;
  }

  #navbar .btn-secondary {
    border-radius: 0px;
    /* font-weight: bold; */
    /* color: black; */
    /* background-color: #d9d9d9; */
  }
</style>