<?php
    $servername = 'localhost';
    $username = 'root';
    $password = '';

    $conn = new mysqli($servername, $username, $password, 'foodies') # edit to allow other user profiles?
        OR die (mysqli_connect_error());

    // echo "Connected Successfully\n";
    mysqli_set_charset($conn, 'utf8');
?>
