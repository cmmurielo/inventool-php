<?php
$id = $_POST['data'];

include_once($_SERVER['DOCUMENT_ROOT'] . '/inventool-php/dirs.php');
$mysqli = include(ROOT_PATH . "db.php");

$proveedor = $mysqli->query("SELECT * FROM proveedores WHERE documento = '$id'")->fetch_all(MYSQLI_ASSOC);

echo json_encode($proveedor);
