<?php

$id = (int)$_GET['id'];

include_once($_SERVER['DOCUMENT_ROOT'] . '/inventool-php/dirs.php');
$mysqli = include(ROOT_PATH . "db.php");
$resultado = $mysqli->query("DELETE FROM productos WHERE producto_codigo = '$id' ");

header("Location: http://localhost/inventool-php/index.php?accion=productos");
exit();
