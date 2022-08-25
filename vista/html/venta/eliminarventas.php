<?php

$proveedor = $_POST['id'];

include_once($_SERVER['DOCUMENT_ROOT'] . '/inventool-php/dirs.php');
$mysqli = include(ROOT_PATH . "db.php");
$resultado = $mysqli->query("DELETE FROM ventas WHERE factura_id = '$ventas' ");

header("Location: http://localhost/inventool-php/index.php?accion=ventas");
exit();
