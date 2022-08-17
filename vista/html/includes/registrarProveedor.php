<?php

include_once($_SERVER['DOCUMENT_ROOT'] . '/inventool-php/dirs.php');
$mysqli = include(ROOT_PATH . "db.php");

$documento = (int)$_POST['documento'];
$tipoDocumento = $_POST['tipoDocumento'];
$tipoPersona = $_POST['tipoPersona'];
$nombre = strtoupper($_POST['nombre']);
$telefono = $_POST['telefono'];
$email = strtolower($_POST['email']);
$ciudad = strtoupper($_POST['ciudad']);
$direccion = strtoupper($_POST['direccion']);

$mysqli->query("INSERT INTO proveedores (documento, tipoPersona, tipoDocumento, nombre, telefono, email, ciudad, direccion)
                VALUES ('$documento','$tipoPersona', '$tipoDocumento', '$nombre','$telefono','$email','$ciudad','$direccion')");

header("Location:" . 'http://localhost/inventool-php/index.php?accion=proveedores');
