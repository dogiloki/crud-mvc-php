<?php defined('acceso') or die ("Denegado"); ?>
<?php require("views/template/head.php"); ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Modificar usuario</title>
</head>
<body>

	<form action="<?php echo $this->config->get('index')."actualizar/".$row['id']; ?>" method="post">
		Nombre: <input type="text" name="name" value="<?php echo $row['name']; ?>" required><br>
		Apellido: <input type="text" name="surname" value="<?php echo $row['surname']; ?>" required><br>
		<a href="<?php echo $this->config->get('index'); ?>">Cancelar</a>
		<input type="submit" value="Actualizar">
	</form>

</body>
</html>

<?php require("views/template/footer.php"); ?>