<?php

include_once($_SERVER['DOCUMENT_ROOT'] . '/inventool-php/dirs.php');
$mysqli = include(ROOT_PATH . "db.php");

$directorio_imagen = FILES_PATH . 'productos/';
$nombre_imagen = $_FILES['imagen']['name'];
$tipo_imagen = $_FILES['imagen']['type'];
$tamagno_imagen = $_FILES['imagen']['size'];
$imagen_tmp = $_FILES['imagen']['tmp_name'];
move_uploaded_file($imagen_tmp, $directorio_imagen . $nombre_imagen);

$producto_codigo = (int)$_POST['producto_codigo'];
$nombre = strtoupper($_POST['nombre']);
$descripcion = $_POST['descripcion'];
$costo = (int)($_POST['costo']);
$saldoBodega = (int)$_POST['saldoBodega'];
$cantidadMinima = (int)$_POST['cantidadMinima'];
$cantidadMaxima = (int)$_POST['cantidadMaxima'];
$proveedor_id = (int)$_POST['proveedor_id'];
$categoria_id = (int)$_POST['categoria_id'];

try {
    $mysqli->query("INSERT INTO producto_proveedor (producto_codigo, proveedor_documento)
                    VALUES ('$producto_codigo','$proveedor_id'");
} catch (\Throwable $th) {
    echo 'Se produjo un error: ' . $th;
}


$mysqli->query("INSERT INTO productos (producto_codigo, nombre, descripcion, costo, saldoBodega, cantidadMinima, cantidadMaxima, categoria_id, imagen)
                VALUES ('$producto_codigo','$nombre', '$descripcion', '$costo','$saldoBodega','$cantidadMinima','$cantidadMaxima','$categoria_id' , '$nombre_imagen')");

// $host  = $_SERVER['HTTP_HOST'];
// $extra = 'index.php?accion=productos';
// header("Location: http://$host/inventool-php/$extra");
