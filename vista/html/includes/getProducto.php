<?php
$id = $_POST['data'];

include_once($_SERVER['DOCUMENT_ROOT'] . '/inventool-php/dirs.php');
$mysqli = include(ROOT_PATH . "db.php");

$producto = $mysqli->query("SELECT * FROM productos WHERE producto_codigo = '$id'")->fetch_all(MYSQLI_ASSOC);

echo json_encode($producto);
