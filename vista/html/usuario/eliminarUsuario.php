<?php

$usuario_id = $_GET['id'];

include_once($_SERVER['DOCUMENT_ROOT'] . '/inventool-php/dirs.php');
$mysqli = include(ROOT_PATH . "db.php");
$resultado = $mysqli->query("DELETE FROM usuarios WHERE usuario = '$usuario_id' ");

header("Location: http://localhost/inventool-php/index.php?accion=usuarios");
exit();
