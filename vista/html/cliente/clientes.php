<head>
    <link rel="stylesheet" href="vista/css/cliente/clientes.css" />
    <link rel="stylesheet" href="vista/css/cliente/formCliente.css" />
    <link rel="stylesheet" href="vista/css/cliente/modalCliente.css" />
</head>

<?php
include_once($_SERVER['DOCUMENT_ROOT'] . '/inventool-php/dirs.php');
$mysqli = include(ROOT_PATH . "db.php");

$resultado = $mysqli->query("SELECT * FROM clientes");
$rows = $resultado->fetch_all(MYSQLI_ASSOC);
?>


<div class="contenido-clientes">
    <div class="titulo">
        <h1>Gestion Clientes</h1>
    </div>

    <div class="buscar">
        <p>
            Buscar cliente:
            <span><input type="text" name="buscar" placeholder="Documento, Nombre..." /></span>
        </p>
        <button class="btn btn-success" onclick=" location.href='index.php?accion=agregarCliente'">
            Agregar Cliente
        </button>
    </div>
    <table class="table table-striped grid-table">
        <thead>
            <tr>
                <th>Documento</th>
                <th>T Documento</th>
                <th>Nombre</th>
                <th>Apellido</th>
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
                    <td> <?php echo $row['tipoDocumento']; ?></td>
                    <td> <?php echo $row['nombre']; ?></td>
                    <td> <?php echo $row['apellido']; ?></td>
                    <td> <?php echo $row['telefono']; ?></td>
                    <td> <?php echo $row['email']; ?></td>
                    <td> <?php echo $row['ciudad']; ?></td>
                    <td> <?php echo $row['direccion']; ?></td>
                    <td><a class="btn btn-primary editbtn" onclick="selectCliente(<?php echo $row['documento']; ?>)" data-bs-toggle="modal" data-bs-target="#editarModal"><i class="bi bi-pencil"></i></a></td>
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
                    <h5 class="modal-title" id="editModalLabel">Editar cliente</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="vista/html/cliente/editarCliente.php" method="POST" class="model-formCliente" id="edit-form">
                        <label for="nombre" class="form-label">Razon Solcial / Nombre: *
                        </label>
                        <input type="text" class="form-control" id="nombre" name="nombre" required />

                        <label for="apellido" class="form-label">Apellido
                        </label>
                        <input type="text" class="form-control" id="apellido" name="apellido" required />

                        <label for="documento" class="form-label">Documento
                        </label>
                        <input type="text" class="form-control" id="documento" name="documento" readonly />

                        <label for="tipoDocumento" class="form-label">Tipo documento:</label>
                        <select class="form-select" id="tipoDocumento" name="tipoDocumento">
                            <option value="CC">CC</option>
                            <option value="NIT">NIT</option>
                            <option value="CE">CE</option>
                            <option value="PAP">PAP</option>
                            <option value="NIP">NIP</option>
                            <option value="TI">TI</option>
                        </select>

                        <label for="tipoPersona" class="form-label">Tipo persona:</label>
                        <select class="form-select" id="tipoPersona" name="tipoPersona" class="inputFull">
                            <option value="NATURAL">NATURAL</option>
                            <option value="JURIDICA">JURÍDICA</option>
                        </select>

                        <label for="ciudad" class="form-label">Ciudad:</label>
                        <input type="text" class="form-control" name="ciudad" id="ciudad" />

                        <label for="direccion" class="form-label">Dirección: </label>
                        <input type="text" class="form-control" id="direccion" name="direccion" class="inputFull" />

                        <label for="telefono" class="form-label">Telefono: *
                        </label>
                        <input type="text" class="form-control" id="telefono" name="telefono" required />

                        <label for="email" class="form-label">Email: </label>
                        <input type="email" class="form-control" id="email" name="email" id="email" />

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button class="btn btn-success" type="submit">Guardar Cambio</button>
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
                    <h5 class="modal-title" id="borrarModalLabel">Eliminar cliente</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>¿Desea eliminar el elemento?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <a class="btn btn-danger" href="vista/html/cliente/eliminarCliente.php?id=<?php echo $row['cliente_documento']; ?>">Eliminar</a>
                </div>
            </div>
        </div>
    </div>

</div>

<script>
    function selectCliente(document_id) {

        var cliente_documento = document_id
        console.log(cliente_documento);
        $.post("vista/html/includes/getCliente.php", {
            data: cliente_documento
        }, function(data) {
            response = JSON.parse(data)
            console.log(response[0].nombre);

            $("#edit-form [name='documento']").val(response[0].documento);
            $("#edit-form [name='tipoDocumento']").val(response[0].tipoDocumento);
            $("#edit-form [name='tipoPersona']").val(response[0].tipoPersona);
            $("#edit-form [name='nombre']").val(response[0].nombre);
            $("#edit-form [name='apellido']").val(response[0].apellido);
            $("#edit-form [name='telefono']").val(response[0].telefono);
            $("#edit-form [name='email']").val(response[0].email);
            $("#edit-form [name='ciudad']").val(response[0].ciudad);
            $("#edit-form [name='direccion']").val(response[0].direccion);

        });
    }
</script>