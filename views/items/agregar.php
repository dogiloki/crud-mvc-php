<?php require("views/template/head.php"); ?>

	<form action="registrar" method="post">
		<input type="text" name="name" required><br>
		<input type="text" name="surname" required><br>
		<a href="index">Cancelar</a>
		<input type="submit" value="Registrar">
	</form>

<?php require("views/template/footer.php"); ?>