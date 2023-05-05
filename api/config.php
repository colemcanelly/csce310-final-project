<?php
/*    <!-- written by Ian Beckett and Cole McAnelly -->    */
$servername = 'localhost';
$username = 'root';
$password = '';

    # edit to allow other user profiles?
$conn = new mysqli($servername, $username, $password, 'foodies') OR die (mysqli_connect_error());

mysqli_set_charset($conn, 'utf8');
session_start();  // retain session data across multiple pages
