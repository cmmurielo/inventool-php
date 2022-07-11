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

            <?php
            include_once($_SERVER['DOCUMENT_ROOT'] . '/inventool-php/dirs.php');
            echo $_SESSION['nombre'] . ' ' . $_SESSION['apellido'];
            ?>
            <a href="vista/html/includes/logout.php" class="btn btn-secondary logout">Salir <i class=" bi bi-box-arrow-right"></i> </a>
        </div>

        <div class="menubar">
            <!-- menubar -->
            <ul>
                <?php
                echo '<li><a href="index.php"><i class="bi bi-house"></i> Pagina principal</a></li>';
                echo '<li><a href="index.php?accion=clientes"><i class=" bi bi-people-fill"></i> Clientes</a></li>';
                if ($_SESSION['perfil'] == 'ADMIN' or $_SESSION['perfil'] == 'INVENTARIO') {
                    echo '<li><a href="index.php?accion=proveedores"><i class=" bi bi-building"></i> Proveedores</a></li>';
                    echo '<li><a href="index.php?accion=productos"><i class="bi bi-tools"></i> Productos</a></li>';
                }
                echo '<li><a href="index.php?accion=ventas"><i class="bi bi-cart3"></i> Ventas</a></li>';

                if ($_SESSION['perfil'] == 'ADMIN') {
                    echo '<li><a href="index.php?accion=usuarios"><i class="bi bi-person-bounding-box"></i> Usuarios</a></li>';
                }
                ?>
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
                    if ($_SESSION['perfil'] == 'ADMIN' or $_SESSION['perfil'] == 'GERENTE') {
                        require_once 'vista/html/producto/productos.php';
                    } else {
                        require_once 'vista/html/home.php';
                    }
                }
                if ($_GET["accion"] == "proveedores") {
                    require_once 'vista/html/proveedor/proveedores.php';
                }
                if ($_GET["accion"] == "ventas") {
                    require_once 'vista/html/venta/ventas.php';
                }
                if ($_GET["accion"] == "usuarios") {
                    if ($_SESSION['perfil'] == 'ADMIN' or $_SESSION['perfil'] == 'GERENTE') {
                        require_once 'vista/html/usuario/usuarios.php';
                    } else {
                        require_once 'vista/html/home.php';
                    }
                }
                if ($_GET["accion"] == "agregarCliente") {
                    require_once 'vista/html/cliente/formCliente.php';
                }
                if ($_GET["accion"] == "agregarProveedor") {

                    if ($_SESSION['perfil'] == 'ADMIN' or $_SESSION['perfil'] == 'GERENTE') {
                        require_once 'vista/html/proveedor/formProveedor.php';
                    } else {
                        require_once 'vista/html/home.php';
                    }
                }
                if ($_GET["accion"] == "agregarProducto") {
                    if ($_SESSION['perfil'] == 'ADMIN' or $_SESSION['perfil'] == 'GERENTE' or $_SESSION['perfil'] == 'INVENTARIO') {
                        require_once 'vista/html/producto/formProducto.php';
                    } else {
                        require_once 'vista/html/home.php';
                    }
                }
                if ($_GET["accion"] == "agregarUsuario") {
                    if ($_SESSION['perfil'] == 'ADMIN' or $_SESSION['perfil'] == 'GERENTE') {
                        require_once 'vista/html/usuario/formUsuario.php';
                    } else {
                        require_once 'vista/html/home.php';
                    }
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