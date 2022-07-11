<?php

include_once($_SERVER['DOCUMENT_ROOT'] . '/inventool-php/dirs.php');
$mysqli = include(ROOT_PATH . "db.php");

$perfiles = $mysqli->query("SELECT * FROM perfiles");
$rowsPerfiles = $perfiles->fetch_all(MYSQLI_ASSOC);
?>

<head>
    <link rel="stylesheet" href="vista/css/usuario/formUsuario.css" />
</head>
<div class="contenido-formUsuario">
    <div class="titulo">
        <h1>Gestion Usuarios</h1>
    </div>

    <div class="botonera">

        <button class="btn btn-primary" onclick="window.location.href = 'index.php?accion=proveedores'">
            Lista de usuarios
        </button>
    </div>

    <form action="vista/html/includes/registrarUsuario.php" method="POST" class="grid-form">

        <label for="usuario" class="form-label">Usuario: </label>
        <input type="text" name="usuario" id="usuario" class="form-control">

        <label for="contrasena" class="form-label">Contraseña: </label>
        <input type="password" name="contrasena" id="contrasena" class="form-control" autocomplete="off">

        <label for="nombre" class="form-label">Nombre: </label>
        <input type="text" name="nombre" id="nombre" class="form-control">

        <label for="apellido" class="form-label">Apellido: </label>
        <input type="text" name="apellido" id="apellido" class="form-control">

        <label for="perfil" class="form-label">Perfil: </label>
        <select name="perfil" id="perfil" class="form-control">
            <option value="">Seleccione el perfil</option>
            <?php
            foreach ($rowsPerfiles as $perfil) {
                echo '<option value="' . $perfil['perfil_id'] . '">' . $perfil['nombre'] . '</option>';
            }
            ?>
        </select>

        <button type="submit" class="btn btn-success input2">Guardar</button>
    </form>
</div>