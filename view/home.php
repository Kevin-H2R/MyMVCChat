<html>
    <head></head>
    <body>
        <h1>Welcome <?php echo($username) ?></h1>
        <div style="display: flex; justify-content: space-around;">
            <div>
                <h3>Messages</h3>
                <ul>
                    <?php
                    array_map(function($message) {
                        $text = $message['text'];
                        $user = $message['user'];
                        $date = $message['date'];
                        echo "<li><b>$user</b> : $text - <i style='font-size: 10px'>$date</i></li>";
                    }, $messages);
                    ?>
                </ul>
                <form action="../controller/home.php" method="post">
                    <textarea title="Message" name="messageText"></textarea>
                    <input type="submit" value="Send">
                </form>
            </div>
            <div>
                <h4>Logged-in users</h4>
                <ul>
                    <?php
                        array_map(function($user) {
                            echo "<li><b>$user</b></li>";
                        }, $users);
                    ?>
                </ul>
            </div>
        </div>
    </body>
</html>