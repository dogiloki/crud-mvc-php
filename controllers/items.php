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
		require 'views/items/listar.php';

	}

	public function agregar(){
		$title="Agregar item";
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
		$title="Modificar item";
		require 'views/items/modificar.php';
	}

	public function actualizar($params){
		$params=[$_POST['name'],$_POST['surname'],$params['id']];
		if($this->model->actualizar($params)==null){
			$title="Actualizar item";
			require 'views/error.php';
		}else{
			return header("location:".$this->config->get('index'));
		}
	}

	public function eliminar($params){
		$params=[$params['id']];
		$this->model->eliminar($params);
		return header("location:".$this->config->get('index'));
	}

}

?>