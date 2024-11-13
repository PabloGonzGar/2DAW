<?php

function dump($var){
    echo '<pre>'. print_r($var,true) , '</pre>'; 
}


function getProductsMarkup($productos){

    $html = '';
    foreach($productos as $producto){

        $html .= '<tr><td>'.$producto['nombre'].'</td>
                <td>'.$producto['precio'].'€</td>
                <td><input type="text" name="cantidad['.$producto['id_prod'].']" id="'.$producto['id_prod'].'" value="0" readonly></td>
                <td>
                    <button type="button" onclick="sumar(\''.$producto['id_prod'].'\')">+</button>
                    <button type="button" onclick="restar(\''.$producto['id_prod'].'\')">-</button>
                </td>
                </tr>'
                ;
    }

    return $html;
}

function getProductsFiltered($productos, $cantidad) {
    $productos_filtrados = array_reduce($productos, function($array, $producto) use ($cantidad) {
        foreach ($cantidad as $id => $producto_cantidad) {
            if ($id == $producto['id_prod']) {
                $producto['cantidad'] = $producto_cantidad;
                $array[$id] = $producto; 
                break;
            }
        }
        return $array;
    }, []);

    return $productos_filtrados;
}


function getPurchaseMarkup($productos){

    $html = '';
    foreach($productos as $producto){

        $html .= '<tr><td>'.$producto['nombre'].'</td>
                <td>'.$producto['precio'].'€</td>
                <td><input type="text" name="cantidad['.$producto['id_prod'].']" id="'.$producto['id_prod'].'" value="'.$producto['cantidad'].'" readonly></td>
                <td>
                    <button type="button" onclick="sumar(\''.$producto['id_prod'].'\')">+</button>
                    <button type="button" onclick="restar(\''.$producto['id_prod'].'\')">-</button>
                </td>
                </tr>'
                ;
    }

    return $html;
}