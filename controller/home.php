<?php
    session_start();
    if (!isset($_SESSION['loggedIn']) || $_SESSION['loggedIn'] !== true) {
        header('Location: register.php');
        exit();
    }
    $username = $_SESSION['username'];
    require('../view/home.php');