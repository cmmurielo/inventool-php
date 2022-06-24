<head>
    <link rel="stylesheet" href="views/css/listaClientes.css" />
</head>

<?php
$mysqli = include_once "db.php";
$resultado = $mysqli->query("SELECT * FROM clientes");
$rows = $resultado->fetch_all(MYSQLI_ASSOC);
?>

<div class="contenido-listaClientes">
    <div class="titulo">
        <h1>Gestion Clientes</h1>
    </div>

    <div class="buscar">
        <p>
            Buscar cliente:
            <span><input type="text" name="buscar" placeholder="Documento, Nombre..." /></span>
        </p>
        <button class="btn btn-success" onclick=" location.href='index.php?accion=agregarCliente'">
            Agregar Cliente
        </button>
    </div>
    <table class=" tabla-clientes">
        <tr>
            <th>Documento</th>
            <th>T Documento</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Teléfono</th>
            <th>Email</th>
            <th>Ciudad</th>
            <th>Dirección</th>
            <th colspan="2">Opciones</th>
        </tr>

        <?php
        foreach ($rows as $row) {
        ?>
            <tr>
                <td> <?php echo $row['cliente_documento']; ?></td>
                <td> <?php echo $row['tipoDocumento']; ?></td>
                <td> <?php echo $row['nombre']; ?></td>
                <td> <?php echo $row['apellido']; ?></td>
                <td> <?php echo $row['telefono']; ?></td>
                <td> <?php echo $row['email']; ?></td>
                <td> <?php echo $row['municipio_id']; ?></td>
                <td> <?php echo $row['direccion']; ?></td>
                <td><button class="btn btn-primary"><i class="bi bi-pencil"></i></button></td>
                <td><button class="btn btn-danger"><i class="bi bi-trash"></i></button></td>
            </tr>
        <?php } ?>
    </table>

</div>