<?php

$producto = (int)$POST['id'];

include_once($_SERVER['DOCUMENT_ROOT'] . '/inventool-php/dirs.php');
$mysqli = include(ROOT_PATH . "db.php");
$resultado = $mysqli->query("DELETE FROM productos WHERE producto_codigo = '$producto' ");

$host  = $_SERVER['HTTP_HOST'];
$extra = 'index.php?accion=productos';
header("Location: http://$host/inventool-php/$extra");
exit();
