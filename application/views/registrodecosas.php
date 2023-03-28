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
	<h1>Registro de Cosas</h1>
	</div>
	<form action="<?php echo base_url(); ?>RegistroDeCosas/save" method="POST">
	<label for="nombre">    </label>
	<input type="text" id="nombre" name="cosa" placeholder="Nombre de la cosa"class="form-control <?php echo form_error('cosa') ? 'is-invalid':'';?>" value="<?php echo set_value('cosa')?>"><br>
	<div class="invalid-feedback">
	<?php echo form_error('cosa')?>
	</div>
	<label for="cantidad">    </label>
    <input type="text" id="cantidad" name="cant" placeholder="Cantidad" class="form-control <?php echo form_error('cant') ? 'is-invalid':'';?>" value="<?php echo set_value('cant')?>"><br>
	<div class="invalid-feedback">
		<?php echo form_error('cant')?>
		<select name="tags">
    <?php foreach ($tags as $etiqueta) { ?>
        <option value="<?= $etiqueta->id ?>"><?= $etiqueta->tag ?></option>
    <?php } ?>
</select>
	<input type="submit" value="Guardar">
	</form>
	<button>
  		<a href="/cosas">Volver</a>
	</button>
</body>
</html>
