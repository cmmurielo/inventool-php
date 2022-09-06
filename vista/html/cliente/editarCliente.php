<?php

include_once($_SERVER['DOCUMENT_ROOT'] . '/inventool-php/dirs.php');
$mysqli = include(ROOT_PATH . "db.php");

$nombre = strtoupper($_POST['nombre']);
$apellido = strtoupper($_POST['apellido']);
$documento = (int)$_POST['documento'];
$tipoDocumento = $_POST['tipoDocumento'];
$tipoPersona = $_POST['tipoPersona'];
$ciudad = strtoupper($_POST['ciudad']);
$direccion = strtoupper($_POST['direccion']);
$telefono = $_POST['telefono'];
$email = strtolower($_POST['email']);

$mysqli->query("UPDATE clientes 
                SET tipoDocumento = '$tipoDocumento',
                    tipoPersona = '$tipoPersona',
                    nombre = '$nombre',
                    apellido = '$apellido',
                    telefono = '$telefono',
                    email = '$email',
                    ciudad = '$ciudad',
                    direccion = '$direccion'
                WHERE documento = '$documento'");

$host  = $_SERVER['HTTP_HOST'];
$extra = 'index.php?accion=clientes';
header("Location: http://$host/inventool-php/$extra");
