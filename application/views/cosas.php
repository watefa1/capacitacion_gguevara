<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<title>Cosas</title>
</head>
    <body>
        <h1>Lista de cosas</h1>
		<button>
 		 <a href="https://capacitacion-gguevara.alephoo.com/registrodecosas">Registrar nueva cosa</a>
 	    </button>
        <table border="1">
            <tr>
				<th>ID</th>
                <th>Nombre cosa</th>
                <th>Cantidad</th>
                <th>Tag</th>
            </tr>
			<?php $number=0; foreach($data as $key => $value): ?>
            <tr>
				<th scope="row"><?php echo $number++; ?></th>
                <td><?php echo $value->cosa; ?></td>
                <td><?php echo $value->cant; ?></td>
                <td>Deporte</td>
            </tr>
			<?php endforeach; ?>
        </table>
</html>
