<?php

include_once($_SERVER['DOCUMENT_ROOT'] . '/inventool-php/dirs.php');
$mysqli = include(ROOT_PATH . "db.php");

$factura_id = (int)$_POST['factura_id'];
$fechaFactura = strtoupper($_POST['fechaFactura']);
$cliente_documento = $_POST['cliente_documento'];
$usarios_usuario = (int)($_POST['usarios_usuario']);

$mysqli->query("INSERT INTO ventas (factura_id, fechaFactura, cliente_documento, usuarios_usuario)
                VALUES ('$factura_id','$fechaFactura, $cliente_documento, $usarios_usuario'");

$host  = $_SERVER['HTTP_HOST'];
$extra = 'index.php?accion=ventas';
header("Location: http://$host/inventool-php/$extra");
