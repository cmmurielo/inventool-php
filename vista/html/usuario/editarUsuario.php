<?php

include_once($_SERVER['DOCUMENT_ROOT'] . '/inventool-php/dirs.php');
$mysqli = include(ROOT_PATH . "db.php");

$usuario = strtolower($_POST['usuario']);
$contrasena = $_POST['contrasena'];
$nombre = strtoupper($_POST['nombre']);
$apellido = strtoupper($_POST['apellido']);
$perfil = $_POST['perfil'];

$mysqli->query("UPDATE usuarios 
                SET contrasena = '$contrasena',
                contrasena = '$contrasena',
                nombre = '$nombre',
                apellido = '$apellido',
                perfil_id = '$perfil'
                WHERE usuario = '$usuario'");

header("Location:" . 'http://localhost/inventool-php/index.php?accion=usuarios');
