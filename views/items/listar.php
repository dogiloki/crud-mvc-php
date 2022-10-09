<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Listado</title>
</head>
<body>

	<table>
		<tr>
			<th>ID</th>
			<th>Nombre</th>
			<th>Apellido</th>
		</tr>
		<?php
		foreach($listado as $row){
			echo "
				<tr>
					<td>".$row['id']."</td>
					<td>".$row['name']."</td>
					<td>".$row['surname']."</td>
					<td><a href='modificar?id=".$row['id']."'>Modificar</a></td>
					<td><a href='eliminar?id=".$row['id']."'>Eliminar</a></td>
				</tr>
			";
		}
		?>
	</table>

	<a href="agregar">Agregar</a>

</body>
</html>
