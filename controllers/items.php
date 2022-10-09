<?php

// Incluir modelo corespondiente
require 'models/items.php';

class ItemsController{

	public $model;

	public function __construct(){
		$this->model=new ItemsModel();
	}

	public function listar(){
		$listado=$this->model->listado();
		require 'views/items/listar.php';

	}

	public function agregar(){
		require 'views/items/agregar.php';
	}

	public function registrar(){
		$params=[0,$_POST['name'],$_POST['surname']];
		if($this->model->registrar($params)==null){
			require 'views/error.php';
		}else{
			return header("location:./");
		}
	}

	public function modificar(){
		$params=[$_GET['id']];
		$row=$this->model->obtener($params)[0];
		require 'views/items/modificar.php';
	}

	public function actualizar(){
		$params=[$_POST['name'],$_POST['surname'],$_GET['id']];
		if($this->model->actualizar($params)==null){
			require 'views/error.php';
		}else{
			return header("location:./");
		}
	}

	public function eliminar(){
		$params=[$_GET['id']];
		$this->model->eliminar($params);
		return header("location:./");
	}

}

?>