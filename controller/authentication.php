<?php
    session_start();
    require_once ('../model/user.php');

    if (isset($_POST['username']) && isset($_POST['password'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $isRegistered = register($username, $password);
        if ($isRegistered) {
            $_SESSION['loggedIn'] = true;
            $_SESSION['username'] = $username;
            header('Location: ../index.php');
            exit();
        }
    }

    require('../view/authentication.php');