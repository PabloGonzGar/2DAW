<?php
session_start();

include_once 'includes/functions.php';
include_once 'public/vars.php';

if ($_SERVER['PHP_AUTH_USER'] != 'pablo' || $_SERVER['PHP_AUTH_PW'] != 'pablo') {
    header('WWW-Authenticate: Basic Realm="Contenido restringido"');
    header('HTTP/1.0 401 Unauthorized');
    echo "Usuario no reconocido!";
    exit;
} else {

    if (!isset($_SESSION['carrito'])) {
        $_SESSION['carrito'] = array();
    } else {
        
        $body_out_put = getProductsMarkup($productos);
        include_once 'templates/products.tmp.php';


        if (isset($_POST['cantidad'])) {
            $cantidad = array_filter($_POST['cantidad']);
            if (count($cantidad) > 0) {
                foreach ($cantidad as $id => $cantidad_producto) {
                    if (!isset($_SESSION['carrito'][$id])) {
                        $_SESSION['carrito'][$id] = $cantidad_producto;
                    } else {
                        $_SESSION['carrito'][$id] += $cantidad_producto;
                    }
                }
                dump($_SESSION['carrito']);

            } else {
                echo 'no has agregado nada';
            }

        }

        header("Location: " . $_SERVER['PHP_SELF']);
        exit;
    }
}
