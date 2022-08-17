<?php
$id = $_POST['data'];

include_once($_SERVER['DOCUMENT_ROOT'] . '/inventool-php/dirs.php');
$mysqli = include(ROOT_PATH . "db.php");

$ventas = $mysqli->query("SELECT * FROM ventas WHERE factura_id = '$id'")->fetch_all(MYSQLI_ASSOC);

echo json_encode($ventas);
