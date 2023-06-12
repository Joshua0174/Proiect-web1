<?php

session_start();
require "login/User.php";

if(User::isLoggedIn()){
    if(isset($_COOKIE['login_key'])){
        setcookie("login_key","",time()-3600,"/");
    }
    unset($_SESSION['login_id']);
    header("Location: login.php");
    exit;
}