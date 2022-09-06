<head>
    <link rel="stylesheet" href="vista/css/usuario/usuarios.css" />
    <link rel="stylesheet" href="vista/css/usuario/modalUsuario.css" />
</head>

<?php
include_once($_SERVER['DOCUMENT_ROOT'] . '/inventool-php/dirs.php');
$mysqli = include(ROOT_PATH . "db.php");

$resultado = $mysqli->query("SELECT usuarios.usuario, usuarios.contrasena, usuarios.nombre, usuarios.apellido, perfiles.perfil_id ,perfiles.nombre as perfil
                            FROM usuarios
                            INNER JOIN perfiles
                            ON usuarios.perfil_id = perfiles.perfil_id");
$rows = $resultado->fetch_all(MYSQLI_ASSOC);

$perfiles = $mysqli->query("SELECT * FROM perfiles");
$rowsPerfiles = $perfiles->fetch_all(MYSQLI_ASSOC);
?>

<div class="contenido-usuarios">
    <div class="titulo">
        <h1>Gestion Usuarios</h1>
    </div>

    <div class="buscar">
        <p>
            Buscar usuario:
            <span><input type="text" name="buscar" placeholder="Documento, Nombre..." /></span>
        </p>
        <button class="btn btn-success" onclick=" location.href='index.php?accion=agregarUsuario'">
            Agregar usuario
        </button>
    </div>
    <table class="table table-sm table-bordered grid-table">
        <thead>
            <tr>
                <th scope="col">Usuario</th>
                <th scope="col">Nombre</th>
                <th scope="col">Apellido</th>
                <th scope="col">Perfil</th>
                <th scope="col" colspan="3">Opciones</th>
            </tr>
        </thead>

        <tbody class="table-group-divider">
            <?php
            foreach ($rows as $row) {
            ?>
                <tr>
                    <td scope="row"> <?php echo $row['usuario']; ?></td>
                    <td> <?php echo $row['nombre']; ?></td>
                    <td> <?php echo $row['apellido']; ?></td>
                    <td> <?php echo $row['perfil']; ?></td>
                    <td><a class="btn btn-primary editbtn" onclick="selectUsuario('<?php echo $row['usuario']; ?>')" data-bs-toggle="modal" data-bs-target="#editarModal"><i class="bi bi-pencil"></i></a></td>
                    <td><button class="btn btn-warning" onclick="cambiarClave('<?php echo $row['usuario']; ?>')" data-bs-toggle="modal" data-bs-target="#CambiarClaveModal"><i class="bi bi-key"></i></button></td>
                    <td><button class="btn btn-danger" onclick="delUsuario('<?php echo $row['usuario']; ?>')" data-bs-toggle="modal" data-bs-target="#borrarModal"><i class="bi bi-trash"></i></button></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>


    <!-- Modal editar -->
    <div class="modal fade" id="editarModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Editar usuario</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="vista/html/usuario/editarUsuario.php" method="POST" class="grid-form" id="edit-form">

                        <label for="usuario" class="form-label">Usuario: </label>
                        <input type="text" name="usuario" id="usuario" class="form-control" readonly>

                        <label for="nombre" class="form-label">Nombre: </label>
                        <input type="text" name="nombre" id="nombre" class="form-control">

                        <label for="apellido" class="form-label">Apellido: </label>
                        <input type="text" name="apellido" id="apellido" class="form-control">

                        <label for="perfil" class="form-label">Perfil: </label>
                        <select name="perfil" id="perfil" class="form-control">
                            <?php
                            foreach ($rowsPerfiles as $perfil) {
                                echo '<option value="' . $perfil['perfil_id'] . '">' . $perfil['nombre'] . '</option>';
                            }
                            ?>
                        </select>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-success input2">Guardar</button>
                </div>
                </form>

            </div>
        </div>
    </div>

    <!-- Modal cambiar clave -->
    <div class="modal fade" id="CambiarClaveModal" tabindex="-1" aria-labelledby="CambiarClaveModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="CambiarClaveModal">Cambiar Clave</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="vista/html/usuario/editarClaveUsuario.php" method="POST" class="grid-form" id="contrasena-form">

                        <input type="hidden" name="usuario" id="usuario">

                        <label for="contrasena" class="form-label">Contraseña: </label>
                        <input type="password" name="contrasena" id="contrasena" class="form-control" autocomplete="off">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-success input2">Guardar</button>
                </div>
                </form>

            </div>
        </div>
    </div>

    <!-- Modal Borrar -->
    <div class="modal fade" id="borrarModal" tabindex="-1" aria-labelledby="borrarModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="borrarModalLabel">Eliminar usuario</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="vista/html/usuario/eliminarUsuario.php" method="post" id="delete-form">
                        <p>¿Desea eliminar el elemento?</p>
                        <input type="hidden" name="delete_id" class="delete_id">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button class="btn btn-danger" type="submit">Eliminar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>

<script>
    function delUsuario(id) {
        var documento = id
        $("#delete-form [name='delete_id']").val(documento);
    }

    function cambiarClave(id) {
        var usuario = id
        $("#contrasena-form [name='usuario']").val(usuario);
    }

    function selectUsuario(usuario_id) {
        var usuario = usuario_id
        $.post("vista/html/includes/getUsuario.php", {
            data: usuario
        }, function(data) {
            response = JSON.parse(data)
            $("#edit-form [name='usuario']").val(response[0].usuario);
            $("#edit-form [name='nombre']").val(response[0].nombre);
            $("#edit-form [name='apellido']").val(response[0].apellido);
            $("#edit-form [name='perfil']").val(parseInt(response[0].perfil_id));
        });
    }
</script>