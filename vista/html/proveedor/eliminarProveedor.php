<?php

$proveedor = $_POST['id'];

include_once($_SERVER['DOCUMENT_ROOT'] . '/inventool-php/dirs.php');
$mysqli = include(ROOT_PATH . "db.php");
$resultado = $mysqli->query("DELETE FROM proveedores WHERE documento = '$proveedor' ");

$host  = $_SERVER['HTTP_HOST'];
$extra = 'index.php?accion=proveedores';
header("Location: http://$host/inventool-php/$extra");
exit();
