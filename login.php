<!DOCTYPE HTML>
<html>
    <head>
        <meta charset="utf-8">
        <title>login</title>
        <!-- <link rel="stylesheet" href="css/style.css" /> -->
    </head>
<?php
    include_once 'header.php';
?>
<body>
    <h2>log in</h2>
    <div class="login">
    <form>
            <div class="form-group">
                <label for="email">email address</label>
                <input type="email" id="email">
                <label for="password">password</label>
                <input type="password" id="password">
            </div>
            <input type="submit" value="log in"></input>
            <input type="submit" value ="sign up"></input>
    </form>
</body>
</html>
