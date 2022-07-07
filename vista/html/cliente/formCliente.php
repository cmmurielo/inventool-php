<head>
    <link rel="stylesheet" href="vista/css/cliente/formCliente.css" />
</head>
<div class="contenido-formCliente">
    <div class="titulo">
        <h1>Gestion Clientes</h1>
    </div>

    <div class="buscar">
        <p>
            Buscar cliente:
            <span><input type="text" name="buscar" placeholder="Documento, Nombre..." /></span>
        </p>
        <button class="btn btn-primary" onclick="window.location.href = 'index.php?accion=clientes'">
            Lista de clientes
        </button>
    </div>

    <form action="vista/html/includes/registrarCliente.php" method="POST" class="grid-form">
        <label for="nombre" class="label1">Razon Solcial / Nombre: *
        </label>
        <input type="text" name="nombre" class="input1" required />

        <label for="apellido" class="label2">Apellido
        </label>
        <input type="text" name="apellido" class="input2" required />

        <label for="documento" class="label1">Documento *: </label>
        <input type="number" name="documento" class="input1" required />

        <label for="tipoDocumento" class="label2">Tipo documento:</label>
        <select name="tipoDocumento" class="input2">
            <option value="CC">CC</option>
            <option value="NIT">NIT</option>
            <option value="CE">CE</option>
            <option value="PAP">PAP</option>
            <option value="NIP">NIP</option>
            <option value="TI">TI</option>
        </select>

        <label for="tipoPersona" class="label1">Tipo persona:</label>
        <select name="tipoPersona" class="inputFull">
            <option value="NATURAL">NATURAL</option>
            <option value="JURIDICA">JURÍDICA</option>
        </select>

        <label for="ciudad" class="label1">Ciudad: </label>
        <input type="text" name="ciudad" class="inputFull" />

        <label for="direccion" class="label1">Dirección: </label>
        <input type="text" name="direccion" class="inputFull" />

        <label for="telefono" class="label1">Telefono: *
        </label>
        <input type="text" name="telefono" class="input1" required />

        <label for="email" class="label2">Email: </label>
        <input type="text" name="email" id="email" class="input2" />

        <button type="submit" class="btn btn-success input2">Guardar</button>
    </form>
</div>