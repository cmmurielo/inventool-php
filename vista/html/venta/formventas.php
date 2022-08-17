<head>
    <link rel="stylesheet" href="vista/css/ventas/formventas.css" />
</head>

<div class="contenido-formventas">
    <div class="titulo">
        <h1>Gestion Ventas</h1>
    </div>

    <div class="botonera">

        <button class="btn btn-primary" onclick="window.location.href = 'index.php?accion=ventas'">
            Lista de Ventas
        </button>
    </div>

    <form action="vista/html/includes/registrarProveedor.php" method="POST" class="grid-form">

        <label for="nombre" class="form-label label1">Factura Id / Numero: *
        </label>
        <input type="text" name="nombre" class="form-control inputFull" required />

        <label for="documento" class="form-label label2">Documento: * </label>
        <input type="number" name="documento" class="form-control input2" required />


        <label for="usuarios_usuario" class="form-label">usuarios_usuario:</label>
        <select name="usuarios_usuario" class="form-select">
            <option value="ADMIN">ADMINL</option>
            <option value="VENDEDOR">VENDEDOR</option>
            <option value="INVENTARIO">INVENTARIO</option>
        </select>

        <button type="submit" class="btn btn-success input2">Guardar</button>
    </form>
</div>