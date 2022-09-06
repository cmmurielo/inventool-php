<?php

include_once($_SERVER['DOCUMENT_ROOT'] . '/inventool-php/dirs.php');
$mysqli = include(ROOT_PATH . "db.php");

$factura_id = (int)$_POST['factura_id'];
$fechaFactura = $_POST['fechaFactura'];
$cliente_documento = $_POST['cliente_documento'];
$usuarios_usuario = strtoupper($_POST['usuarios_usuario']);
$estado = (int)$_POST['estado'];

$mysqli->query("UPDATE ventas 
                SET 
                tipoPersona = '$tipoPersona',
                fechaFactura = '$fechaFactura',
                cliente_documento = '$cliente_documento',
                usuarios_usuario = '$usuarios_usuario',
                estado = '$estado'
                WHERE factura_id = '$factura_id'");

$host  = $_SERVER['HTTP_HOST'];
$extra = 'index.php?accion=ventas';
header("Location: http://$host/inventool-php/$extra");
