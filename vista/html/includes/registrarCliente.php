<?php

$mysqli = include_once "../../../db.php";

$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$documento = (int)$_POST['documento'];
$tipoDocumento = $_POST['tipoDocumento'];
$tipoPersona = $_POST['tipoPersona'];
$departamento = $_POST['departamento'];
$municipio = (int)$_POST['municipio'];
$direccion = $_POST['direccion'];
$telefono = $_POST['telefono'];
$email = $_POST['email'];

echo $documento . $tipoDocumento . $nombre . $apellido . $telefono . $email . $municipio . $direccion;

$mysqli->query("INSERT INTO clientes (cliente_documento, tipoDocumento, nombre, apellido, telefono, email, municipio_id, direccion) VALUES ('$documento','$tipoDocumento','$nombre','$apellido','$telefono','$email','$municipio','$direccion')");

header("Location:" . 'http://localhost/inventool-php/index.php?accion=clientes');
