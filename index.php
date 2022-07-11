<?php
session_start();



if (isset($_SESSION['usuario'])) {
    require_once 'vista/html/plantilla.php';
} else {
    header('Location: login.php');
}
