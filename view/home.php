<html>
    <head></head>
    <body>
        <h1>Welcome <?php echo($username) ?></h1>
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
    </body>
</html>