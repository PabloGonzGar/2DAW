<?php

session_start();
include_once './includes/functions.inc.php';

if(isset($_SESSION['login'])){

    $productos = getData();
    $outPut = getProductsMarkup($productos); 
    include_once './includes/tienda.tpl.php';
}else{
    include_once './includes/login.tpl.php';
    
    if(
        (isset($_POST['user']) && !empty($_POST['user']))
        &&
        (isset($_POST['password']) && !empty($_POST['password']))
        ){
            
            $user = $_POST['user'];
            $password = $_POST['password'];
            
            if(($user=='pablo') && (hash('sha256', '1234') == hash('sha256', $password)) ){
                $_SESSION['login'] = true;
            }
            header("Location: " . $_SERVER['PHP_SELF']);
            exit();
      }
}
