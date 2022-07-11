<?php
session_start();

include_once($_SERVER['DOCUMENT_ROOT'] . '/inventool-php/dirs.php');
$mysqli = include(ROOT_PATH . "db.php");

$username = $_POST['username'];
$password = $_POST['password'];

$resultado = $mysqli->query("SELECT usuarios.usuario, usuarios.contrasena, usuarios.nombre, usuarios.apellido, perfiles.nombre as perfil
                            FROM usuarios
                            INNER JOIN perfiles
                            ON usuarios.perfil_id = perfiles.perfil_id
                            WHERE usuario = '$username' AND contrasena = '$password'");

$rows = $resultado->fetch_all(MYSQLI_ASSOC);

if (count($rows) > 0) {
    $_SESSION['usuario'] = $rows[0]['usuario'];
    $_SESSION['nombre'] = $rows[0]['nombre'];
    $_SESSION['apellido'] = $rows[0]['apellido'];
    $_SESSION['perfil'] = $rows[0]['perfil'];

    header("Location: ../index.php");
} else {
    echo 'Usuario o contrasena incorrecto';
}
