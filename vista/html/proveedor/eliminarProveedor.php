<?php

$proveedor = $_POST['id'];

include_once($_SERVER['DOCUMENT_ROOT'] . '/inventool-php/dirs.php');
$mysqli = include(ROOT_PATH . "db.php");
$resultado = $mysqli->query("DELETE FROM proveedores WHERE documento = '$proveedor' ");

header("Location: http://localhost/inventool-php/index.php?accion=proveedores");
exit();
