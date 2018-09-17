<?php
    session_start();
    require_once('../model/user.php');
    require_once('authentication.php');

    authenticateWithMethod('register', 'An error occured during registration');