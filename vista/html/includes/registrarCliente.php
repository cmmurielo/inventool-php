<?php

include_once($_SERVER['DOCUMENT_ROOT'] . '/inventool-php/dirs.php');
$mysqli = include(ROOT_PATH . "db.php");

$nombre = strtoupper($_POST['nombre']);
$apellido = strtoupper($_POST['apellido']);
$documento = (int)$_POST['documento'];
$tipoDocumento = $_POST['tipoDocumento'];
$tipoPersona = $_POST['tipoPersona'];
$ciudad = $_POST['ciudad'];
$direccion = strtoupper($_POST['direccion']);
$telefono = $_POST['telefono'];
$email = strtolower($_POST['email']);

echo $documento . $tipoDocumento . $tipoPersona . $nombre . $apellido . $telefono . $email . $ciudad . $direccion;

$mysqli->query("REPLACE INTO clientes (documento, tipoDocumento, tipoPersona, nombre, apellido, telefono, email, ciudad, direccion)
                VALUES ('$documento','$tipoDocumento', '$tipoPersona', '$nombre','$apellido','$telefono','$email','$ciudad','$direccion')");

header("Location:" . 'http://localhost/inventool-php/index.php?accion=clientes');
