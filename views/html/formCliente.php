<div class="contenido">
    <div class="titulo">
        <h1>Gestion Clientes</h1>
    </div>
    <div class="botones">
        <button class="" onclick="window.location.href = '/listaClientes.html'">
            Lista de clientes
        </button>
        <button class="">Otra...</button>
    </div>

    <div class="buscar">
        <p>
            Buscar cliente:
            <span><input type="text" name="buscar" placeholder="Documento, Nombre..." /></span>
        </p>
    </div>

    <form class="grid-form">
        <label for="razonSocial" class="label1">Razon Solcial / Nombre: *
        </label>
        <input type="text" name="razonSocial" class="inputFull" required />

        <label for="documento" class="label1">Documento *: </label>
        <input type="number" name="documento" class="input1" required />

        <label for="tipoDocumento" class="label2">Tipo documento:</label>
        <select name="tipoDocumento" class="input2">
            <option value="cc">CC</option>
            <option value="nit">NIT</option>
            <option value="ce">CE</option>
        </select>

        <label for="tipoPersona" class="label1">Tipo persona:</label>
        <select name="tipoPersona" class="inputFull">
            <option value="natural">Natural</option>
            <option value="juridica">Juridica</option>
        </select>

        <label for="direccion" class="label1">Dirección: </label>
        <input type="text" name="direccion" class="inputFull" />

        <label for="departamento" class="label1">Departamento</label>
        <select name="departamento" class="input1">
            <option value="risaralda">Risaralda</option>
            <option value="caldas">Caldas</option>
            <option value="otros">Otros...</option>
        </select>

        <label for="ciudad" class="label2">Ciudad:</label>
        <select name="ciudad" class="input2">
            <option value="pereira">Pereira</option>
            <option value="manizales">Manizales</option>
            <option value="otros">Otros...</option>
        </select>

        <label for="telefono" class="label1">Telefono: *
        </label>
        <input type="text" name="telefono" class="input1" required />

        <label for="email" class="label2">Email: </label>
        <input type="email" name="email" id="email" class="input2" />

        <label for="rigemenFiscal" class="label1">Regimen fiscal:</label>
        <select name="rigemenFiscal" class="inputFull">
            <option value="otros">Otros...</option>
        </select>

        <input type="submit" value="Guardar" class="input2" />
    </form>
</div>