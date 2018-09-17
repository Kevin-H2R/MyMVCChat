<?php
    session_start();
    require_once('../model/message.php');

    if (!isset($_SESSION['loggedIn']) || $_SESSION['loggedIn'] !== true) {
        header('Location: register.php');
        exit();
    }
    $username = $_SESSION['username'];
    $messages = getAll();
    require('../view/home.php');