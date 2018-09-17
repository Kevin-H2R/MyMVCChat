<?php
    function getAll()
    {
        require_once('../config.php');
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