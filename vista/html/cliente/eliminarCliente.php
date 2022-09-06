<?php

$id = $_POST['delete_id'];

include_once($_SERVER['DOCUMENT_ROOT'] . '/inventool-php/dirs.php');
$mysqli = include(ROOT_PATH . "db.php");
$resultado = $mysqli->query("DELETE FROM clientes WHERE documento = '$id' ");

$host  = $_SERVER['HTTP_HOST'];
$extra = 'index.php?accion=clientes';
header("Location: http://$host/inventool-php/$extra");
exit();
