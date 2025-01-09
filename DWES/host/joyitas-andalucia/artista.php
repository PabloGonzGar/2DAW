<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
include_once 'includes/functions.inc.php';
require_once __DIR__ . '/vendor/autoload.php';
$mail = new PHPMailer(true);

try {
    $mbd = new PDO('mysql:host=localhost;dbname=joyitas-andalucia', 'root', '');

    $query = 'SELECT * FROM Artist';
    $stmt = $mbd->prepare($query);
    $stmt->execute();

    $artists = $stmt->fetchAll(PDO::FETCH_ASSOC);
    //dump($artists);
    if ($artists) {
        $outPut = getArtistMarkup($artists);
        if (isset($_POST['editar'])) {
            dump($_POST['editar']);
            $editArtist = $_POST['editar'];
            header('Location: ./editArtist.php?artist=' . key($editArtist) . '');
        } elseif (isset($_POST['borrar'])) {

            $idDel = key($_POST['borrar']);

            $queryDelConcert = 'DELETE FROM Artist_Concert WHERE id_artist = :id';
            $stmtDelConcert = $mbd->prepare($queryDelConcert);
            $stmtDelConcert->bindParam(':id', $idDel, PDO::PARAM_INT);
            $stmtDelConcert->execute();


            $queryDel = 'DELETE FROM Artist 
                            WHERE id= :id';

            $stmtDel = $mbd->prepare($queryDel);
            $stmtDel->bindParam(':id', $idDel, PDO::PARAM_INT);
            $stmtDel->execute();
            header("Location: " . $_SERVER['PHP_SELF']);
            exit();
        }
        include_once 'includes/artista.tmp.php';
    } else {
        echo "No artists found.";
    }
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
