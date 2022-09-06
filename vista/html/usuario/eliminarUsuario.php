<?php

$usuario = $_POST['delete_id'];

include_once($_SERVER['DOCUMENT_ROOT'] . '/inventool-php/dirs.php');
$mysqli = include(ROOT_PATH . "db.php");
$resultado = $mysqli->query("DELETE FROM usuarios WHERE usuario = '$usuario' ");


$host  = $_SERVER['HTTP_HOST'];
$uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
$extra = 'index.php?accion=usuarios';
header("Location: http://$host$uri/$extra");

exit();
