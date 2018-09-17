<?php

    function register($username, $password)
    {
        require('../config.php');
        $connection = mysqli_connect($bdd_host, $bdd_user, $bdd_password, $bdd_database, $bdd_port);
        if (!$connection) {
            return false;
        }
        $password = password_hash($password, PASSWORD_DEFAULT);
        $date = date('Y-m-d H:i:s');
        $query = "INSERT INTO user (username, password, last_access)
                VALUES('$username', '$password', '$date')";
        $result = mysqli_query($connection, $query);
        mysqli_close($connection);
        if (!$result) {
            return false;
        }
        return true;
    }

    function login($username, $password)
    {
        require('../config.php');
        $connection = mysqli_connect($bdd_host, $bdd_user, $bdd_password, $bdd_database, $bdd_port);
        if (!$connection) {
            return false;
        }
        $query = "SELECT * FROM user WHERE username='$username'";
        $result = mysqli_query($connection, $query);
        while ($row = mysqli_fetch_row($result)) {
            if (!password_verify($password, $row[2])) {
                mysqli_close($connection);
                return false;
            }
            $lastAccessUpdated = updateLastAccess($row[0], $connection);
            if (!$lastAccessUpdated) {
                return false;
            }
        }
        mysqli_close($connection);
        return true;
    }

    function updateLastAccess($userId, $connection)
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

    function getLoggedInUsers()
    {
        require('../config.php');
        $connection = mysqli_connect($bdd_host, $bdd_user, $bdd_password, $bdd_database, $bdd_port);
        if (!$connection) {
            return false;
        }
        $minutes = 24;
        $sessionThreshold = date('Y-m-d H:i:s', time() - $minutes * 60);
        $query = "SELECT username from user
                  WHERE user.last_access > '$sessionThreshold'";
        $result = mysqli_query($connection, $query);
        $users = [];
        while ($row = mysqli_fetch_row($result)) {
            $users[] = $row[0];
        }
        mysqli_close($connection);
        return $users;
    }