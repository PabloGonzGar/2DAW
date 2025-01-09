<?php

include_once 'includes/functions.inc.php';

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

try {
    $mbd = new PDO('mysql:host=localhost;dbname=joyitas-andalucia', 'root', '');
    
    $query = 'SELECT 
            Concert.id AS concert_id,
            Concert.name AS concert_name,
            Concert.place AS concert_place,
            Concert.time AS concert_time,
            Artist.id AS artist_id,
            Artist.name AS artist_name,
            Artist.price AS artist_price
        FROM 
            Concert
        LEFT JOIN 
            Artist_Concert ON Concert.id = Artist_Concert.id_concert
        LEFT JOIN 
            Artist ON Artist_Concert.id_artist = Artist.id
        ORDER BY 
            Concert.id;';
    $stmt = $mbd->prepare($query);
    $stmt->execute();
    $concertsDisOrderedBD = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    if ($concertsDisOrderedBD) {
        //dump($concertsDisOrderedBD);
        $concerts = [];
        
        foreach ($concertsDisOrderedBD as $independentConcert) {
            $concert_id = $independentConcert['concert_id'];
            
            if (!isset($concerts[$concert_id])) {
                $concerts[$concert_id] = [
                    'id' => $concert_id,
                    'name' => $independentConcert['concert_name'],
                    'place' => $independentConcert['concert_place'],
                    'time' => $independentConcert['concert_time'],
                    'artists' => []
                ];
            }
            
            if ($independentConcert['artist_id']) {
                $concerts[$concert_id]['artists'][] = [
                    'id' => $independentConcert['artist_id'],
                    'name' => $independentConcert['artist_name'],
                    'price' => $independentConcert['artist_price']
                ];
            }
        }
        
        $output = getConcertMarkup($concerts);

        if (isset($_POST['editar'])) {

            $idConcertEdit = key($_POST['editar']);
            header('Location: ./editConcert.php?concert='.$idConcertEdit);

        } elseif (isset($_POST['borrar'])) {

            $idDel = key($_POST['borrar']);
            dump($idDel);

            $queryDelConcert = 'DELETE FROM Artist_Concert WHERE id_concert = :id';
            $stmtDelConcert = $mbd->prepare($queryDelConcert);
            $stmtDelConcert->bindParam(':id', $idDel, PDO::PARAM_INT);
            $stmtDelConcert->execute();


            $queryDel = 'DELETE FROM Concert 
                            WHERE id= :id';

            $stmtDel = $mbd->prepare($queryDel);
            $stmtDel->bindParam(':id', $idDel, PDO::PARAM_INT);
            $stmtDel->execute();
            header("Location: " . $_SERVER['PHP_SELF']);
            exit();
        }
        include_once './includes/conciertos.tpm.php';
    } else {
        echo "No concerts found.";
    }
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
