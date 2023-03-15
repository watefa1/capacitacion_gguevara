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
	<form action="form.php" method="post">
	<p>Nombre de la cosa: <input type="text" name="nombrecosa" /></p>
	<p>Cantidad: <input type="text" name="cantidadcosa" /></p>
	<button>Registrar</button>
	</form>
	<button>
  		<a href="https://capacitacion-gguevara.alephoo.com/cosas">Volver</a>
	</button>
</body>
</html>
