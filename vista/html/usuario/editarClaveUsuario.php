<?php

include_once($_SERVER['DOCUMENT_ROOT'] . '/inventool-php/dirs.php');
$mysqli = include(ROOT_PATH . "db.php");

$usuario = strtolower($_POST['usuario']);
$contrasena = $_POST['contrasena'];

$hash = password_hash($contrasena, PASSWORD_DEFAULT);

$mysqli->query("UPDATE usuarios 
                SET 
                contrasena = '$hash',
                perfil_id = '$perfil'
                WHERE usuario = '$usuario'");

header("Location:" . 'http://localhost/inventool-php/index.php?accion=usuarios');
