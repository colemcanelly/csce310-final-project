<!DOCTYPE HTML>
<html>
    <head>
        <meta charset="utf-8">
        <title>signup</title>
        <!-- <link rel="stylesheet" href="css/style.css" /> -->
    </head>
<?php
    include_once 'header.php';
?>
<body>
    <h2>sign up</h2>
    <div class="login">
    <form>
            <div class="form-group">
                <label for="email">email address</label>
                <input type="email" id="email">
                <label for="password">password</label>
                <input type="password" id="password">
                <input type="checkbox" name="adminin" value="administrator account">
                <label>admin</label>
            </div>
            <input type="submit" value ="sign up"></input>
    </form>
</body>
</html>
