<?php

$host = 'localhost';
$dbname = 'iniciosesion';
$username = 'root';
$password = '';

$conexion = new mysqli($host, $username, $password, $dbname);
if ($conexion->connect_error) {
    die('Error de conexión a la base de datos: ' . $conexion->connect_error);
}
