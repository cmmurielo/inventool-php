<head>
    <link rel="stylesheet" href="vista/css/cliente/formCliente.css" />
</head>
<div class="contenido-formCliente">
    <div class="titulo">
        <h1>Gestion Clientes</h1>
    </div>

    <div class="botonera">
        <button class="btn btn-primary" onclick="window.location.href = 'index.php?accion=clientes'">
            Lista de clientes
        </button>
    </div>

    <form action="vista/html/includes/registrarCliente.php" method="POST" class="grid-form">
        <label for="nombre" class="label1 form-label">Razon Solcial / Nombre: *
        </label>
        <input type="text" name="nombre" class="input1 form-control" required />

        <label for="apellido" class="label2 form-label">Apellido
        </label>
        <input type="text" name="apellido" class="input2 form-control" required />

        <label for="documento" class="label1 form-label">Documento *: </label>
        <input type="number" name="documento" class="input1 form-control" required />

        <label for="tipoDocumento" class="label2 form-label">Tipo documento:</label>
        <select name="tipoDocumento" class="input2 form-control">
            <option value="CC">CC</option>
            <option value="NIT">NIT</option>
            <option value="CE">CE</option>
            <option value="PAP">PAP</option>
            <option value="NIP">NIP</option>
            <option value="TI">TI</option>
        </select>

        <label for="tipoPersona" class="label1 form-label">Tipo persona:</label>
        <select name="tipoPersona" class="inputFull form-control">
            <option value="NATURAL">NATURAL</option>
            <option value="JURIDICA">JURÍDICA</option>
        </select>

        <label for="ciudad" class="label1 form-label">Ciudad: </label>
        <input type="text" name="ciudad" class="inputFull form-control" />

        <label for="direccion" class="label1 form-label">Dirección: </label>
        <input type="text" name="direccion" class="inputFull form-control" />

        <label for="telefono" class="label1 form-label">Telefono: *
        </label>
        <input type="text" name="telefono" class="input1 form-control" required />

        <label for="email" class="label2 form-label">Email: </label>
        <input type="text" name="email" id="email" class="input2 form-control" />

        <button type="submit" class="btn btn-success input2">Guardar</button>
    </form>
</div>