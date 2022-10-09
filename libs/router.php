<?php

class Router{

	private $url=[];
	private $action=[];

	public function add($url,$action=null,$params=[]){
		$this->url[]='/'.trim($url,'/');
		if($action!=null){
			$this->action[]=$action;
		}
	}

	public function controller(){
		$url=isset($_GET['url'])?'/'.$_GET['url']:'/';
		foreach($this->url as $key=>$value){
			if(preg_match("#^$value$#",$url)){
				$action=$this->action[$key];
				$this->action($action);
			}
		}
	}

	public function action($action){
		if($action instanceof \Closure){
			$action();
		}else{
			$controller=explode('@',$action);
			$obj=new $controller[0];
			$obj->{$controller[1]}();
		}
	}

}

?>