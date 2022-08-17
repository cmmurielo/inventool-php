<?php
$id = $_POST['data'];

include_once($_SERVER['DOCUMENT_ROOT'] . '/inventool-php/dirs.php');
$mysqli = include(ROOT_PATH . "db.php");

$producto = $mysqli->query("SELECT
                            p.producto_codigo,
                            p.nombre,
                            p.descripcion,
                            p.costo,
                            p.saldoBodega,
                            p.cantidadMinima,
                            p.cantidadMaxima,
                            p.imagen,
                            p.categoria_id,
                            c.nombre AS categoriaNombre,
                            pv.documento AS proveedorDocumento,
                            pv.nombre AS proveedorNombre
                            FROM productos p
                            INNER JOIN categorias c ON c.categoria_id = p.categoria_id
                            INNER JOIN producto_proveedor pp ON pp.producto_codigo = p.producto_codigo
                            INNER JOIN proveedores pv ON pv.documento = pp.proveedor_documento
                            WHERE p.producto_codigo = '$id'")->fetch_all(MYSQLI_ASSOC);

echo json_encode($producto);
