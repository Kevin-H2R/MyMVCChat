<?php
    session_start();
    require_once ('../model/user.php');

    if (isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'] === true){
        header('Location: home.php');
        exit();
    }

    if (isset($_POST['username']) && isset($_POST['password'])) {
        $username = htmlspecialchars($_POST['username']);
        $password = htmlspecialchars($_POST['password']);
        $isLoggedIn = login($username, $password);
        if ($isLoggedIn) {
            $_SESSION['loggedIn'] = true;
            $_SESSION['username'] = $username;
            header('Location: ../index.php');
            exit();
        }

        $loginError = "Username and password did not match";
    }

    require('../view/authentication.php');