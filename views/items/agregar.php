<?php defined('acceso') or die ("Denegado"); ?>
<?php require("views/template/head.php"); ?>

	<form action="<?php echo $this->config->get('index'); ?>registrar" method="post" id="content-form">
		Nombre: <input type="text" name="name" required><br>
		Apellido: <input type="text" name="surname" required><br>
		<a href="<?php echo $this->config->get('index'); ?>">Cancelar</a>
		<input type="submit" value="Registrar">
	</form>

<?php require("views/template/footer.php"); ?>