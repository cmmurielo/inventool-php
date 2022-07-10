<?php

include_once($_SERVER['DOCUMENT_ROOT'] . '/inventool-php/dirs.php');
$mysqli = include(ROOT_PATH . "db.php");

$directorio_imagen = FILES_PATH . 'prductos/';
$imagen = $_FILES['imagen']['name'];
$tipo_imagen = $_FILES['imagen']['type'];
$tamagno_imagen = $_FILES['imagen']['size'];
move_uploaded_file($_FILES['imagen']['tmp_name'], $directorio_imagen . $imagen);

$producto_codigo = (int)$_POST['producto_codigo'];
$nombre = strtoupper($_POST['nombre']);
$descripcion = $_POST['descripcion'];
$costo = (int)($_POST['costo']);
$saldoBodega = (int)$_POST['saldoBodega'];
$cantidadMinima = (int)$_POST['cantidadMinima'];
$cantidadMaxima = (int)$_POST['cantidadMaxima'];
$categoria_id = (int)$_POST['categoria_id'];

$mysqli->query("UPDATE productos 
                SET nombre = '$nombre',
                descripcion = '$descripcion',
                costo = '$costo',
                saldoBodega = '$saldoBodega',
                cantidadMinima = '$cantidadMinima',
                cantidadMaxima = '$cantidadMaxima',
                categoria_id = '$categoria_id',
                imagen = '$imagen'
                WHERE producto_codigo = '$producto_codigo'");


header("Location:" . 'http://localhost/inventool-php/index.php?accion=productos');
