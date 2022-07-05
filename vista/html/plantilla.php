<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="vista/css/main.css">
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
    <script src="vista/js/jquery-3.6.0.min.js"></script>
    <title>Inventool</title>
</head>

<body>
    <div class="inventool">
        <div class="logo">
            <!-- Logo -->
            <img src="vista/images/logo.png" alt="logo" height="100%">
        </div>

        <div class="topbar">
            <!-- topbar -->

            Aqui va la barra superior

        </div>

        <div class="menubar">
            <!-- menubar -->
            <ul>
                <li><a href="index.php"><i class="bi bi-house"></i> Pagina principal</a></li>
                <li><a href="index.php?accion=clientes"><i class=" bi bi-people-fill"></i> Clientes</a></li>
                <li><a href="#"><i class="bi bi-building"></i> Proveedores</a></li>
                <li><a href="#"><i class="bi bi-tools"></i> Productos</a></li>
                <li><a href="#"><i class="bi bi-cart3"></i> Ventas</a></li>
            </ul>

        </div>

        <div class="contenido">
            <!-- contenido -->
            <?php
            if (isset($_GET["accion"])) {
                if ($_GET["accion"] == "clientes") {
                    require_once 'vista/html/cliente/clientes.php';
                }
                if ($_GET["accion"] == "productos") {
                    require_once 'vista/html/productos.php';
                }
                if ($_GET["accion"] == "proveedores") {
                    require_once 'vista/html/proveedores.php';
                }
                if ($_GET["accion"] == "ventas") {
                    require_once 'vista/html/ventas.php';
                }
                if ($_GET["accion"] == "agregarCliente") {
                    require_once 'vista/html/cliente/formCliente.php';
                }
                if ($_GET["accion"] == "editarCliente") {
                    require_once 'vista/html/cliente/editarCliente.php';
                }
            } else {
                require_once 'vista/html/home.php';
            }
            ?>

        </div>

        <div class="footbar">
            <!-- footbar -->
            INVENTOOL SENA, CARLOS, GERMAN - 2022

        </div>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous"></script>
</body>

</html>