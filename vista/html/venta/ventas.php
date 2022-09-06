<head>
    <link rel="stylesheet" href="vista/css/ventas/ventas.css" />
</head>

<?php
include_once($_SERVER['DOCUMENT_ROOT'] . '/inventool-php/dirs.php');
$mysqli = include(ROOT_PATH . "db.php");
$id_factura = $mysqli->query("SELECT max(factura_id) as factura_id from facturas");
$rowIdFactura = $id_factura->fetch_all(MYSQLI_ASSOC);
?>

<div class="contenido-ventas">

    <div class="formulario">
        <form action="vista/html/includes/registrarFactura.php" method="POST" id="form-cliente" autocomplete="on">
            <div class="titulo-factura">
                <div class="logoFactura">
                    <img src="vista/images/logook.png" alt="" srcset="">
                </div>
                <div>
                    <div class="numeroFactura">
                        <input type="text" name="idFactura" class="form-control" id="idFactura" readonly value="<?php echo $rowIdFactura[0]['factura_id'] + 1 ?>">
                    </div>
                </div>

            </div>
            <!-- CLIENTE -->
            <input type="hidden" name="usuario" id="usuario" value="<?php echo $_SESSION['usuario'] ?>">

            <fieldset>
                <legend>Cliente</legend>
                <div class="formularioCliente">

                    <div>
                        <label for="documento" class="form-label">Documento: </label>
                        <input type="text" name="documento" id="documento" class="form-control" onchange="obtenetCliente(this.value)">
                    </div>
                    <div>
                        <label for="fecha" class="form-label">Fecha: </label>
                        <input type="date" name="fecha" id="fecha" class="form-control" readonly>
                    </div>
                    <div class="inputFull">
                        <label for="nombre" class="form-label">Nombre/Razon Social: </label>
                        <input type="text" name="nombre" id="nombre" class="form-control" readonly>
                    </div>
                    <div class="inputFull">
                        <label for="direccion" class="form-label">Direccion: </label>
                        <input type="text" name="direccion" id="direccion" class="form-control" readonly>
                    </div>
                    <div>
                        <label for="telefono" class="form-label">Telefono: </label>
                        <input type="text" name="telefono" id="telefono" class="form-control" readonly>
                    </div>
                    <div>
                        <label for="email" class="form-label">Email: </label>
                        <input type="mail" name="email" id="email" class="form-control" readonly>
                    </div>
                </div>
            </fieldset>
            <br>
            <!-- PRODUCTOS -->
            <fieldset>
                <legend>Registro de productos</legend>
                <div class="formularioProducto">
                    <div>
                        <label for="codigo" class="form-label">Codigo</label>
                        <input type="number" name="codigo" id="codigo" class="form-control" onchange="obtenerProducto(this.value)">
                    </div>
                    <div>
                        <label for="producto" class="form-label">Producto</label>
                        <input type="text" name="producto" id="producto" class="form-control" readonly>
                    </div>
                    <div>
                        <label for="cantidad" class="form-label">Cantidad</label>
                        <input type="number" name="cantidad" id="cantidad" class="form-control" min="1" value="1" onchange="calcularValorPorCantidad(this.value)">
                    </div>
                    <div>
                        <label for="valor_initario" class="form-label">Valor Unidad</label>
                        <input type="number" name="valor_initario" id="valor_initario" class="form-control" readonly>
                    </div>
                    <div>
                        <label for="subtotal" class="form-label">Subtotal</label>
                        <input type="number" name="subtotal" id="subtotal" class="form-control" readonly>
                    </div>
                    <div>
                        <label for="descuento" class="form-label">Desc %</label>
                        <input type="number" name="descuento" id="descuento" class="form-control" min="0" value="0" onchange="calcularValorPorDescuento(this.value)">
                    </div>
                    <div>
                        <label for="valor_total" class="form-label">Valor Total</label>
                        <input type="number" name="valor_total" id="valor_total" class="form-control" value="" readonly>
                    </div>
                    <div class="agregarDetalle">
                        <input type="button" value="Agregar" class="btn btn-success" onclick="agregarProductoADetalle()">
                    </div>
                </div>
            </fieldset>
            <br>
            <!-- DETALLE PRODUCTOS -->
            <fieldset>
                <legend>Detalle de productos</legend>
                <table class="table table-sm table-bordered grid-table" id="detalleProductos">
                    <thead>
                        <tr>
                            <th scope="col">Item</th>
                            <th scope="col">Codigo</th>
                            <th scope="col">Producto</th>
                            <th scope="col">Cantidad</th>
                            <th scope="col">Valor Unidad</th>
                            <th scope="col">Subtotal</th>
                            <th scope="col">Desc %</th>
                            <th scope="col">IVA %</th>
                            <th scope="col">Valor Total</th>
                        </tr>
                    </thead>
                    <tbody class="table-group-divider" id="detalleProductosBody">
                        <!-- <tr>
                            <td scope="row">1</td>
                            <td>268413</td>
                            <td>Set Puntas Touch Case 18 Piezas Ref DW2174</td>
                            <td>2</td>
                            <td>55900</td>
                            <td>111800</td>
                            <td>0</td>
                            <td>19</td>
                            <td>111800</td>
                        </tr> -->
                    </tbody>
                </table>

            </fieldset>
            <br>
            <!-- TOTALES -->
            <fieldset>
                <legend>Totales</legend>
                <div class="formularioTotales">
                    <div class="totales">
                        <label for="valorSinIVA" class="form-label">Valor antes de IVA</label>
                        <input type="number" name="valorSinIVA" id="valorSinIVA" class="form-control" readonly>
                    </div>
                    <div class="totales">
                        <label for="ivaFactura" class="form-label">IVA</label>
                        <input type="number" name="ivaFactura" id="ivaFactura" class="form-control" readonly>
                    </div>
                    <div class="totales">
                        <label for="valor_netoFactura" class="form-label">Valor Neto</label>
                        <input type="number" name="valor_netoFactura" id="valor_netoFactura" class="form-control" readonly>
                    </div>

                    <input type="hidden" name="detalles" id="detalles">

                    <div class="btnFacturar">
                        <input type="submit" value="Facturar" class="btn btn-success">
                    </div>

                    <div class="btnAnular">
                        <button class="btn btn-warning" type="reset">Anular</button>
                    </div>
                </div>
            </fieldset>

        </form>
    </div>
