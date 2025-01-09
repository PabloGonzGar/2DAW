<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


require_once '../config/config.php';
require_once '../src/db_utils.php';
require_once '../src/function.inc.php';

$mbd = getConnection();

$tableUsers = getTableUsersMarkup($mbd);

// getInsertUsers('pepe', 'pepe@viyuela.com',$mbd);
include_once '../templates/main.php';