<?php
    /**
     * Retrieves all messages from database
     * @return array|bool
     */
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

    /**
     * Inserts a new message in database
     * @param $message
     * @return bool
     */
    function postMessage($message)
    {
        require('../config.php');
        $connection = mysqli_connect($bdd_host, $bdd_user, $bdd_password, $bdd_database, $bdd_port);
        if (!$connection) {
            return false;
        }
        $text = $message['text'];
        $username = $message['user'];
        $date = $message['date'];
        $userId = retrieveUserId($username, $connection);

        $query = "INSERT INTO message (text, date, user_id)
                VALUES('$text', '$date', $userId)";
        $result = mysqli_query($connection, $query);
        if (!$result) {
            mysqli_close($connection);
            return false;
        }
        userSentMessage($userId, $connection);
        mysqli_close($connection);
        return true;
    }

    /**
     * Updates user last_access column
     * [Note] This method is the same as in model/user.php but I did not find
     * a way to dodge this code repetition
     * @param $userId
     * @param $connection
     * @return bool
     */
    function userSentMessage($userId, $connection)
    {
        $date = date('Y-m-d H:i:s');
        $query = "UPDATE user SET last_access = '$date'
                      WHERE user.id = $userId";
        $result = mysqli_query($connection, $query);
        if (!$result) {
            return false;
        }

        return true;
    }

    /**
     * Retrieves a user's id from its username
     * @param $username
     * @param $connection
     * @return int
     */
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