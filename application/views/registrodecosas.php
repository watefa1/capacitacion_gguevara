<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<title>Registro de cosas</title>
</head>
<body>
<div>
	<h1>Alta de Cosas</h1>
	</div>
	<form action="<?php echo base_url(); ?>registrodecosas/save" method="POST">
	<label for="nombre">    </label>
	<input type="text" id="nombre" name="cosa" placeholder="Nombre de la cosa"><br>
	<label for="cantidad">    </label>
    <input type="text" id="cantidad" name="cant" placeholder="Cantidad"><br>
	<input type="submit" value="Guardar">
	</form>
	<button>
  		<a href="https://capacitacion-gguevara.alephoo.com/cosas">Volver</a>
	</button>
</body>
</html>
