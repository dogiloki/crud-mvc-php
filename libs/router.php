<?php

class Router{

	private $url=[];
	private $action=[];
	public $config=null;

	public function __construct(){
		$this->config=Config::singleton();
	}

	public function add($url,$action=null,$index_end=1){
		$this->url[]=[
			'url'=>'/'.trim($url,'/'),
			'index_end'=>$index_end
		];
		if($action!=null){
			$this->action[]=$action;
		}
	}

	public function controller(){
		$base_url=isset($_GET['url'])?'/'.$_GET['url']:'/';
		for($key=0; $key<sizeof($this->url); $key++){
			$values=$this->url[$key]['url'];
			$index_end=$this->url[$key]['index_end'];
			$params_key=array_slice(explode('/',$values),$index_end+1);
			$value=implode('/',array_slice(explode('/',$values),1,$index_end));
			$value='/'.trim($value,'/');
			$params_value=array_slice(explode('/',$base_url),$index_end+1);
			$url=implode('/',array_slice(explode('/',$base_url),1,$index_end));
			$url='/'.trim($url,'/');
			if(preg_match("#^$value$#",$url)){
				$params=[];
				for($indice=0; $indice<sizeof($params_key); $indice++){
					$params[$params_key[$indice]]=$params_value[$indice]??"";
				}
				$action=$this->action[$key];
				$this->action($action,$params);
				$key=sizeof($this->url);
				return 0;
			}
		}
		define("acceso",true);
		require 'views/error.php';
	}

	public function action($action,$params){
		if($action instanceof \Closure){
			$action($params);
		}else{
			$controller=explode('@',$action);
			$obj=new $controller[0];
			$obj->{$controller[1]}($params);
		}
	}

}

?>