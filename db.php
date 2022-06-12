<?php
$mysqli = new mysqli('localhost', 'admin', 'admin', 'inventool');
if ($mysqli->connect_errno) {
   echo "Fallo la conexión a MySQL: " . $mysqli->connect_errno;
}
return $mysqli;
