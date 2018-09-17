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
        $isRegistered = register($username, $password);
        if ($isRegistered) {
            $_SESSION['loggedIn'] = true;
            $_SESSION['username'] = $username;
            header('Location: ../index.php');
            exit();
        }

        $registrationError = "An error occured during registration";
    }

    require('../view/authentication.php');