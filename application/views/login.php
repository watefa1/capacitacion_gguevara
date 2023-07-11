<?php if (isset($_GET['alert']) && $_GET['alert'] == 1): ?>
    <script>
        alert("Debes iniciar sesión para acceder a las demás páginas.");
    </script>
<?php endif;
date_default_timezone_set('America/Argentina/Buenos_Aires'); 
$hora = date('H'); 

if ($hora >= 6 && $hora < 12) {
    $saludo = 'Buenos días';
} elseif ($hora >= 12 && $hora < 18) {
    $saludo = 'Buenas tardes';
} else {
    $saludo = 'Buenas noches';
} ?><!DOCTYPE html>
<html lang="es">
<head>
<script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <link href="application/css/Style.css" rel="stylesheet" type="text/css">
    <meta charset="utf-8">
    <title>Bienvenido</title>
</head>
<body class="background">
    <center>
        <h1>¡<?php echo $saludo;?>!</h1>
        <form action="login" method="post">
            <label for="username"></label>
            <input type="text" class="campos" placeholder="usuario" id="username" name="username" required>
            <label for="password"></label>
            <input type="password" class="campos" placeholder="contraseña" id="password" name="password" required>
            <br>
            <button type="submit" class="my-button colorpalabrasboton" style="margin-top: 3px;">Iniciar sesión</button>
        </form>
		<button class="my-button colorpalabrasboton" style="margin-top: 3px;" id="register-btn">Registrarse</button>
        <br><a href='recuperar_contrasena'>Olvide Mi Contraseña</a>
        <?php if (isset($error)): ?>
            <p><?php echo $error; ?></p>
        <?php endif; ?>
    </center>

		<div id="register-modal" class="modal">
		    <div class="modal-content">
		        <span class="close">&times;</span>
		        <h2>Formulario de Registro</h2>
		        <form action="<?php echo site_url('login/register'); ?>" method="post">
		            <label for="username"></label>
		            <input type="text" class="campos" placeholder="usuario" id="register-username" name="username" required>
		            <label for="password"></label>
		            <input type="password" class="campos" placeholder="contraseña" id="register-password" name="password" required>
		            <br>
		            <button type="submit" class="my-button colorpalabrasboton" style="margin-top: 3px;">Registrarse</button>
		        </form>
		    </div>
		</div>


		<script>
$(document).ready(function() {
    var registerModal = document.getElementById("register-modal");
    var registerButton = document.getElementById("register-btn");
    var closeSpan = document.getElementsByClassName("close")[0];

    registerButton.onclick = function() {
        registerModal.style.display = "block";
    };

    closeSpan.onclick = function() {
        registerModal.style.display = "none";
    };

    window.onclick = function(event) {
        if (event.target == registerModal) {
            registerModal.style.display = "none";
        }
    };

    $("#register-modal form").submit(function(e) {
        e.preventDefault(); 

        $.ajax({
            url: "<?php echo site_url('login/register'); ?>",
            type: "POST",
            data: $(this).serialize(),
            dataType: "json",
            success: function(response) {
                if (response.success) {
                    alert("¡Registro exitoso!");
                    registerModal.style.display = "none";
					window.location.href = "<?php echo site_url('login'); ?>";
                } else {
                    alert("Hubo un error en el registro. Inténtalo de nuevo.");
                }
            },
            error: function() {
                alert("Hubo un error en el registro. Inténtalo de nuevo.");
            }
        });
    });
});
</script>

</body>
</html>
