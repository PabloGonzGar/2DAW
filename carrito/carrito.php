<?php

session_start();
include_once 'includes/functions.php';
include_once 'public/vars.php';

$carrito_inicial = $_SESSION['carrito'];

$productos_carrito = getProductsFiltered($productos,$carrito_inicial);
$body_out_put = getPurchaseMarkup($productos_carrito);

//MOSTRAR PLANTILLA

include_once 'templates/carrito.tmp.php';

if(isset($_POST['cantidad'])){
    $carrito_nuevo = array();
    $seleccionados_post = $_POST['cantidad'];
    

    foreach($seleccionados_post as $id_seleccionado => $seleccionado){
        if($seleccionado>0){
            $carrito_nuevo[$id_seleccionado] = $seleccionado;
        }
    }

    $_SESSION['carrito'] = $carrito_nuevo;
    header("Location: " . $_SERVER['PHP_SELF']);
    exit;
}
