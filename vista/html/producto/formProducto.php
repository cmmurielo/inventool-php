<?php

include_once($_SERVER['DOCUMENT_ROOT'] . '/inventool-php/dirs.php');
$mysqli = include(ROOT_PATH . "db.php");

$resultadoCategoria = $mysqli->query("SELECT * FROM categorias");
$rowsCategoria = $resultadoCategoria->fetch_all(MYSQLI_ASSOC);

$resultadoProveedor = $mysqli->query("SELECT * FROM proveedores");
$rowsProveedor = $resultadoProveedor->fetch_all(MYSQLI_ASSOC);
?>

<head>
    <link rel="stylesheet" href="vista/css/producto/formProducto.css" />
</head>
<div class="contenido-formProducto">
    <div class="titulo">
        <h1>Gestion Productos</h1>
    </div>

    <div class="botonera">

        <button class="btn btn-primary" onclick="window.location.href = 'index.php?accion=productos'">
            Lista de productos
        </button>
    </div>

    <form action="vista/html/includes/registrarProducto.php" method="POST" class="grid-form" enctype="multipart/form-data">

        <label for="producto_codigo" class="form-label label1">Codigo: *</label>
        <input type="number" id="producto_codigo" name="producto_codigo" class="form-control input1" required />

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

        <label for="categoria_id" class="form-label label2">Tipo nombre:</label>
        <select name="categoria_id" id="categoria_id" class="form-select input2">
            <option value="">Selecciona la categoria</option>
            <?php
            foreach ($rowsCategoria as $row) {
                echo '<option value="' . $row['categoria_id'] . '">' . $row['nombre'] . '</option>';
            }
            ?>

        </select>

        <label for="imagen" class="form-label label1">imagen: </label>
        <input type="file" id="" name="imagen" id="imagen" class="form-control inputFull" />

        <button type="submit" class="btn btn-success input2">Guardar</button>
    </form>
</div>