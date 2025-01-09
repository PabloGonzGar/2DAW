<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include("./resources/includes/bootstrap.php");//Este archivo no debe ser modificado.
include("./resources/includes/functions.inc.php");

// Cargamos los datos de configuración de la base de datos.
//TO DO: Si lo consideras adecuado, puedes llevar este bloque try - catch a la función que consideres en functions.inc.php
try {
    $dbConfig = getDatabaseConfigFromEnv(__DIR__ . '/.env');
} catch (Exception $e) {
    echo 'Error: ' . $e->getMessage();
}

//TO DO: Debes gestionar:
  //·Mostrar el formulario de actualización de una película concreta, cuando está presente $_GET['id'] y no esté presente el POST.
  //·Actualizar los datos de una película concreta cuando está presente el $_GET['id'] y además, en el POST van los datos actualizados.

$movieId = filter_input(INPUT_GET,'id');

//TO DO: El siguiente código se proporciona para poder tener un punto de partida. Añade o modifica lo que consideres para cumplir los dos objetivos de este script señalados.
$movie = getMovie($dbConfig, $movieId);
$formMarkup = getMovieFormMarkup($movie); 
getMovieUpdated($dbConfig,$movieId);

include("./resources/templates/update.tpl.php");
?>
