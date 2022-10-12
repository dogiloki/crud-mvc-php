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
$router->add('/modificar/id','ItemsController@modificar');
$router->add('/actualizar/id','ItemsController@actualizar');
$router->add('/eliminar/id','ItemsController@eliminar');

$router->controller();

?>