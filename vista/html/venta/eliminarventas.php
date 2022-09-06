<?php

$proveedor = $_POST['id'];

include_once($_SERVER['DOCUMENT_ROOT'] . '/inventool-php/dirs.php');
$mysqli = include(ROOT_PATH . "db.php");
$resultado = $mysqli->query("DELETE FROM ventas WHERE factura_id = '$ventas' ");

$host  = $_SERVER['HTTP_HOST'];
$extra = 'index.php?accion=ventas';
header("Location: http://$host/inventool-php/$extra");
exit();
