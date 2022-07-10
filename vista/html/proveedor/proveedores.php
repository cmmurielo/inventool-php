<head>
    <link rel="stylesheet" href="vista/css/proveedor/proveedor.css" />
    <link rel="stylesheet" href="vista/css/proveedor/modalProveedor.css" />
</head>

<?php
include_once($_SERVER['DOCUMENT_ROOT'] . '/inventool-php/dirs.php');
$mysqli = include(ROOT_PATH . "db.php");

$resultado = $mysqli->query("SELECT * FROM proveedores");
$rows = $resultado->fetch_all(MYSQLI_ASSOC);
?>


<div class="contenido-proveedores">
    <div class="titulo">
        <h1>Gestion Proveedores</h1>
    </div>

    <div class="buscar">
        <p>
            Buscar proveedor:
            <span><input type="text" name="buscar" placeholder="Documento, Nombre..." /></span>
        </p>
        <button class="btn btn-success" onclick=" location.href='index.php?accion=agregarProveedor'">
            Agregar Proveedor
        </button>
    </div>
    <table class="table table-striped grid-table">
        <thead>
            <tr>
                <th>Documento</th>
                <th>T Persona</th>
                <th>Nombre</th>
                <th>Teléfono</th>
                <th>Email</th>
                <th>Ciudad</th>
                <th>Dirección</th>
                <th colspan="2">Opciones</th>
            </tr>
        </thead>

        <tbody>
            <?php
            foreach ($rows as $row) {
            ?>
                <tr>
                    <td> <?php echo $row['documento']; ?></td>
                    <td> <?php echo $row['tipoPersona']; ?></td>
                    <td> <?php echo $row['nombre']; ?></td>
                    <td> <?php echo $row['telefono']; ?></td>
                    <td> <?php echo $row['email']; ?></td>
                    <td> <?php echo $row['ciudad']; ?></td>
                    <td> <?php echo $row['direccion']; ?></td>
                    <td><a class="btn btn-primary editbtn" onclick="selectProveedor(<?php echo $row['documento']; ?>)" data-bs-toggle="modal" data-bs-target="#editarModal"><i class="bi bi-pencil"></i></a></td>
                    <td><button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#borrarModal"><i class="bi bi-trash"></i></button></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>


    <!-- Modal edit -->
    <div class="modal fade" id="editarModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Editar proveedor</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="vista/html/proveedor/editarProveedor.php" method="POST" class="grid-form" id="edit-form">

                        <label for="nombre" class="form-label label1">Razon Solcial / Nombre: *
                        </label>
                        <input type="text" id="nombre" name="nombre" class="form-control inputFull" required />

                        <label for="tipoDocumento label1" class="form-label">Tipo documento:</label>
                        <select name="tipoDocumento" class="form-select input1">
                            <option value="CC">CC</option>
                            <option value="NIT">NIT</option>
                            <option value="CE">CE</option>
                            <option value="PAP">PAP</option>
                            <option value="NIP">NIP</option>
                            <option value="TI">TI</option>
                        </select>

                        <label for="documento" class="form-label label2">Documento: * </label>
                        <input type="number" id="documento" name="documento" class="form-control input2" readonly />


                        <label for="tipoPersona" class="form-label">Tipo persona:</label>
                        <select name="tipoPersona" id="tipoPersona" class="form-select">
                            <option value="NATURAL">NATURAL</option>
                            <option value="JURIDICA">JURÍDICA</option>
                        </select>

                        <label for="ciudad" class="form-label label2">Ciudad: </label>
                        <input type="text" id="ciudad" name="ciudad" class="form-control input2" />

                        <label for="direccion" class="form-label label1">Dirección: </label>
                        <input type="text" id="direccion" name="direccion" class="form-control inputFull" />

                        <label for="telefono" class="form-label label1">Teléfono: *</label>
                        <input type="text" id="telefono" name="telefono" class="form-control input1" required />

                        <label for="email" class="form-label label2">Email: </label>
                        <input type="text" id="email" name="email" id="email" class="form-control input2" />

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-success input2">Guardar</button>
                </div>
                </form>

            </div>
        </div>
    </div>

    <!-- Modal Delete -->
    <div class="modal fade" id="borrarModal" tabindex="-1" aria-labelledby="borrarModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="borrarModalLabel">Eliminar proveedor</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>¿Desea eliminar el elemento?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <a class="btn btn-danger" href="vista/html/proveedor/eliminarProveedor.php?id=<?php echo $row['documento']; ?>">Eliminar</a>
                </div>
            </div>
        </div>
    </div>

</div>

<script>
    function selectProveedor(document_id) {

        var proveedor = document_id
        $.post("vista/html/includes/getProveedor.php", {
            data: proveedor
        }, function(data) {
            response = JSON.parse(data)

            $("#edit-form [name='documento']").val(response[0].documento);
            $("#edit-form [name='tipoDocumento']").val(response[0].tipoDocumento);
            $("#edit-form [name='tipoPersona']").val(response[0].tipoPersona);
            $("#edit-form [name='nombre']").val(response[0].nombre);
            $("#edit-form [name='telefono']").val(response[0].telefono);
            $("#edit-form [name='email']").val(response[0].email);
            $("#edit-form [name='ciudad']").val(response[0].ciudad);
            $("#edit-form [name='direccion']").val(response[0].direccion);
        });
    }
</script>