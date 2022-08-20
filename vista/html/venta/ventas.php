<head>
    <link rel="stylesheet" href="vista/css/ventas/ventas.css" />
</head>

<div class="contenido-ventas">

    <div class="formulario">
        <div class="titulo-factura">
            <h1>FACTURA</h1>
        </div>
        <form action="post">
            <!-- CLIENTE -->
            <fieldset>
                <legend>Cliente</legend>
                <div class="formularioCliente">
                    <div>
                        <label for="documento" class="form-label">Documento: </label>
                        <input type="text" name="documento" id="documento" class="form-control" value="1053812639">
                    </div>
                    <div>
                        <label for="fecha" class="form-label">Fecha: </label>
                        <input type="date" name="fecha" id="fecha" class="form-control" value="2022-08-19">
                    </div>
                    <div class="inputFull">
                        <label for="nombre" class="form-label">Nombre/Razon Social: </label>
                        <input type="text" name="nombre" id="nombre" class="form-control" value="CARLOS MARIO" readonly>
                    </div>
                    <div class="inputFull">
                        <label for="direccion" class="form-label">Direccion: </label>
                        <input type="text" name="direccion" id="direccion" class="form-control" value="MZ D CS 8, ALTOS DE LA SOLEDAD" readonly>
                    </div>
                    <div>
                        <label for="telefono" class="form-label">Telefono: </label>
                        <input type="text" name="telefono" id="telefono" class="form-control" value="3117766871" readonly>
                    </div>
                    <div>
                        <label for="email" class="form-label">Email: </label>
                        <input type="mail" name="email" id="email" class="form-control" value="cmmurielo@gmail.com" readonly>
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
                        <input type="number" name="codigo" id="codigo" class="form-control">
                    </div>
                    <div>
                        <label for="producto" class="form-label">Producto</label>
                        <input type="text" name="producto" id="producto" class="form-control">
                    </div>
                    <div>
                        <label for="cantidad" class="form-label">Cantidad</label>
                        <input type="number" name="cantidad" id="cantidad" value="1" class="form-control">
                    </div>
                    <div>
                        <label for="valor_initario" class="form-label">Valor Unidad</label>
                        <input type="number" name="valor_initario" id="valor_initario" class="form-control">
                    </div>
                    <div>
                        <label for="subtotal" class="form-label">Subtotal</label>
                        <input type="number" name="subtotal" id="subtotal" class="form-control">
                    </div>
                    <div>
                        <label for="descuento" class="form-label">Desc %</label>
                        <input type="number" name="descuento" id="descuento" class="form-control" value="0">
                    </div>
                    <div>
                        <label for="valor_total" class="form-label">Valor Total</label>
                        <input type="number" name="valor_total" id="valor_total" class="form-control" value="19">
                    </div>
                    <div class="agregarDetalle">
                        <input type="button" value="Agregar" class="btn btn-success">
                    </div>
                </div>
            </fieldset>
            <br>
            <!-- DETALLE PRODUCTOS -->
            <fieldset>
                <legend>Detalle de productos</legend>
                <table class="table table-sm table-bordered grid-table">
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
                    <tbody class="table-group-divider">
                        <tr>
                            <td scope="row">1</td>
                            <td>268413</td>
                            <td>Set Puntas Touch Case 18 Piezas Ref DW2174</td>
                            <td>2</td>
                            <td>55900</td>
                            <td>111800</td>
                            <td>0</td>
                            <td>19</td>
                            <td>111800</td>
                        </tr>
                        <tr>
                            <td scope="row">2</td>
                            <td>543292</td>
                            <td>SIERRA CIRCULAR 7-1/4-PULG 20V SIN BATERíA DEWALT</td>
                            <td>1</td>
                            <td>989000</td>
                            <td>989000</td>
                            <td>0</td>
                            <td>19</td>
                            <td>989000</td>
                        </tr>
                    </tbody>
                </table>

            </fieldset>
            <br>
            <!-- TOTALES -->
            <fieldset>
                <legend>Totales</legend>
                <div class="formularioTotales">
                    <div class="totales">
                        <label for="subtotal" class="form-label">Subtotal</label>
                        <input type="number" name="subtotal" id="subtotal" class="form-control" value="1100800">
                    </div>
                    <div class="totales">
                        <label for="descuento" class="form-label">Descuento</label>
                        <input type="number" name="descuento" id="descuento" class="form-control" value="0">
                    </div>
                    <div class="totales">
                        <label for="iva" class="form-label">Valor antes de IVA</label>
                        <input type="number" name="iva" id="iva" class="form-control" value="891648">
                    </div>
                    <div class="totales">
                        <label for="iva" class="form-label">IVA</label>
                        <input type="number" name="iva" id="iva" class="form-control" value="209152">
                    </div>
                    <div class="totales">
                        <label for="valor_neto" class="form-label">Valor Neto</label>
                        <input type="number" name="valor_neto" id="valor_neto" class="form-control" value="1100800">
                    </div>
                    <div class="btnFacturar">
                        <input type="button" value="Facturar" class="btn btn-success">
                    </div>

                    <div class="btnAnular">
                        <button class="btn btn-warning">Anular</button>
                    </div>
                </div>
            </fieldset>



        </form>
    </div>
</div>