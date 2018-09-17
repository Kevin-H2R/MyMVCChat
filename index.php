<?php
    session_start();
    if (isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'] === true) {
        header('Location: controller/home.php');
        exit();
    }
    header('Location: controller/authentication.php');
    exit();