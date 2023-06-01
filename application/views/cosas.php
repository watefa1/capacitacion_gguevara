<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="es">
	<head> 
	<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
	<style>
    .marquee {
      overflow: hidden;
      white-space: nowrap;
      animation: marquee 30s linear infinite;
    }

    @keyframes marquee {
      0% { transform: translateX(100%); }
      100% { transform: translateX(-100%); }
    }
  </style>
    <link href="application/css/Style.css" rel="stylesheet" type="text/css">
	<meta charset="utf-8">
	<title>Cosas</title>
</head> <body class="background">
<h1 class="marquee">Lista de cosas</h1>

<button class="my-button">
	<a href="/RegistroDeCosas" class="colorpalabrasboton">Registrar nueva cosa <ion-icon name="planet-sharp"></ion-icon></a>
</button>
<button class="my-button">
	<a href="/RegistroDeTags" class="colorpalabrasboton">ABM TAGS <ion-icon name="pricetags-sharp"></ion-icon></a>
</button><center>
<form method="get">
	<input type="search" name="search" class="campos" placeholder="Buscar cosa..." value="<?php echo $this->input->get('search')?>" autofocus>
	<button type="submit"><ion-icon name="telescope-sharp"></ion-icon></button>
	<button><a href="Cosas"><ion-icon name="refresh-sharp"></ion-icon></a></button>
</form>			
			<table class="tabla" border="1"> 
            <tr>
			  <th>ID</th>
			  <th class="moving-border" data-title="Nombre cosa"> </th>
			  <th class="moving-border" data-title="Cantidad"> </th>
			  <th class="moving-border" data-title="Tag"> </th>
			  <th class="moving-border" data-title="Acción"> </th>
			</tr>
			<?php $number=0; foreach($data as $key => $value): ?>
            <tr>
				<th scope="row"><?php echo $number++; ?></th>
                <td><?php echo $value->cosa; ?></td>
                <td><?php echo $value->cant; ?></td>
				<td>
				    <?php if (property_exists($value, 'tags') && is_array($value->tags)): ?>
				        <?php foreach ($value->tags as $tag): ?>
				            <?php echo $tag->tag . ', '; ?>
				        <?php endforeach; ?>
				    <?php endif; ?></td>			
				<td>
				<a href="<?php echo base_url(); ?>cosasEdit/index/<?php echo $value->id; ?>" class="btn ion-icon-accion"><ion-icon name="create-sharp"></ion-icon></a>
				<a href="<?php echo base_url(); ?>/cosas/delete/<?php echo $value->id; ?>" class="btn ion-icon-accion"><ion-icon name="trash-bin-sharp"></ion-icon></a>
				</td>
            </tr>
			<?php endforeach; ?>
        </table> </center>
		</body>
</html>
