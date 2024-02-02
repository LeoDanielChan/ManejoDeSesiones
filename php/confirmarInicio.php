<?php

include "../config.php";

$username = $_POST['username'];
$password = $_POST['password'];

// $username = $conexion->real_escape_string($username);
// $password = $conexion->real_escape_string($password);

$vcontraseña = "SELECT * FROM usuarios WHERE username = '$username'";
$resul = $conexion->query($vcontraseña);

header('Content-Type: application/json');

if ($resul->num_rows > 0){
    $data = $resul->fetch_assoc();
    $campos = $data;
    $vamos = $campos['contraseña'];


    if (password_verify($password,$vamos)) {

        header('Content-Type: application/json');
        session_start();
        $array = array(
            'nombre' => $campos['nombre'],
            'apellido_pa' => $campos['apellido_paterno'],
            'apellido_ma' => $campos['apellido_materno'],
            'correo' => $campos['correo'],
            'username' => $campos['username'],
            'contraseña' => $password
        );
        $_SESSION['datos'] = $array;

        echo json_encode(['success' => true, 'message' => 'Bienvenido', 'identificar' => '1']);


    } else {
        echo json_encode(['success' => false, 'message' => 'Usuario o contraseña incorrecta' . $conexion->error]);

    }

} else {
    echo json_encode(['success' => false, 'message' => 'Usuario o contraseña incorrecta']);

}


$conexion->close();

