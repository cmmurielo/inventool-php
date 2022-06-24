<?php

require '../../../db.php';

$departamento_id = $_POST['data'];
$municipios = $mysqli->query("SELECT municipio_id, municipio FROM municipios WHERE departamento_id = '$departamento_id' ORDER BY municipio ASC")->fetch_all(MYSQLI_ASSOC);

$html = "<option value='' selected disabled hidden>Elige el municipio</option>";

foreach ($municipios as $municipio) {
    $html .= "<option value='" . $municipio['municipio_id'] . "'>" . $municipio['municipio'] . "</option>";
}

echo $html;
