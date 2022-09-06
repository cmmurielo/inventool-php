<?php

include_once($_SERVER['DOCUMENT_ROOT'] . '/inventool-php/dirs.php');
$mysqli = include(ROOT_PATH . "db.php");

$usuario = strtolower($_POST['usuario']);
$nombre = strtoupper($_POST['nombre']);
$apellido = strtoupper($_POST['apellido']);
$perfil = $_POST['perfil'];

$mysqli->query("UPDATE usuarios 
                SET 
                nombre = '$nombre',
                apellido = '$apellido',
                perfil_id = '$perfil'
                WHERE usuario = '$usuario'");

$host  = $_SERVER['HTTP_HOST'];
$extra = 'index.php?accion=usuarios';
header("Location: http://$host/inventool-php/$extra");
exit();
