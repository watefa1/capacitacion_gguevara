<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<title>Cosas</title>
</head>
<body>
<div>
	<h1>Alta de Cosas</h1>
	</div>
	<form action="form.php" method="post">
	<p>Nombre de la cosa: <input type="text" name="nombrecosa" /></p>
	<p>Cantidad: <input type="text" name="cantidadcosa" /></p>
	<button>Registrar</button>
	</form>
</body>
    <body>
        <h1>Lista de cosas</h1>
        <table border="1">
            <tr>
                <th>Nombre cosa</th>
                <th>Cantidad</th>
                <th>Tag</th>
            </tr>
            <tr>
                <td>Pelota de basquet</td>
                <td>2</td>
                <td>Deporte</td>
            </tr>
        </table>
</html>
