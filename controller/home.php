<?php
    session_start();
    $username = $_SESSION['username'];
    require('../view/home.php');