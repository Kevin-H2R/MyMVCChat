<?php


    function register($username, $password)
    {
        require_once('../config.php');
        $connection = mysqli_connect($bdd_host, $bdd_user, $bdd_password, $bdd_database, $bdd_port);
        if (!$connection) {
            return false;
        }
        $password = password_hash($password, PASSWORD_DEFAULT);
        $query = "INSERT INTO user (username, password, is_online)
                VALUES('$username', '$password', 1)";
        $result = mysqli_query($connection, $query);
        if (!$result) {
            return false;
        }
        return true;
    }