<?php

    function register($username, $password)
    {
        require('../config.php');
        $connection = mysqli_connect($bdd_host, $bdd_user, $bdd_password, $bdd_database, $bdd_port);
        if (!$connection) {
            return false;
        }
        $password = password_hash($password, PASSWORD_DEFAULT);
        $query = "INSERT INTO user (username, password, is_online)
                VALUES('$username', '$password', 1)";
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
        }
        mysqli_close($connection);
        return true;
    }

    function getLoggedInUsers()
    {
        require('../config.php');
        $connection = mysqli_connect($bdd_host, $bdd_user, $bdd_password, $bdd_database, $bdd_port);
        if (!$connection) {
            return false;
        }
        $query = "SELECT username from user
                  WHERE user.is_online = true";
        $result = mysqli_query($connection, $query);
        $users = [];
        while ($row = mysqli_fetch_row($result)) {
            $users[] = $row[0];
        }
        mysqli_close($connection);
        return $users;
    }