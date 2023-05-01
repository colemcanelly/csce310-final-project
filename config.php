<!-- written by Ian Beckett and Cole McAnelly -->
<?php
    $servername = 'localhost';
    $username = 'root';
    $password = '';

    $conn = new mysqli($servername, $username, $password, 'foodies') # edit to allow other user profiles?
        OR die (mysqli_connect_error());

    mysqli_set_charset($conn, 'utf8');
?>
