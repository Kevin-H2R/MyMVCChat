<?php

    function authenticateWithMethod($method, $errorMessage)
    {
        if (isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'] === true){
            header('Location: home.php');
            exit();
        }

        if (isset($_POST['username']) && isset($_POST['password'])) {
            $username = htmlspecialchars($_POST['username']);
            $password = htmlspecialchars($_POST['password']);
            $isMethodSuccessful = $method($username, $password);
            if ($isMethodSuccessful) {
                $_SESSION['loggedIn'] = true;
                $_SESSION['username'] = $username;
                header('Location: ../index.php');
                exit();
            }

            $error = $errorMessage;
        }

        require('../view/authentication.php');
    }