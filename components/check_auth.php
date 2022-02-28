<?php

if(!isset($_SESSION)){
    session_start();
}

function checkAuth(){
    if(!isset($_SESSION['user'])){
        header('location:user/login.php');
    }
}

?>