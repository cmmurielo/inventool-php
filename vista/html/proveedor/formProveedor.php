<head>
    <link rel="stylesheet" href="vista/css/proveedor/formProveedor.css" />
</head>
<div class="contenido-formProveedor">
    <div class="titulo">
        <h1>Gestion Proveedores</h1>
    </div>

    <div class="botonera">

        <button class="btn btn-primary" onclick="window.location.href = 'index.php?accion=proveedores'">
            Lista de proveedores
        </button>
    </div>

    <form action="vista/html/includes/registrarProveedor.php" method="POST" class="grid-form">

        <label for="nombre" class="form-label label1">Razon Solcial / Nombre: *
        </label>
        <input type="text" name="nombre" class="form-control inputFull" required />

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
        <input type="number" name="documento" class="form-control input2" required />


        <label for="tipoPersona" class="form-label">Tipo persona:</label>
        <select name="tipoPersona" class="form-select">
            <option value="NATURAL">NATURAL</option>
            <option value="JURIDICA">JURÍDICA</option>
        </select>

        <label for="ciudad" class="form-label label2">Ciudad: </label>
        <input type="text" name="ciudad" class="form-control input2" />

        <label for="direccion" class="form-label label1">Dirección: </label>
        <input type="text" name="direccion" class="form-control inputFull" />

        <label for="telefono" class="form-label label1">Teléfono: *</label>
        <input type="text" name="telefono" class="form-control input1" required />

        <label for="email" class="form-label label2">Email: </label>
        <input type="text" name="email" id="email" class="form-control input2" />


        <button type="submit" class="btn btn-success input2">Guardar</button>
    </form>
</div>