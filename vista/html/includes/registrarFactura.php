<?php

include_once($_SERVER['DOCUMENT_ROOT'] . '/inventool-php/dirs.php');
$mysqli = include(ROOT_PATH . "db.php");

$idFactura = (int)$_POST['idFactura'];
$fecha = $_POST['fecha'];
$documento = (int)$_POST['documento'];
$usuario = $_POST['usuario'];
$valor = (int)$_POST['valor_netoFactura'];

$mysqli->query("INSERT INTO facturas (factura_id,cliente_documento,usuarios_usuario,valor)
                VALUES ('$idFactura','$documento', '$usuario', '$valor')");

$detalles = json_decode($_POST['detalles']);

foreach ($detalles as $detalle) {
    $saldoBodega = $mysqli->query("SELECT saldoBodega from productos WHERE producto_codigo = '$detalle[0]'");
    $rowSaldoBodega = $saldoBodega->fetch_all(MYSQLI_ASSOC);
    $nuevoSaldoBodega = $rowSaldoBodega[0]['saldoBodega'] - $detalle[2];

    $mysqli->query("INSERT INTO detalle_factura (factura_id,producto_codigo,cantidad,descuento,valor)
                VALUES ('$idFactura','$detalle[0]', '$detalle[2]', '$detalle[5]', '$detalle[7]')");

    $mysqli->query("UPDATE productos
            SET saldoBodega = '$nuevoSaldoBodega'
            WHERE producto_codigo = '$detalle[0]'");
}

$host  = $_SERVER['HTTP_HOST'];
$uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
$extra = 'index.php?accion=ventas';
header("Location: http://$host$uri/$extra");
