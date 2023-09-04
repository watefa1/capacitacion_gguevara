<!DOCTYPE html>
<html lang="es">
<head>
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<link rel="icon" href="<?php echo base_url('application/image/logo.png'); ?>" type="image/x-icon">
<link href="/application/css/Style.css" rel="stylesheet" type="text/css">
	<meta charset="utf-8">
	<title>Registro de tags</title>
	</head>
<?php $this->load->view('head'); ?> <button">
  		<a href="/cosas" class='my-button'>Inicio</a>
	</button>
    <center>
        <div>
            <h1>Registro de etiquetas</h1>
        </div>
        <form action="<?php echo base_url(); ?>RegistroDeTags/save" method="POST">
            <label for="nombre"></label>
            <input type="text" id="nombre" name="tag" placeholder="Nombre del tag" class="form-control campos"><br>
            <input type="submit" value="Guardar" class="my-button">
        </form>
    </center>
    <hr>
    <h2>Lista de tags</h2>
    <h4>Solo se pueden borrar etiquetas no asociadas a una o más cosas.</h4>
    <table border="1">
        <tr>
            <th class="colorpalabrasboton">Nombre del tag</th>
			<th class="colorpalabrasboton">Acción</th>
        </tr>
        <?php foreach($tags as $tag): ?>
            <tr>
                <td><?php echo $tag->tag; ?></td>
                <td>
                    <?php if (property_exists($tag, 'associated') && $tag->associated == false): ?>
                        <a href="<?php echo base_url(); ?>RegistroDeTags/delete/<?php echo $tag->id; ?>"class="btn ion-icon-accion delete-link"><ion-icon name="trash-bin-sharp"></ion-icon></a>
                    <?php else: ?>
                        Etiqueta asociada a cosas, <b class="invalid-text">no</b> se puede eliminar.
                    <?php endif; ?>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
