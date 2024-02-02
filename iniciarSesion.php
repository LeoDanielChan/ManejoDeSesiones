<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/css/style.css">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <title>Iniciar sesión</title>
</head>
<body>
    <form action="" method="POST" id="form">
        <div class="form">
            <h1>Inicia sesión</h1>

            <div class="grupo">
                <input type="text" name="username" id="username" required> <span class="barra"></span>
                <label for="">Nombre de usuario</label>
            </div>

            <div class="grupo">
                <input type="password" name="password" id="password" required> <span class="barra"></span>
                <label for="">Contraseña</label>
            </div>

            <button type="submit">Iniciar</button>

        </div>

        <div class="warnings">
            <p>¿No tienes una cuenta? <a href="registro.php">Crea tu cuenta</a></p>
        </div>

        <p class="warnings" id="warnings"></p>

    </form>

    <script src="./assets/js/validarInicio.js"></script>
</body>
</html>