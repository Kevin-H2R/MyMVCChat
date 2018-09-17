<?php
    function getAll()
    {
        require('../config.php');
        $connection = mysqli_connect($bdd_host, $bdd_user, $bdd_password, $bdd_database, $bdd_port);
        if (!$connection) {
            return false;
        }
        $query = "SELECT message.*, user.username from message
                  INNER JOIN user on user.id = message.user_id";
        $result = mysqli_query($connection, $query);
        $data = [];
        while ($row = mysqli_fetch_row($result)) {
            $data[] = [
                'text' => $row[1],
                'user' => $row[4],
                'date' => $row[2],
            ];
        }
        mysqli_close($connection);
        return $data;
    }

    function postMessage($message)
    {
        require('../config.php');
        $connection = mysqli_connect($bdd_host, $bdd_user, $bdd_password, $bdd_database, $bdd_port);
        if (!$connection) {
            return false;
        }
        $text = $message['text'];
        $username = $message['username'];
        $date = $message['date'];
        $userId = retrieveUserId($username, $connection);

        $query = "INSERT INTO message (text, date, user_id)
                VALUES('$text', '$date', $userId)";
        $result = mysqli_query($connection, $query);
        mysqli_close($connection);
        if (!$result) {
            return false;
        }
        return true;
    }

    function retrieveUserId($username, $connection)
    {
        $userQuery = "SELECT id from user where user.username = '$username'";
        $userResult = mysqli_query($connection, $userQuery);
        $userId = -1;
        while($row = mysqli_fetch_row($userResult)) {
            $userId = $row[0];
            break;
        }

        return $userId;
    }