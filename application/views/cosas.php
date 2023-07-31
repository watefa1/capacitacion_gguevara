<?php defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('America/Argentina/Buenos_Aires'); 
$hora = date('H'); 

if ($hora >= 6 && $hora < 12) {
    $saludo = 'Buenos días';
} elseif ($hora >= 12 && $hora < 18) {
    $saludo = 'Buenas tardes';
} else {
    $saludo = 'Buenas noches';
} ?>
<!DOCTYPE html>
<html lang="es">

<head>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <link href="application/css/Style.css" rel="stylesheet" type="text/css">
    <meta charset="utf-8">
    <title>Cosas</title>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const deleteLinks = document.querySelectorAll(".delete-link");

            deleteLinks.forEach((link) => {
                link.addEventListener("click", function (e) {
                    e.preventDefault();

                    const deleteUrl = this.getAttribute("href");
                    const row = this.closest("tr");

                    fetch(deleteUrl, {
                        method: "POST"
                    })
                        .then((response) => response.json())
                        .then((data) => {
                            if (data.success) {
                                row.style.opacity = 0;
                                setTimeout(() => row.remove(), 500);
                            }
                        })
                        .catch((error) => {
                            console.log(error);
                        });
                });
            });
        });
    </script>
</head>

<body>
<?php $this->load->view('head'); ?>
	<h1 data-title="Lista de Cosas" style="position: fixed; top: 0; left: 50%; transform: translateX(-50%);">Lista de Cosas</h1>
    <button class="my-button">
		<a href="/RegistroDeCosas" class="colorpalabrasboton">Registrar nueva cosa <ion-icon name="planet-sharp"></ion-icon></a>
    </button>
    <button class="my-button">
		<a href="/RegistroDeTags" class="colorpalabrasboton">ABM TAGS <ion-icon name="pricetags-sharp"></ion-icon></a>
    </button>
    <style>
		.logout-button {
			float: right;
            margin-top: 1px;
        }
		</style>
	<div class="cuadro">
		<h4 class="usuariopalabraa"> <?php echo $saludo; ?>, <?php echo $nombreUsuario; ?></h4>
		<p class="usuariopalabrab"> ROL: *no disponible*</p>
	</div>
    <center>
        <div class="result-container">
            <form id="search-form" method="get">
                <input type="search" name="search" class="campos" placeholder="Buscar cosa..."
                    value="<?php echo $this->input->get('search')?>" autofocus>
                <button class="my-button1" type="submit"><ion-icon name="telescope-sharp"></ion-icon></button>
                <button class="my-button1"><a href="Cosas"><ion-icon name="refresh-sharp"></ion-icon></a></button>
            </form>
			<?php
				$tagColors = array(
				    1 => array('background' => '#96F4FF', 'border' => 'blue'),
				    2 => array('background' => '#FEC1B5', 'border' => 'red'),
					3 => array('background' => '#FF96F9', 'border' => 'cyan'),
				);
				?>
			<table class="tabla" border="1">
   				 <tr>
   				     <th>Nombre cosa</th>
   				     <th>Cantidad</th>
   				     <th>Tag</th>
   				     <th>Acción</th>
   				 </tr>
   				 <?php foreach($data as $key => $value): ?>
   				 <tr>
   				     <td><?php echo $value->cosa; ?></td>
   				     <td><?php echo $value->cant; ?></td>
   				     <td>
            <?php if (property_exists($value, 'tags') && is_array($value->tags)): ?>
                <?php foreach ($value->tags as $tag): ?>
                    <?php
                        $tagId = $tag->id;
                        
                        if (array_key_exists($tagId, $tagColors)) {
                            $background = $tagColors[$tagId]['background'];
                            $border = $tagColors[$tagId]['border'];
                        } else {
                            $background = '#ECECEC';
                            $border = '#333';
                        }
                    ?>
                    <span style="display: inline-block; padding: 4px; border: 1px solid <?php echo $border; ?>; background-color: <?php echo $background; ?>; margin-right: 4px;"><?php echo $tag->tag; ?></span>
                <?php endforeach; ?>
            <?php endif; ?>
        </td>
   				     <td>
   				         <a href="<?php echo base_url(); ?>cosasEdit/index/<?php echo $value->id; ?>"
   				             class="btn ion-icon-accion"><ion-icon name="create-sharp"></ion-icon></a>
   				         <a href="<?php echo base_url(); ?>/cosas/delete/<?php echo $value->id; ?>"
   				             class="btn ion-icon-accion delete-link"><ion-icon name="trash-bin-sharp"></ion-icon></a>
   				     </td>
   				 </tr>
   				 <?php endforeach; ?>
			</table>
        </div>
    </center>
</body>
</html>
