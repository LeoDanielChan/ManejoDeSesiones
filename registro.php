<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/css/style.css">
    <title>Registrate</title>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>
<body>
    <form action="" method="post" id="form">
        <div class="form">
            <h1>Resgistrate</h1>

            <div class="grupo">
                <input type="text" name="nombre" id="name"> <span class="barra"></span>
                <label for="">Nombre</label>
            </div>

            <div class="grupo">
                <input type="text" name="apellido_pa" id="apellido_pa"> <span class="barra"></span>
                <label for="">Apellido Paterno</label>
            </div>

            <div class="grupo">
                <input type="text" name="apellido_ma" id="apellido_ma"> <span class="barra"></span>
                <label for="">Apellido Materno</label>
            </div>

            <div class="grupo">
                <input type="email" name="email" id="email"> <span class="barra"></span>
                <label for="">Correo eléctronico</label>
            </div>

            <div class="grupo">
                <input type="text" name="username" id="username"> <span class="barra"></span>
                <label for="">Nombre de usuario</label>
            </div>

            <div class="grupo">
                <input type="password" name="password" id="password"> <span class="barra"></span>
                <label for="">Contraseña</label>
            </div>

            <div class="grupo">
                <input type="password" name="password2" id="password2"> <span class="barra"></span>
                <label for="">Confirma tu contraseña</label>
            </div>

        
            <button type="submit">Registrate</button>

        </div>

        <p class="warnings" id="warnings"></p>
        
    </form>

    <script src="./assets/js/validarRegistro.js"></script>
</body>
</html>