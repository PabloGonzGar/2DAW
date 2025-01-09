<?php

function dump($var)
{
    echo '<pre>' . print_r($var, true) . '</pre>';
}



function getTableUsersMarkup($mbd)
{
    $query = 'SELECT * FROM usuarios';

    $stmt = $mbd->prepare($query);
    $stmt->execute();

    $users = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $table = '';
    
    foreach($users as $user){
        dump($user);
        $table .= '<tr><td>';
        $table .= $user['nombre'].'</td>';
        $table .= '<td>'.$user['email'].'</td>';
        $table .= '</tr>';

    }

    dump($table);
    return $table;
}


function getInsertUsers($nombre, $email,$mbd){
    $query = 'INSERT INTO usuarios(nombre, email)
                VALUES (:name, :mail)';
    $stmt = $mbd->prepare($query);
    $stmt->bindParam(':name', $nombre, PDO::PARAM_STR);
    $stmt->bindParam(':mail', $email, PDO::PARAM_STR);
    $stmt->execute();
}
