<?php
    session_start();
    require_once('../model/message.php');

    if (!isset($_SESSION['loggedIn']) || $_SESSION['loggedIn'] !== true) {
        header('Location: register.php');
        exit();
    }
    $username = $_SESSION['username'];
    $messages = getAll();
    if (isset($_POST['messageText'])) {
        $messageText = htmlspecialchars($_POST['messageText']);
        $message = [
            'text' => $messageText,
            'username' => $username,
            'date' => date('Y-m-d H:i:s'),
        ];
        postMessage($message);
    }
    require('../view/home.php');