<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<title>Registro de tags</title>
</head> <center>
<body> 
<div>
	<h1>Registro de etiquetas</h1>
</div>
<form action="<?php echo base_url(); ?>RegistroDeTags/save" method="POST">
	<label for="nombre"></label>
	<input type="text" id="nombre" name="tag" placeholder="Nombre del tag" class="form-control"><br>
	<input type="submit" value="Guardar">
</form>
<button>
	<a href="/cosas">Volver</a>
</button> </center>
<hr>
<h2>Lista de tags</h2>
<h4>Solo se pueden borrar etiquetas no asociadas a una o más cosas.</h4>
<ul>
	<?php foreach($tags as $tag): ?>
		<li>
			<?php echo $tag->tag; ?>
			<a href="<?php echo base_url(); ?>RegistroDeTags/delete/<?php echo $tag->id; ?>">Eliminar</a>
		</li>
	<?php endforeach; ?>
</ul>
</body>
</html>
