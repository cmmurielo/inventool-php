<div class="inventool">

    <?php
    include("views/html/topbar.php");
    include("views/html/menubar.php");
    ?>

    <!-- CONTENIDO DE LA PAGINA -->
    <div class="contenido">
        <?php
        if (isset($_GET["accion"])) {
            if ($_GET["accion"] == "clientes") {
                require_once 'views/html/listaClientes.php';
            }
            if ($_GET["accion"] == "productos") {
                require_once 'views/html/listaProductos.php';
            }
            if ($_GET["accion"] == "proveedores") {
                require_once 'views/html/listaProveedores.php';
            }
            if ($_GET["accion"] == "ventas") {
                require_once 'views/html/ventas.php';
            }
        } else {
            require_once 'views/html/inicio.php';
        }
        ?>
    </div>

    <?php
    include("views/html/footbar.php");
    ?>

</div>