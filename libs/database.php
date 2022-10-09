<?php

// Es una clase que extiende PDO. Permite aplicar el patrón Singleton para mantener una única instancia de PDO

class DB extends PDO{

	private static $instance=null;
	public static $sql=null;
	public static $column=null;
	public static $where=null;
	public static $group=null;
	public static $order=null;
	public static $having=null;
	public static $limit=null;

	public const SELECT=0;
	public const INSERT=1;
	public const UPDATE=2;
	public const ALTER=3;
	public const DELETE=4;

	private function __construct(){
		
	}

	public static function singleton(){
		$config=Config::singleton();
		if(self::$instance==null){
			try{
				$connection="mysql:host=".$config->get('host').";dbname=".$config->get('db');
				self::$instance=new PDO($connection,$config->get('user'),$config->get('password'));
				//self::$instance=new mysqli($config->get('host'),$config->get('user'),$config->get('password'),$config->get('db'));
				self::$instance->query('SET NAMES utf8');
			}catch(PDOException $ex){
				echo $ex->getMessage();
			}
		}
		return self::$instance;
	}

	public static function execute($db,$type=null,$sql,$params=[]){
		$query=$db->prepare($sql);
		self::$sql=$sql;
		$query->execute($params);
		return ($type==DB::SELECT)?$query->fetchAll():$query;
	}

	public static function selectFrom($db,$table,$params=[[]]){
		if(self::$column==null){
			$columns="*";
		}else{
			$columns="";
			foreach(self::$column as $column){
				$columns.=$column.",";
			}
			$columns=substr($columns,0,-1);
		}
		$where=(self::$where==null)?"":"WHERE ".self::$where;
		$group=(self::$group==null)?"":"GROUP BY ".self::$group;
		$order=(self::$order==null)?"":"ORDER BY ".self::$order;
		$having=(self::$having==null)?"":"HAVING ".self::$having;
		$limit=(self::$limit==null)?"":"LIMIT ".self::$limit;
		$sql="SELECT ".$columns." FROM ".$table." ".$where." ".$group." ".$order." ".$having." ".$limit;
		self::$sql=$sql;
		$query=self::execute($db,$sql,$params);
		return $query->fetch();
	}

	public static function insertInto($db,$table_,$values_=[]){
		$table=$table_;
		$sql="INSERT INTO ".$table." VALUES (";
		for($a=0; $a<sizeof($values_); $a++){
			$sql.="?,";
		}
		$sql=substr($sql,0,-1);
		$sql.=")";
		$query=$db->prepare($sql);
		for($a=0; $a<sizeof($values_); $a++){
			$query->bindParam(($a+1),$values_[$a],PDO::PARAM_STR);
		}
		self::$sql=$sql;
		return $query->execute();
	}

}

?>