</div>

<script>
    var detalleProducto = [];

    function obtenetCliente(document_id) {
        var cliente_documento = document_id
        var fecha = new Date().toISOString().slice(0, 10);
        $.post("vista/html/includes/getCliente.php", {
            data: cliente_documento
        }, function(data) {
            response = JSON.parse(data)
            $("#form-cliente [name='documento']").val(response[0].documento);
            $("#form-cliente [name='nombre']").val(response[0].nombre);
            $("#form-cliente [name='direccion']").val(response[0].direccion);
            $("#form-cliente [name='telefono']").val(response[0].telefono);
            $("#form-cliente [name='email']").val(response[0].email);
            $("#form-cliente [name='fecha']").val(fecha);

        });
    }

    function obtenerProducto(codigo) {
        var producto = codigo
        $.post("vista/html/includes/getProducto.php", {
            data: producto
        }, function(data) {
            response = JSON.parse(data)
            $("#form-cliente [name='codigo']").val(response[0].producto_codigo);
            $("#form-cliente [name='producto']").val(response[0].nombre);
            $("#form-cliente [name='cantidad']").val(1);
            $("#form-cliente [name='valor_initario']").val(response[0].costo);
            $("#form-cliente [name='subtotal']").val(response[0].costo);
            $("#form-cliente [name='valor_total']").val(response[0].costo);
        });
    }

    function calcularValorPorCantidad(cantidad) {
        var valorProducto = cantidad
        var valorUnidad = document.getElementById('valor_initario').value;
        var valor = valorUnidad * valorProducto;
        document.getElementById("subtotal").value = valor
        document.getElementById("valor_total").value = valor

    }

    function calcularValorPorDescuento(descuento) {
        var subtotal = document.getElementById('subtotal').value;
        var valorDescuento = subtotal * descuento / 100;
        var total = subtotal - valorDescuento;
        document.getElementById('valor_total').value = total

    }

    function agregarProductoADetalle() {
        var sumaSubtotales = 0;
        var valorAntesDeIVA = 0;
        var iva = 0;

        var codigo = document.getElementById('codigo').value;
        var producto = document.getElementById('producto').value;
        var cantidad = document.getElementById('cantidad').value;
        var valor_initario = document.getElementById('valor_initario').value;
        var subtotal = document.getElementById('subtotal').value;
        var descuento = document.getElementById('descuento').value;
        var iva = 19;
        var valor_total = document.getElementById('valor_total').value;

        var nProducto = [
            codigo,
            producto,
            cantidad,
            valor_initario,
            subtotal,
            descuento,
            iva,
            valor_total
        ];

        detalleProducto.push(nProducto);

        var result = '<table class="table table-sm table-bordered grid-table" id="detalleProductos">';
        result += '<thead><tr><th scope="col">Item</th><th scope="col">Codigo</th><th scope="col">Producto</th><th scope="col">Cantidad</th><th scope="col">Valor Unidad</th><th scope="col">Subtotal</th><th scope="col">Desc %</th><th scope="col">IVA %</th><th scope="col">Valor Total</th></tr></thead><tbody class="table-group-divider" id="detalleProductosBody">';
        for (var i = 0; i < detalleProducto.length; i++) {
            result += '<tr><td scope="row">' + (i + 1) + '</td>';
            for (var j = 0; j < detalleProducto[i].length; j++) {
                result += "<td>" + detalleProducto[i][j] + "</td>";
            }
            sumaSubtotales += parseInt(detalleProducto[i][3]);
            result += "</tr>";
        }
        result += "</tbody>";

        document.getElementById("valor_netoFactura").value = sumaSubtotales;

        iva = sumaSubtotales * 19 / 100;
        valorAntesDeIVA = sumaSubtotales - iva;

        document.getElementById("detalleProductos").innerHTML = result;
        document.getElementById("valorSinIVA").value = valorAntesDeIVA;
        document.getElementById("ivaFactura").value = iva;

        document.getElementById("detalles").value = JSON.stringify(detalleProducto);
    }
</script>