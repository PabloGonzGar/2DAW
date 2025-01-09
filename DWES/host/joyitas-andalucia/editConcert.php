<?php

include_once './includes/functions.inc.php';


if (isset($_GET['concert'])) {

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
        WHERE 
            Concert.id = :concert_id
        ORDER BY 
            Concert.id;';
        $stmt = $mbd->prepare($query);

        
        $concert_id = $_GET['concert']; 
        $stmt->bindParam(':concert_id', $concert_id, PDO::PARAM_INT);
        $stmt->execute();

        $concertFromDB = $stmt->fetchAll(PDO::FETCH_ASSOC);
        

        $concerts = [];
        foreach ($concertFromDB as $concertToEdit) {
            $concert_id = $concertToEdit['concert_id'];
            
            if (!isset($concerts[$concert_id])) {
                $concerts[$concert_id] = [
                    'id' => $concert_id,
                    'name' => $concertToEdit['concert_name'],
                    'place' => $concertToEdit['concert_place'],
                    'time' => $concertToEdit['concert_time'],
                    'artists' => []
                ];
            }
            
            if ($concertToEdit['artist_id']) {
                $concerts[$concert_id]['artists'][] = [
                    'id' => $concertToEdit['artist_id'],
                    'name' => $concertToEdit['artist_name'],
                    'price' => $concertToEdit['artist_price']
                ];
             }
        }

        $output = getEditMarkupConcert($concerts);
        include_once './includes/editConcert.tmp.php';

        if(isset($_POST['borrarArtist'])){

            $idDelArtist = key($_POST['borrarArtist']);

            $queryDelConcert = 'DELETE FROM Artist_Concert WHERE id_artist = :id';
            $stmtDelConcert = $mbd->prepare($queryDelConcert);
            $stmtDelConcert->bindParam(':id', $idDelArtist, PDO::PARAM_INT);
            $stmtDelConcert->execute();
            header("Location: " . $_SERVER['PHP_SELF'].'?concert='.$concert_id);
            exit();
        }


        if(isset($_POST['guardar']) ){
            if (
                (isset($_POST['name']) && !empty($_POST['name']))
                &&
                (isset($_POST['place']) && !empty($_POST['place']))
                &&
                (isset($_POST['time']) && !empty($_POST['time']))
            ) {
                $name = $_POST['name'];
                $place = $_POST['place'];
                $time = $_POST['time'];


                $querySaveDataConcert = 'UPDATE Concert 
                                        SET name = :name, place= :place, time= :time
                                        WHERE id= :id';
                $stmtSaveDataConcert = $mbd->prepare($querySaveDataConcert);
                $stmtSaveDataConcert->bindParam(':name', $name, PDO::PARAM_STR);
                $stmtSaveDataConcert->bindParam(':place', $place, PDO::PARAM_STR);
                $stmtSaveDataConcert->bindParam(':time', $time, PDO::PARAM_STR);
                $stmtSaveDataConcert->bindParam(':id', $concert_id,PDO::PARAM_INT);
                $stmtSaveDataConcert->execute();
                header("Location: " . $_SERVER['PHP_SELF'].'?concert='.$concert_id);
                exit();
            }
        }

        if ($concertFromDB) {
        } else {
            echo "No concerts found.";
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
