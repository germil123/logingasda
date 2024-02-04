<?php

session_start();

if(isset($SESSION['username_id']))
{
    unset($_SESSION['user_id']);
}

header("Location: login.php");
die;