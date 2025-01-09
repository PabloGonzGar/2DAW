<?php
function dump($var)
{
    echo '<pre>' . print_r($var, true) . '</pre>';
}

function getData(){
    return array(
        array("nombre" => "Mancuerna 10kg",             "precio" => 20.00,      "id_prod" => "MAN10"),
        array("nombre" => "Barra Olimpica",             "precio" => 100.00,     "id_prod" => "BAROL"),
        array("nombre" => "Disco 25kg",                 "precio" => 65.00,      "id_prod" => "DIS25"),
        array("nombre" => "Cinturón de Levantamiento",  "precio" => 30.00,      "id_prod" => "CINTL"),
        array("nombre" => "Bandas de Resistencia",      "precio" => 15.00,      "id_prod" => "BANDR"),
        array("nombre" => "Rueda Abdominal",            "precio" => 12.00,      "id_prod" => "RUEDA"),
        array("nombre" => "Balón Medicinal 10kg",       "precio" => 40.00,      "id_prod" => "BAL10"),
        array("nombre" => "Soga de Batalla",            "precio" => 25.00,      "id_prod" => "SOGA1")
    );
}


function getProductsMarkup($productos){
    $output = '';

    foreach ($productos as $producto) {
        $producto['cantidad'] = 0;
        
        $output.='<tr><td scope="row">';
        
        $output.= $producto['nombre'].'</td>';
        $output.= '<td>'.$producto['precio'].'</td>';
        $output.= '<td><input type="number" value="'.$producto['cantidad'].'">';

        $output.='</td></tr>';
    }

    return $output;

}