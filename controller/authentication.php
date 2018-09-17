<?php

    /**
     * Method made to factorize similar code of register and login
     * and displaying custom error message if any error occurs
     * @param $method
     * @param $errorMessage
     */
    function authenticateWithMethod($method, $errorMessage)
    {
        if (isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'] === true){
            header('Location: home.php');
            exit();
        }

        if (isset($_POST['username']) && isset($_POST['password']) &&
            strlen($_POST['username']) > 3 && strlen($_POST['password']) > 3) {
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