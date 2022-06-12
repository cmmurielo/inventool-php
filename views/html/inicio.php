<?php
$mysqli = include_once "db.php";
$resultado = $mysqli->query("SELECT * FROM usuarios");
$rows = $resultado->fetch_all(MYSQLI_ASSOC);

foreach ($rows as $row) { ?>
    <p><?php echo $row['usuario']; ?></p>
    <p><?php echo $row['contrasena']; ?></p>
    <p><?php echo $row['nombre']; ?></p>
    <p><?php echo $row['apellido']; ?></p>
    <p><?php echo $row['documento']; ?></p>
<?php
}
?>