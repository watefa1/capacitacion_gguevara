<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <link href="application/css/Style.css" rel="stylesheet" type="text/css">
    <meta charset="utf-8">
    <title>Bienvenido</title>
</head>
<body class="background">
    <center>
        <h1>¡Bienvenido!</h1>
        <form action="login" method="post">
            <label for="username"></label>
            <input type="text" class="campos" placeholder="usuario" id="username" name="username" required>

            <label for="password"></label>
            <input type="password" class="campos" placeholder="contraseña" id="password" name="password" required>
		<br>
            <button type="submit" class="my-button colorpalabrasboton" style="margin-top: 3px;">Iniciar sesión</button>
			
					<button class="my-button" style="margin-top: 3px;">
						<a href="registro" class="colorpalabrasboton">Registrarse</a>
					</button>
        </form>
    </center>
</body>
</html>
