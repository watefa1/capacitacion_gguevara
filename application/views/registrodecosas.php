<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="es">
<head>
<link rel="icon" href="<?php echo base_url('application/image/logo.png'); ?>" type="image/x-icon">
<link href="/application/css/Style.css" rel="stylesheet" type="text/css">
	<meta charset="utf-8">
	<title>Registro de cosas</title>
</head>
<?php $this->load->view('head'); ?>

<button">
  		<a href="/cosas" class='my-button'>Inicio</a>
	</button>
<body class="background"> <center>
<div>
	<h1>Registro de Cosas</h1>
	</div>
	<form action="<?php echo base_url(); ?>RegistroDeCosas/save" method="POST">
	<label for="nombre">    </label>
	<input type="text" id="nombre" name="cosa" placeholder="Nombre de la cosa" class="campos" class="form-control <?php echo form_error('cosa') ? 'is-invalid':'';?>" value="<?php echo htmlspecialchars(set_value('cosa'))?>"><br>
	<div class="invalid-feedback invalid-text">
	<?php echo form_error('cosa')?>
	</div>
	<label for="cantidad">    </label>
    <input type="text" id="cantidad" name="cant" placeholder="Cantidad" class="campos" class="form-control <?php echo form_error('cant') ? 'is-invalid':'';?>" value="<?php echo set_value('cant')?>"><br>
	<div class="invalid-feedback invalid-text">
		<?php echo form_error('cant')?> 
		<div>
  <?php foreach ($tags as $etiqueta) { ?>
    <input type="checkbox" name="etiquetas[]" class="custom-checkbox" value="<?php echo $etiqueta->id; ?>" <?php if ($etiqueta->id == $tags[0]->id); ?>> <?php echo $etiqueta->tag; ?>
  <?php } ?>
</div>
<input type="submit" value="Guardar" class="my-button">
	</form> </center>
</body>
</html>
