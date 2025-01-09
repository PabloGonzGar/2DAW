<?php
function dump($var)
{
    echo '<pre>' . print_r($var, true) . '</pre>';
}

function getArtistMarkup($artists)
{
    $outPut = '<tr>';
    foreach ($artists as $indice => $artist) {
        $outPut .= '<td>' . $artist['name'] . '</td>' .
            '<td>' . $artist['price'] . '</td>' .
            '<td> <button class="btn btn-primary d-inline-flex align-items-center" type="submit" name="editar[' . $artist['id'] . ']"><img src="./resources/img/mage--edit.png" width="20px"></button></td>' .
            '<td> <button class="btn btn-danger" type="submit" name="borrar[' . $artist['id'] . ']"><img src="./resources/img/ic--round-delete.png" width="20px"></button></td></tr>';
    }

    return $outPut;
}


function getEditMarkup($artist)
{
    $outPut = '';

    $outPut .= '<td><input type="text" value="' . $artist['name'] . '" name="name"></td>';
    $outPut .= '<td><input type="text" value="' . $artist['price'] . '" name="price"></td>';

    return $outPut;
}

function getEditMarkupConcert($concerts)
{
    foreach($concerts as $concert){

        $output = '<tr>';
        $output .= '<td><input type="text" name="name" value="' . $concert['name'] . '"></td>';
        $output .= '<td><input type="text" name="place" value="' . $concert['place'] . '"></td>';
        $output .= '<td><input type="datetime-local" name="time" value="' . $concert['time'] . '"></td>';
        $output .= '<td>';
    
        if (!empty($concert['artists'])) {
            $output .= '<table class="table table-sm">';
            foreach ($concert['artists'] as $artist) {
                $output .= '<tr>';
                $output .= '<td id="'.$artist['id'].'"> <button id="btnBorrar" class="btn btn-danger" type="submit" name="borrarArtist[' . $artist['id'] . ']" ><img src="./resources/img/ic--round-delete.png" width="20px"></button> &nbsp;&nbsp;' . $artist['name'] . '</td>';
                $output .= '</tr>';
            }
            $output .= '</table>';
        } else {
            $output .= 'No artists available';
        }
    }

    return $output;
}


function getConcertMarkup($concerts)
{
    $output = '';

    foreach ($concerts as $concert) {
        $output .= '<tr>';
        $output .= '<td>' . $concert['name'] . '</td>';
        $output .= '<td>' . $concert['place'] . '</td>';
        $output .= '<td>' . $concert['time'] . '</td>';
        $output .= '<td>';

        if (!empty($concert['artists'])) {
            $output .= '<table class="table table-sm">';
            foreach ($concert['artists'] as $artist) {
                $output .= '<tr>';
                $output .= '<td>' . $artist['name'] . '</td>';
                $output .= '</tr>';
            }
            $output .= '</table>';
        } else {
            $output .= 'No artists available';
        }

        $output .= '</td>';
        $output .= '<td> <button class="btn btn-primary d-inline-flex align-items-center" type="submit" name="editar[' . $concert['id'] . ']"><img src="./resources/img/mage--edit.png" width="20px"></button></td>';
        $output .= '<td> <button class="btn btn-danger" type="submit" name="borrar[' . $concert['id'] . ']"><img src="./resources/img/ic--round-delete.png" width="20px"></button></td>';
        $output .= '</tr>';
    }

    return $output;
}


