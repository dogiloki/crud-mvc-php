<?php

$config=Config::singleton();

$config->set('host','localhost');
$config->set('user','root');
$config->set('password','Hola123');
$config->set('db','mvc');

$config->set('index',str_replace("\\","/","http://".$_SERVER["HTTP_HOST"]."/crud-mvc-php/"));

?>