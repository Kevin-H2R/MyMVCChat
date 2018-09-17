<html>
    <head></head>
    <body>
        <h1>Welcome to IAD's T'Chat.</h1>
        <h3>Please register or log in</h3>
        <?php
            if (isset($error)) {
                echo "<div style='color: red'>$error</div>";
            }
        ?>
        <form method="post" action="../controller/register.php">
            <input type="text" placeholder="username" name="username" minlength="3">
            <input type="password" placeholder="password" name="password" minlength="3">
            <input type="submit" value="Register">
        </form>

        <form method="post" action="../controller/login.php">
            <input type="text" placeholder="username" minlength="3" name="username">
            <input type="password" placeholder="password" minlength="3" name="password">
            <input type="submit" value="Login">
        </form>
    </body>
</html>