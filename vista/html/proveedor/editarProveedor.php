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

$mysqli->query("UPDATE proveedores 
                SET tipoPersona = '$tipoPersona',
                tipoDocumento = '$tipoDocumento',
                nombre = '$nombre',
                    telefono = '$telefono',
                    email = '$email',
                    ciudad = '$ciudad',
                    direccion = '$direccion'
                WHERE documento = '$documento'");

header("Location:" . 'http://localhost/inventool-php/index.php?accion=proveedores');