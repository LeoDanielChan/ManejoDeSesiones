<?php

include "../config.php";

$nombre = $_POST['nombre'];
$email = $_POST['email'];
$apellido_pa = $_POST['apellido_pa'];
$apellido_ma = $_POST['apellido_ma'];
$username = $_POST['username'];
$password = $_POST['password'];

// $nombre = $conexion->real_escape_string($nombre);
// $email = $conexion->real_escape_string($email);
// $apellido_pa = $conexion->real_escape_string($apellido_pa);
// $apellido_pa = $conexion->real_escape_string($apellido_ma);
// $username = $conexion->real_escape_string($username);
// $password = $conexion->real_escape_string($password);


$consulta = "SELECT * FROM usuarios WHERE username = '$username'";
$resultado = $conexion->query($consulta);
$ala = password_hash($password,PASSWORD_DEFAULT);

header('Content-Type: application/json');

if ($resultado->num_rows > 0) {
    echo json_encode(['success' => false, 'message' => 'Ya existe un registro con ese nombre de usuario. Por favor, elige otro nombre.']);
} else {
    
    $sql = "INSERT INTO usuarios (nombre, apellido_paterno, apellido_materno, correo, username, contraseña) VALUES ('$nombre', '$apellido_pa', '$apellido_ma','$email', '$username', '$ala')";

    if ($conexion->query($sql) === TRUE) {
        echo json_encode(['success' => true, 'message' => '1']);
    } else {
        echo json_encode(['success' => false, 'message' => 'Error al registrar en la base de datos: ' . $conexion->error]);
    }
}

$conexion->close();
