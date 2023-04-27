<?php
    $dbc = mysqli_connect('localhost', 'user', '', 'foodies')
        OR die (mysqli_connect_error());
    mysqli_set_charset($dbc, 'utf8');
?>
