<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Modificar usuario</title>
</head>
<body>

	<form action="actualizar?id=<?php echo $row['id']; ?>" method="post">
		<input type="text" name="name" value="<?php echo $row['name']; ?>" required><br>
		<input type="text" name="surname" value="<?php echo $row['surname']; ?>" required><br>
		<input type="submit" value="Actualizar">
	</form>

</body>
</html>