<?php defined('BASEPATH') OR exit('No direct script access allowed');

if (isset($_GET['alert']) && $_GET['alert'] == 1): ?>
    <div id="error-modal">
        <p>Debes iniciar sesión para acceder a las demás páginas.</p>	
    </div>
    <style>
        #error-modal {
            background: #f5f5f5;
            color:  #4ac4a9;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            padding: 20px;
            text-align: center;
        }

        #error-modal p {
            width: 200px;
            border: 1px solid  #4ac4a9;
            padding: 1px;
			margin-bottom: 20px;
            top: 1;
            left: 1;
			border: 2px solid;
		  }
    </style>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var errorModal = document.getElementById("error-modal");

            function closeModal() {
                errorModal.style.display = "none";
            }
            setTimeout(closeModal, 5000);
        });
    </script>
<?php endif; ?>
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

        <?php if (isset($error)): ?>
            <p><?php echo $error; ?></p>
        <?php endif; ?>
    </center>
</body>
</html>
