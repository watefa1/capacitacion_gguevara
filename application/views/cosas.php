<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="es">
	<head>
	<meta charset="utf-8">
	<title>Cosas</title>
</head>
<h1>Lista de cosas</h1>

<button>
	<a href="/RegistroDeCosas">Registrar nueva cosa</a>
</button>
<button>
	<a href="/RegistroDeTags">Registrar/Eliminar tag</a>
</button>
<form method="get">
	<input type="search" name="search" placeholder="Buscar cosa..." value="<?php echo $this->input->get('search')?>" autofocus>
	<button type="submit">Buscar</button>
	<button><a href="Cosas">Reiniciar</a></button>
</form>
			<table border="1"> 
            <tr>
				<th>ID</th>
                <th>Nombre cosa</th>
                <th>Cantidad</th>
                <th>Tag</th>
				<th>Acción</th>
            </tr>
			<?php $number=0; foreach($data as $key => $value): ?>
            <tr>
				<th scope="row"><?php echo $number++; ?></th>
                <td><?php echo $value->cosa; ?></td>
                <td><?php echo $value->cant; ?></td>
				<td><?php foreach($value->tags as $tag) echo $tag->tag . ', '; ?></td>
				<td>
				<a href="<?php echo base_url(); ?>cosasEdit/index/<?php echo $value->id; ?>" class="btn"><ion-icon name="close-circle-outline"></ion-icon>Editar</a>
				<a href="<?php echo base_url(); ?>/cosas/delete/<?php echo $value->id; ?>" class="btn"><ion-icon name="close-circle-outline"></ion-icon>Borrar</a>
				</td>
            </tr>
			<?php endforeach; ?>
        </table>
</html>
