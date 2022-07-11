<?php

include_once($_SERVER['DOCUMENT_ROOT'] . '/inventool-php/dirs.php');
$mysqli = include(ROOT_PATH . "db.php");

$usuario = strtolower($_POST['usuario']);
$contrasena = $_POST['contrasena'];
$nombre = strtoupper($_POST['nombre']);
$apellido = strtoupper($_POST['apellido']);
$perfil = $_POST['perfil'];

echo $usuario . $contrasena . $nombre . $apellido . $perfil;

$mysqli->query("INSERT INTO usuarios (usuario, contrasena, nombre, apellido, perfil_id)
                VALUES ('$usuario','$contrasena', '$nombre', '$apellido','$perfil')");

header("Location:" . 'http://localhost/inventool-php/index.php?accion=usuarios');
