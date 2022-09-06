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
$estado = (int)$_POST['estado'];

$mysqli->query("UPDATE proveedores 
                SET 
                tipoPersona = '$tipoPersona',
                tipoDocumento = '$tipoDocumento',
                nombre = '$nombre',
                telefono = '$telefono',
                email = '$email',
                ciudad = '$ciudad',
                direccion = '$direccion',
                estado = '$estado'
                WHERE documento = '$documento'");

$host  = $_SERVER['HTTP_HOST'];
$extra = 'index.php?accion=proveedores';
header("Location: http://$host/inventool-php/$extra");
