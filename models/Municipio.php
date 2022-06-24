<?php

$mysqli = include_once "db.php";

    function listarDepartamentos() {
        $departamentos = $this->mysqli->query("SELECT * FROM departamentos")->fetch_all(MYSQLI_ASSOC);
        return $departamentos;
    }
    
    function listarMunicipios($departamento_id) {
        $municipios = $this->mysqli->query("SELECT * FROM municipios WHERE departamento_id = $departamento_id")->fetch_all(MYSQLI_ASSOC);
        return $municipios;
    }
