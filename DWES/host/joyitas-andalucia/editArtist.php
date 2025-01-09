<?php

include_once './includes/functions.inc.php';

try {
    $mbd = new PDO('mysql:host=localhost;dbname=joyitas-andalucia', 'root', '');

    $query = 'SELECT * FROM Artist';
    $stmt = $mbd->prepare($query);
    $stmt->execute();

    $artists = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if ($artists) {
        if (isset($_GET['artist'])) {
            $idArtistToSearch = $_GET['artist'];

            foreach ($artists as $artist) {

                if ($idArtistToSearch == $artist['id']) {
                    $editArtist = $artist;
                }
            }

            $outPut = getEditMarkup($editArtist);
            include_once './includes/edit.tmp.php';

            if (isset($_POST['guardar'])) {

                if (
                    (isset($_POST['name']) && !empty($_POST['name']))
                    &&
                    (isset($_POST['price']) && !empty($_POST['price']))
                ) {

                    $nameToSave = $_POST['name'];
                    $priceToSave = $_POST['price'];

                    $updateQuery = 'UPDATE Artist
                                    SET name = :name, price= :price
                                    WHERE id = :id';
                    $stmtUpdate = $mbd->prepare($updateQuery);
                    $stmtUpdate->bindParam(':name', $nameToSave, PDO::PARAM_STR);
                    $stmtUpdate->bindParam(':price', $priceToSave, PDO::PARAM_STR);
                    $stmtUpdate->bindParam(':id', $idArtistToSearch, PDO::PARAM_INT);
                    $stmtUpdate->execute();
                    header('Location: ./artista.php');
                } else {
                    dump("No has rellenado ambos correctamente");
                }
            }
        }
    } else {
        echo "No artists found.";
    }
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
