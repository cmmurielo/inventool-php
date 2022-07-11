<?php
$usuario_id = $_POST['data'];

include_once($_SERVER['DOCUMENT_ROOT'] . '/inventool-php/dirs.php');
$mysqli = include(ROOT_PATH . "db.php");

$usuario = $mysqli->query("SELECT * FROM usuarios WHERE usuario = '$usuario_id'")->fetch_all(MYSQLI_ASSOC);

echo json_encode($usuario);
