<head>
    <link rel="stylesheet" href="vista/css/producto/productos.css" />
    <link rel="stylesheet" href="vista/css/producto/modalProducto.css" />
</head>

<?php
include_once($_SERVER['DOCUMENT_ROOT'] . '/inventool-php/dirs.php');
$mysqli = include(ROOT_PATH . "db.php");

$resultadoProducto = $mysqli->query("SELECT
                                    p.producto_codigo,
                                    p.nombre,
                                    p.descripcion,
                                    p.costo,
                                    p.saldoBodega,
                                    p.cantidadMinima,
                                    p.cantidadMaxima,
                                    p.imagen,
                                    p.categoria_id,
                                    c.nombre AS categoriaNombre,
                                    pv.documento AS proveedorDocumento,
                                    pv.nombre AS proveedorNombre
                                    FROM productos p
                                    INNER JOIN categorias c ON c.categoria_id = p.categoria_id
                                    INNER JOIN producto_proveedor pp ON pp.producto_codigo = p.producto_codigo
                                    INNER JOIN proveedores pv ON pv.documento = pp.proveedor_documento");
$rowsProducto = $resultadoProducto->fetch_all(MYSQLI_ASSOC);

$resultadoCategoria = $mysqli->query("SELECT * FROM categorias");
$rowsCategoria = $resultadoCategoria->fetch_all(MYSQLI_ASSOC);

$resultadoProveedor = $mysqli->query("SELECT * FROM proveedores");
$rowsProveedor = $resultadoProveedor->fetch_all(MYSQLI_ASSOC);

?>


<div class="contenido-productos">
    <div class="titulo">
        <h1>Gestion Productos</h1>
    </div>

    <div class="buscar">
        <p>
            Buscar productos:
            <span><input type="text" name="buscar" placeholder="Documento, Nombre..." /></span>
        </p>
        <button class="btn btn-success" onclick=" location.href='index.php?accion=agregarProducto'">
            Agregar producto
        </button>
    </div>

    <table class="table table-sm table-bordered grid-table">
        <thead>
            <tr>
                <th scope="col">COD</th>
                <th scope="col">Nombre</th>
                <th scope="col">Descripcion</th>
                <th scope="col">Valor</th>
                <th scope="col">Stock</th>
                <th scope="col">Min</th>
                <th scope="col">Max</th>
                <th scope="col">Proveedor</th>
                <th scope="col">Categoria</th>
                <th scope="col">Imagen</th>
                <th colspan="2">Opciones</th>
            </tr>
        </thead>
        <tbody class="table-group-divider">
            <?php
            foreach ($rowsProducto as $row) {
            ?>
                <tr>
                    <td scope="row"> <?php echo $row['producto_codigo']; ?></td>
                    <td> <?php echo $row['nombre']; ?></td>
                    <td> <?php echo $row['descripcion']; ?></td>
                    <td> <?php echo $row['costo']; ?></td>
                    <td> <?php echo $row['saldoBodega']; ?></td>
                    <td> <?php echo $row['cantidadMinima']; ?></td>
                    <td> <?php echo $row['cantidadMaxima']; ?></td>
                    <td> <?php echo $row['proveedorNombre']; ?></td>
                    <td> <?php echo $row['categoriaNombre']; ?></td>
                    <td>
                        <img src="vista/images/productos/<?php echo $row['imagen']; ?>" height="100px">
                    </td>

                    <td><a class="btn btn-primary editbtn" onclick="selectProducto(<?php echo $row['producto_codigo']; ?>)" data-bs-toggle="modal" data-bs-target="#editarModal"><i class="bi bi-pencil"></i></a></td>
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
                    <form action="vista/html/producto/editarProducto.php" method="POST" class="grid-form" id="edit-form" enctype="multipart/form-data">

                        <label for="producto_codigo" class="form-label label1">Codigo: *</label>
                        <input type="number" id="producto_codigo" name="producto_codigo" class="form-control input1" readonly />

                        <label for="nombre" class="form-label label2">Nombre: * </label>
                        <input type="text" name="nombre" id="nombre" class="form-control input2" required />

                        <label for="descripcion" class="form-label label1">descripcion: </label>
                        <textarea name="descripcion" id="descripcion" class="form-control inputFull" cols="10" rows="5"></textarea>

                        <label for="costo" class="form-label label1">Valor: * </label>
                        <input type="number" id="costo" name="costo" class="form-control input1" />

                        <label for="saldoBodega" class="form-label label2">Saldo en bodega: *</label>
                        <input type="number" id="saldoBodega" name="saldoBodega" class="form-control input2" required />

                        <label for="cantidadMinima" class="form-label label1">Cant. Minima: *</label>
                        <input type="number" id="cantidadMinima" name="cantidadMinima" class="form-control input1" required />

                        <label for="cantidadMaxima" class="form-label label2">Cant. Maxima: *</label>
                        <input type="number" id="cantidadMaxima" name="cantidadMaxima" class="form-control input2" required />

                        <label for="proveedor_id" class="form-label label1">Tipo nombre:</label>
                        <select name="proveedor_id" id="proveedor_id" class="form-select input1">
                            <option value="">Selecciona el proveedor</option>
                            <?php
                            foreach ($rowsProveedor as $rowProveedor) {
                                echo '<option value="' . $rowProveedor['documento'] . '">' . $rowProveedor['nombre'] . '</option>';
                            }
                            ?>

                        </select>

                        <label for="categoria_id" class="form-label label1">Tipo nombre:</label>
                        <select name="categoria_id" id="categoria_id" class="form-select input1">
                            <option value="">Selecciona la categoria</option>
                            <?php
                            foreach ($rowsCategoria as $rowCategoria) {
                                echo '<option value="' . $rowCategoria['categoria_id'] . '">' . $rowCategoria['nombre'] . '</option>';
                            }
                            ?>

                        </select>

                        <label for="imagen" class="form-label label1">imagen: </label>
                        <input type="file" id="" name="imagen" id="imagen" class="form-control inputFull" />
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
                    <h5 class="modal-title" id="borrarModalLabel">Eliminar producto</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>¿Desea eliminar el elemento?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <a class="btn btn-danger" href="vista/html/producto/eliminarProducto.php?id=<?php echo $row['producto_codigo']; ?>">Eliminar</a>
                </div>
            </div>
        </div>
    </div>

</div>

<script>
    function selectProducto(document_id) {

        var producto = document_id
        $.post("vista/html/includes/getProducto.php", {
            data: producto
        }, function(data) {
            response = JSON.parse(data)

            $("#edit-form [name='producto_codigo']").val(response[0].producto_codigo);
            $("#edit-form [name='nombre']").val(response[0].nombre);
            $("#edit-form [name='descripcion']").val(response[0].descripcion);
            $("#edit-form [name='costo']").val(response[0].costo);
            $("#edit-form [name='saldoBodega']").val(response[0].saldoBodega);
            $("#edit-form [name='cantidadMinima']").val(response[0].cantidadMinima);
            $("#edit-form [name='cantidadMaxima']").val(response[0].cantidadMaxima);
            $("#edit-form [name='proveedor_id']").val(response[0].proveedorDocumento);
            $("#edit-form [name='categoria_id']").val(response[0].categoria_id);
            $("#edit-form [name='imagen']").val(response[0].imagen);
        });
    }
</script>