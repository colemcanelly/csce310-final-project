<?php
    $dbc = mysqli_connect('localhost', 'root', '', 'foodies') # edit to allow other user profiles?
        OR die (mysqli_connect_error());
    mysqli_set_charset($dbc, 'utf8');
?>
