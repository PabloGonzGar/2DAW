<?php

session_start();

require_once('../app/vars.php');
require_once('../app/functions.php');

//Aquí se realiza el procesado de las variables que proceda.
//TO DO

//HE MODIFICADO LA PLANTILLA HTML PARA PONERLE NAMES Y METHOD EN EL FORM E INPUTS


if(
    (isset($_POST['email']) && !empty($_POST['email']))
    &&
    (isset($_POST['password']) && !empty($_POST['password']))
    ){
        $email = $_POST['email'];
        $password = hash('sha256',$_POST['password']);

        foreach($users as $user){
            if(($email==$user['email']) && ($password ==$user['hashed_password'])){
                $_SESSION['login'] = $user['user_name'];
                header('Location: index.php');
            }
        }
    }

$message = get_user_message("Invalid credentials");

require_once('../app/login_template.php');
?>