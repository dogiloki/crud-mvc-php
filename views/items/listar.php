<?php defined('acceso') or die ("Denegado"); ?>
<?php require("views/template/head.php"); ?>

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
				<td><a href='modificar/".$row['id']."'>Modificar</a></td>
				<td><a href='eliminar/".$row['id']."'>Eliminar</a></td>
			</tr>
		";
	}
	?>
</table>

<a href="agregar">Agregar</a>

<?php require("views/template/footer.php"); ?>
