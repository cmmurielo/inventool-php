<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Practica SENA</title>
    <link rel="stylesheet" href="styles/main.css" />
    <link rel="stylesheet" href="styles/login.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;700&display=swap" rel="stylesheet" />
</head>

<body>
    <div class="contenedor">
        <div class="titulo">
            <h1>INVENTOOL</h1>
        </div>
        <div class="bienvenida">
            <h2>Tornillos D&D <a href="../index.php">inicio</a></h2>
        </div>
        <form class="formulario" autocomplete="off">
            <input type="text" name="username" placeholder="Nombre de usuario..." required />
            <input type="password" name="password" placeholder="Contraseña..." required />
            <input type="submit" value="Iniciar Sesion" />
        </form>
        <div class="footer-login">
            <p><a href="">¿Olvidaste la contraseña?</a></p>
        </div>
    </div>
</body>

</html>