<?php

// Incluir modelo corespondiente
require 'models/items.php';

class ItemsController{

	public $model;
	public $config;

	public function __construct(){
		$this->config=Config::singleton();
		$this->model=new ItemsModel();
	}

	public function listar(){
		$listado=$this->model->listado();
		$title="Listado de items";
		define("acceso",true);
		require 'views/items/listar.php';

	}

	public function agregar(){
		$title="Agregar item";
		define("acceso",true);
		require 'views/items/agregar.php';
	}

	public function registrar(){
		$params=[0,$_POST['name'],$_POST['surname']];
		if($this->model->registrar($params)==null){
			$title="Registrar item";
			require 'views/error.php';
		}else{
			return header("location:".$this->config->get('index'));
		}
	}

	public function modificar($params){
		$params=[$params['id']];
		$row=$this->model->obtener($params)[0];
		if($row==null){
			return header("location:".$this->config->get('index'));
		}
		$title="Modificar item";
		define("acceso",true);
		require 'views/items/modificar.php';
	}

	public function actualizar($params){
		$params=[$_POST['name'],$_POST['surname'],$params['id']];
		if($this->model->actualizar($params)==null){
			require 'views/error.php';
		}else{
			return header("location:".$this->config->get('index'));
		}
	}

	public function eliminar($params){
		$params=[$params['id']];
		if($this->model->eliminar($params)==null){
			require 'views/error.php';
		}else{
			return header("location:".$this->config->get('index'));
		}
	}

}

?>