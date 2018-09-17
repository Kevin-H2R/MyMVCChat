<?php
    session_start();
    if (isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'] === true) {
        header('Location: controller/home.php');
        exit();
    }
    header('Location: controller/register.php');
    exit();