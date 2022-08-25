<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Practica SENA</title>
    <link rel="stylesheet" href="vista/css/login.css" />
</head>

<body>
    <div class="contenedor">
        <div class="titulo">
            <h1>INVENTOOL</h1>
        </div>
        <div class="bienvenida">
            <img src="vista/images/logook.png" height="80px" alt="" srcset="">
        </div>
        <form action="controlador/login.php" class="formulario" autocomplete="off" method="POST">
            <input type="text" name="username" placeholder="Nombre de usuario..." required />
            <input type="password" name="password" placeholder="Contraseña..." autocomplete="off" required />
            <button type="submit">Iniciar</button>
        </form>
        <div class="footer-login">
            <p><a href="">¿Olvidaste la contraseña?</a></p>
        </div>
    </div>
</body>

</html>