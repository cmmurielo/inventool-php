<?php
session_start();

include_once($_SERVER['DOCUMENT_ROOT'] . '/inventool-php/dirs.php');
$mysqli = include(ROOT_PATH . "db.php");

$username = $_POST['username'];
$password = $_POST['password'];

$resultado = $mysqli->query("SELECT contrasena FROM usuarios WHERE usuario = '$username'");
$row = $resultado->fetch_all(MYSQLI_ASSOC);

if (count($row) > 0) {
    $compararPassword = password_verify($password, $row[0]['contrasena']);
    if ($compararPassword) {
        $resultado = $mysqli->query("SELECT usuarios.usuario, usuarios.nombre, usuarios.apellido, perfiles.nombre as perfil
                            FROM usuarios
                            INNER JOIN perfiles
                            ON usuarios.perfil_id = perfiles.perfil_id
                            WHERE usuario = '$username'");
        $usuario = $resultado->fetch_all(MYSQLI_ASSOC);

        $_SESSION['usuario'] = $usuario[0]['usuario'];
        $_SESSION['nombre'] = $usuario[0]['nombre'];
        $_SESSION['apellido'] = $usuario[0]['apellido'];
        $_SESSION['perfil'] = $usuario[0]['perfil'];

        header("Location: ../index.php");
    } else {
        echo 'Usuario o contrasena incorrecta';
        header("Location: ../login.php");
    }
} else {
    echo 'Usuario o contrasena incorrecta';
    // header("Location: ../login.php");
}
