<html>
    <head></head>
    <body>
        <h1>Welcome to IAD's T'Chat.</h1>
        <h3>Please register or log in</h3>
        <?php
            if (isset($error)) {
                echo "<div style='color: red'>An error occured during your registration</div>";
            }
        ?>
        <form method="post" action="../controller/authentication.php">
            <input type="text" placeholder="username" name="username" minlength="3">
            <input type="password" placeholder="password" name="password" minlength="8">
            <input type="submit" value="Register">
        </form>
    </body>
</html>