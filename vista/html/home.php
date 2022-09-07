<?php
include_once($_SERVER['DOCUMENT_ROOT'] . '/inventool-php/dirs.php');
$mysqli = include(ROOT_PATH . "db.php");

$count = $mysqli->query("SELECT count(producto_codigo) as numeroProductos from productos");
$countRows = $count->fetch_all(MYSQLI_ASSOC);

$productos = $mysqli->query("SELECT costo, saldoBodega FROM productos");
$productosRows = $productos->fetch_all(MYSQLI_ASSOC);

$totalPiezas = 0;
$totalValorInventario = (float)0;

foreach ($productosRows as $productoRow) {
    $totalPiezas += $productoRow['saldoBodega'];
    $totalValorInventario += $productoRow['costo'] * $productoRow['saldoBodega'];
}

?>

<head>
    <link rel="stylesheet" href="vista/css/main.css">
    <link rel="stylesheet" href="vista/css/home.css">

</head>

<div class="home">

    <div class="productos">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Productos en invetario</h5>
                <?php echo '<p class="card-text numeros">' . $countRows[0]['numeroProductos'] . '</p>' ?>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Total de unidades en inventario</h5>
                <?php echo '<p class="card-text numeros">' . $totalPiezas . '</p>' ?>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Total valor inventario</h5>
                <?php echo '<p class="card-text"> $ ' . $totalValorInventario . '</p>' ?>
            </div>
        </div>
    </div>

    <div class="ventas">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Ventas Dia</h5>
                <?php echo '<p class="card-text"> //TODO </p>' ?>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Ventas Dia</h5>
                <?php echo '<p class="card-text"> //TODO </p>' ?>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Ventas Dia</h5>
                <?php echo '<p class="card-text"> //TODO </p>' ?>
            </div>
        </div>


    </div>

</div>