    <link rel="stylesheet" href="vista/css/proveedor/proveedor.css" />
    <link rel="stylesheet" href="vista/css/proveedor/modalProveedor.css" />
</head>
<link rel="shortcut icon" href="http://www.miweb.com/favicon.ico">
<?php
include_once($_SERVER['DOCUMENT_ROOT'] . '/inventool-php/dirs.php');
$mysqli = include(ROOT_PATH . "db.php");
$resultado = $mysqli->query("SELECT * FROM facturas");
$rows = $resultado->fetch_all(MYSQLI_ASSOC);
$estado = 1;

?>
<div class="contenido-proveedores">
    <div class="titulo">
        <h1>Gestion Ventas</h1>
    </div>
    
    <div class="buscar">
        <p>
            Buscar Venta:
            <span><input type="text" name="buscar" placeholder="Documento, Nombre..." /></span>
        </p>
        <button class="btn btn-success" onclick=" location.href='index.php?accion=agregarfacturas'">
            Agregar Venta
        </button>
    </div>
    <table class="table table-sm table-bordered grid-table">
        <thead>
            <tr>
                <th scope="col">factura_id</th>
                <th scope="col">fechaFactura</th>
                <th scope="col">cliente_documento</th>
                <th scope="col">usuarios_usuario</th>
                <th scope="col">estado</th>
                <th scope="col" colspan="2">Opciones</th>
            </tr>
        </thead>

        <tbody class="table-group-divider">
            <?php
            foreach ($rows as $row) {
            ?>
                <tr>
                    <td> <?php echo $row['factura_id']; ?></td>
                    <td> <?php echo $row['fechaFactura']; ?></td>
                    <td> <?php echo $row['cliente_documento']; ?></td>
                    <td> <?php echo $row['usuarios_usuario']; ?></td>
                    
                    <td class="estado_activo">
                        <?php
                        if ($row['estado'] == 1) {
                            echo 'Activo';
                        } else {
                            echo 'Inactivo';
                        }
                        ?>
                    </td>
                    <td><a class="btn btn-primary editbtn" onclick="selectProveedor(<?php echo $row['documento']; ?>)" data-bs-toggle="modal" data-bs-target="#editarModal"><i class="bi bi-pencil"></i></a></td>
                    <td><button class="btn btn-danger" onclick="delProveedor('<?php echo $row['documento']; ?>')" data-bs-toggle="modal" data-bs-target="#borrarModal"><i class="bi bi-trash"></i></button></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>


    <!-- Modal edit -->
    <div class="modal fade" id="editarModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Editar factura</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="vista/html/proveedor/editarProveedor.php" method="POST" class="grid-form" id="edit-form">

                        <label for="factura_id" class="form-label label1">factura_id / factura_id: *
                        </label>
                        <input type="text" id="factura_id" name="factura_id" class="form-control inputFull" required />

                        <label for="fechaFactura label1" class="form-label">fechaFactura:</label>
                        <input type="text" id="echaFactura" name="fechaFactura" class="form-control inputFull" required />

                        <label for="cliente_documento label1" class="form-label">cliente_documento:</label>
                        <input type="text" id="cliente_documento" name="cliente_documento" class="form-control inputFull" required />
                              

                        <label for="usuarios_usuario" class="form-label">usuarios_usuario:</label>
                        <select name="usuarios_usuario" id="usuarios_usuario" class="form-select">
                            <option value="ADMIN">ADMIN</option>
                            <option value="VENDEDOR">VENDEDOR</option>
                            <option value="INVENTARIO">INVENTARIO</option>
                        </select>
                           <br>

                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" role="switch" id="estado" value="1" <?php echo ($row['estado'] == 1) ? 'checked' : ""; ?>>
                            <input class="form-check-input" type="hidden" role="switch" id="hdnestado" name="estado" value="1">
                            <label class="form-check-label" for="estado">Estado de la  factura</label>
                        </div>

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
                    <h5 class="modal-title" id="borrarModalLabel">Eliminar facturas</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="vista/html/proveedor/eliminarProveedor.php" method="post" id="delete-form">
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
    function delProveedor(id) {
        var documento = id
        $("#delete-form [name='delete_id']").val(documento);
    }

    $('#estado').on('change', function() {
        $('#hdnestado').val(this.checked ? 1 : 0);
    });

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
            $("#edit-form [name='estado']").val(response[0].estado);

        });
    }
</script>