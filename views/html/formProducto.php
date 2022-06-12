<div class="contenido">
    <div class="titulo">
        <h1>Agregar producto</h1>
    </div>
    <!-- FORMULARIO -->
    <form class="grid-form">
        <label for="codigo" class="label1">Codigo: </label>
        <input type="number" name="codigo" id="codigo" class="input1" disabled />

        <label for="nombre" class="label2">Nombre: </label>
        <input type="text" name="nombre" id="nombre" class="input2" />

        <label for="descripcion" class="label1">Descripcion: </label>
        <textarea name="descripcion" id="descripcion" class="inputFull" placeholder="Descripcion del producto..."></textarea>

        <label for="costo" class="label1">Costo: </label>
        <input type="number" name="costo" id="costo" class="input1" min="0" value="0" />

        <label for="saldoBodega" class="label2">Saldo en bodega: </label>
        <input type="number" name="saldoBodega" id="saldoBodega" class="input2" min="0" value="0" />

        <label for="cantMin" class="label1">Cantidad Minima: </label>
        <input type="number" name="cantMin" id="cantMin" class="input1" min="0" value="0" />

        <label for="cantMax" class="label2">Cantidad Maxima: </label>
        <input type="number" name="cantMax" id="cantMax" class="input2" min="1" value="100" />

        <label for="imagen" class="label1">Imagen: </label>
        <input type="file" name="imagen" id="imagen" class="input1" accept="image/png, image/jpeg" />

        <label for="categoria" class="label2">Categoria: </label>
        <select name="categoria" id="categotia" class="input2">
            <option value="1">Categoria 1</option>
            <option value="2">Categoria 1</option>
            <option value="3">Categoria 1</option>
        </select>

        <input type="submit" value="Guardar" class="input2" />
    </form>
</div>