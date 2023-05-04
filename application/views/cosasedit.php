<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<title>Modificación de cosas</title>
</head>
<body>
<div>
	<h1>Edición de Cosas</h1>
	</div>
	<form action="<?php echo base_url(); ?>CosasEdit/update/<?php echo $id; ?>" method="POST">
	<div>
	<label for="nombre">    </label>
	<input type="text" id="nombre" name="cosa" value="<?php echo $cosa;?>"><br>
	<label for="cantidad">    </label>
    <input type="text" id="cantidad" name="cant" value="<?php echo $cant;?>"><br>
	<input type="checkbox" id="check" name="check" value="1"></div>
	<input type="submit" value="Guardar">
	</form>
	<button>
  		<a href="/cosas">Volver</a>
	</button>
</body>
</html>
