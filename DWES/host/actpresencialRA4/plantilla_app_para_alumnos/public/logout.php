<?php

session_start();

require_once('../app/vars.php');
require_once('../app/functions.php');


$_SESSION['login'] = null;
$_SESSION['carrito'] = null;

header('Location: index.php');