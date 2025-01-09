<?php
require_once '../config/config.php';

function getConnection()
{
    try {
        return new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME ,DB_USER,DB_PASSWORD);
    } catch (PDOException $e) {
        die($e->getMessage());
    }
}
