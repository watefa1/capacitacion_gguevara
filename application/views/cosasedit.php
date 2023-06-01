<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
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
			<label for="nombre">Cosa:</label>
			<input type="text" id="nombre" name="cosa" value="<?php echo $cosa->cosa; ?>"><br>
			<label for="cantidad">Cantidad:</label>
    		<input type="text" id="cantidad" name="cant" value="<?php echo $cosa->cant; ?>"><br>
			<?php foreach ($tags as $tag): ?>
				<input type="checkbox" name="etiquetas[]" value="<?php echo $tag->id; ?>" <?php if (in_array($tag->id, $selectedTags)) echo "checked"; ?>><?php echo $tag->tag; ?><br>
			<?php endforeach; ?>
		</div>
		<input type="submit" value="Guardar">
	</form>
	<button>
  		<a href="/cosas">Volver</a>
	</button>
</body>
</html>
