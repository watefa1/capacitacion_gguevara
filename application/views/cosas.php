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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script>
        $(document).ready(function() {1
            $('#search-form').submit(function(event) {
                event.preventDefault();

                var searchTerm = $('input[name="search"]').val();

                $.ajax({
                    url: 'Cosas', 
                    type: 'GET',
                    data: { search: searchTerm }, 
                    success: function(response) {
                        if (response.trim() !== '') {
                            $('.tabla tbody').empty(); 
                            $('.tabla tbody').html(response);
                        } else {
                            $('.tabla tbody').empty();
                        }
                    },
                    error: function(xhr, status, error) {
                        
                        console.log(error);
                    }
                });
            });
        });
    </script>
    <link href="application/css/Style.css" rel="stylesheet" type="text/css">
    <meta charset="utf-8">
    <title>Cosas</title>
</head>
    <div class="cuadro">
	<h4 class="usuariopalabra"> <?php echo $saludo; ?>, <?php echo $nombreUsuario; ?></h4>
        <p class="usuariopalabra"> ROL: *no disponible*</p>
    </div>
	<h1 data-title="Lista de Cosas" style="position: fixed; top: 0; left: 50%; transform: translateX(-50%);">Lista de Cosas</h1>
    <button class="my-button">
        <a href="/RegistroDeCosas" class="colorpalabrasboton">Registrar nueva cosa <ion-icon name="planet-sharp"></ion-icon></a>
    </button>
    <button class="my-button">
        <a href="/RegistroDeTags" class="colorpalabrasboton">ABM TAGS <ion-icon name="pricetags-sharp"></ion-icon></a>
    </button> <style>
			    .logout-button {
			        float: right;
			        margin-top: 3px;
			    }
			</style>
	<button class="my-button logout-button">
    <a href="<?php echo base_url('Login/logout'); ?>" class="colorpalabrasboton">Cerrar sesión <ion-icon name="rocket-sharp"></ion-icon></a>
	</button>
    <center>
        <form id="search-form" method="get">
            <input type="search" name="search" class="campos" placeholder="Buscar cosa..." value="<?php echo $this->input->get('search')?>" autofocus>
            <button class="my-button1" type="submit"><ion-icon name="telescope-sharp"></ion-icon></button>
            <button class="my-button1"><a href="Cosas"><ion-icon name="refresh-sharp"></ion-icon></a></button>
        </form>
        <div class="result-container">
            <table class="tabla" border="1">
                <tr>
                    <th>ID</th>
                    <th class="moving-border" data-title="Nombre cosa"></th>
                    <th class="moving-border" data-title="Cantidad"></th>
                    <th class="moving-border" data-title="Tag"></th>
                    <th class="moving-border" data-title="Acción"></th>
                </tr>
                <?php foreach($data as $key => $value): ?>
                    <tr>
                        <th scope="row"><?php echo $key; ?></th>
                        <td><?php echo $value->cosa; ?></td>
                        <td><?php echo $value->cant; ?></td>
                        <td>
                            <?php if (property_exists($value, 'tags') && is_array($value->tags)): ?>
                                <?php foreach ($value->tags as $tag): ?>
                                    <?php echo $tag->tag . ', '; ?>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </td>
                        <td>
                            <a href="<?php echo base_url(); ?>cosasEdit/index/<?php echo $value->id; ?>" class="btn ion-icon-accion"><ion-icon name="create-sharp"></ion-icon></a>
                            <a href="<?php echo base_url(); ?>/cosas/delete/<?php echo $value->id; ?>" class="btn ion-icon-accion"><ion-icon name="trash-bin-sharp"></ion-icon></a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
        </div>
    </center>
</body>
</html>
