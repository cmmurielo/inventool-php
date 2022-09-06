<?php

include_once($_SERVER['DOCUMENT_ROOT'] . '/inventool-php/dirs.php');
$mysqli = include(ROOT_PATH . "db.php");

print_r($_POST);


// $usuario = strtolower($_POST['usuario']);
// $contrasena = $_POST['contrasena'];

// $hash = password_hash($contrasena, PASSWORD_DEFAULT);

// $mysqli->query("UPDATE usuarios 
//                 SET 
//                 contrasena = '$hash',
//                 WHERE usuario = '$usuario'");

// $host  = $_SERVER['HTTP_HOST'];
// $extra = 'index.php?accion=usuarios';
// header("Location: http://$host/inventool-php/$extra");
// exit();
