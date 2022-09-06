<?php

include_once($_SERVER['DOCUMENT_ROOT'] . '/inventool-php/dirs.php');
$mysqli = include(ROOT_PATH . "db.php");

$usuario = strtolower($_POST['usuario']);
$contrasena = $_POST['contrasena'];
$nombre = strtoupper($_POST['nombre']);
$apellido = strtoupper($_POST['apellido']);
$perfil = $_POST['perfil'];

$hash = password_hash($contrasena, PASSWORD_DEFAULT);

$mysqli->query("INSERT INTO usuarios (usuario, contrasena, nombre, apellido, perfil_id)
                VALUES ('$usuario','$hash', '$nombre', '$apellido','$perfil')");

$host  = $_SERVER['HTTP_HOST'];
$extra = 'index.php?accion=usuarios';
header("Location: http://$host/inventool-php/$extra");
