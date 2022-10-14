<?php defined('acceso') or die ("Denegado"); ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Error</title>
</head>
<body>
	
	<h1>No existe el directorio</h1>
	<a href="<?php echo $this->config->get('index'); ?>">Volver al inicio</a>

</body>
</html>