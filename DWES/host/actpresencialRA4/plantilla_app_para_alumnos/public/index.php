<?php

session_start();

require_once('../app/vars.php');
require_once('../app/functions.php');

//Aquí se realiza el procesado de las variables que proceda.
//TO DO

if(!(isset($_SESSION['login'])) && empty($_SESSION['login'])){
    header('Location: login.php');
}
//sacamos el valor de la sesion, si no existe se agrega un array vacio
$data = getDataSession();
$user = $_SESSION['login'];
$message = get_user_message('Bienvenido: '.$user);

//aqui gestiono tanto los que se añaden como los que se borran
getEventsAdded($data,$events,$message);
//SACA EL MARCADO DE LOS CURSOS
$events_markup = get_events_form_markup($events);
$booked_courses_markup = get_modal_booked_events_form($data);
// dump($data);


//AL FINAL DEL TODO SE AGREGAN LOS DATOS A LA SESION
setDataInSession($data);

require_once('../app/main_template.php');
?>

