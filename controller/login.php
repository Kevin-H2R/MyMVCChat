<?php
    session_start();
    require_once('../model/user.php');
    require_once('authentication.php');

    authenticateWithMethod('login', 'Username and password did not match');