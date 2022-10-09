<?php

require "libs/config.php";
require "libs/database.php";
require "libs/router.php";
require "config.php";
require "controllers/items.php";

$router=new Router();

$router->add('/','ItemsController@listar');
$router->add('/items','ItemsController@listar');
$router->add('/agregar','ItemsController@agregar');
$router->add('/registrar','ItemsController@registrar');
$router->add('/modificar','ItemsController@modificar');
$router->add('/actualizar','ItemsController@actualizar');
$router->add('/eliminar','ItemsController@eliminar');

$router->controller();

?>