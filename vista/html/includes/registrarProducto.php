<?php

include_once($_SERVER['DOCUMENT_ROOT'] . '/inventool-php/dirs.php');
$mysqli = include(ROOT_PATH . "db.php");

$producto_codigo = (int)$_POST['producto_codigo'];
$nombre = strtoupper($_POST['nombre']);
$descripcion = $_POST['descripcion'];
$costo = (int)($_POST['costo']);
$saldoBodega = (int)$_POST['saldoBodega'];
$cantidadMinima = (int)$_POST['cantidadMinima'];
$cantidadMaxima = (int)$_POST['cantidadMaxima'];
$categoria_id = (int)$_POST['categoria_id'];
$imagen = $_POST['imagen'];


echo $producto_codigo . ' / ' . $nombre . ' / ' . $descripcion . ' / ' . $costo . ' / ' . $saldoBodega . ' / ' . $cantidadMinima . ' / ' . $cantidadMaxima . ' / ' . $categoria_id . ' / ' . $imagen;

$mysqli->query("REPLACE INTO productos (producto_codigo, nombre, descripcion, costo, saldoBodega, cantidadMinima, cantidadMaxima, categoria_id, imagen)
                VALUES ('$producto_codigo','$nombre', '$descripcion', '$costo','$saldoBodega','$cantidadMinima','$cantidadMaxima','$categoria_id' , '$imagen')");

header("Location:" . 'http://localhost/inventool-php/index.php?accion=productos');
