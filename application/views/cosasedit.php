<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="es">
<head>
<link rel="icon" href="<?php echo base_url('application/image/logo.png'); ?>" type="image/x-icon">
<link href="/application/css/Style.css" rel="stylesheet" type="text/css">
	<meta charset="utf-8">
	<title>Modificación de cosas</title>
</head>
<?php $this->load->view('head'); ?>

<button class="my-button">
  		<a href="/cosas">Volver</a>
	</button>
<body class="background"> <center>
	<div>
	<h1>Modificación de cosas</h1>
	</div>
	<form action="<?php echo base_url(); ?>CosasEdit/update/<?php echo $id; ?>" method="POST">
	<div>
			<label for="nombre">Cosa:</label>
			<input type="text" id="nombre" name="cosa" value="<?php echo $cosa->cosa; ?>" class="campo-container campos"><br>
			<label for="cantidad">Cantidad:</label>
    		<input type="text" id="cantidad" name="cant" value="<?php echo $cosa->cant; ?>" class="campo-container campos"><br>
			<?php foreach ($tags as $tag): ?>
				<input type="checkbox" name="etiquetas[]" value="<?php echo $tag->id; ?>" <?php if (in_array($tag->id, $selectedTags)) echo "checked"; ?>><?php echo $tag->tag; ?><br>
			<?php endforeach; ?>
		</div>
		<input type="submit" value="Guardar" class="my-button">
	</form>
	</center>
</body>
</html>
