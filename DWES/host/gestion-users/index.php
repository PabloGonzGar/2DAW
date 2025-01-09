<?php

include_once './includes/vars.php';

session_start();

if(isset($_SESSION['admin']) && !empty($_SESSION['admin'])){
    echo "hola admin";
}elseif(isset($_SESSION['user']) && !empty($_SESSION['user'])){
    echo ' hola user';
}else{
    include_once './includes/login.tmp.php';
}