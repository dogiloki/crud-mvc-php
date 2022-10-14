<?php

class ItemsModel{

	protected $db;

	public function __construct(){
		// Instancia única de PDO
		$this->db=DB::singleton();
	}

	public function listado(){
		//return DB::execute($this->db,DB::SELECT,"SELECT * FROM users");
		return DB::selectFrom($this->db,"users",[]);
	}

	public function registrar($params){
		//DB::execute($this->db,DB::INSERT,"INSERT INTO users VALUES (?,?,?)",$params);
		DB::insertInto($this->db,"users",$params);
		return $this->db->errorCode();
	}

	public function obtener($params){
		DB::$where="id=?";
		return DB::selectFrom($this->db,"users",$params);
	}

	public function actualizar($params){
		//DB::execute($this->db,DB::UPDATE,"UPDATE users SET name=?, surname=? WHERE id=?",$params);
		DB::$set="name=?,surname=?";
		DB::$where="id=?";
		DB::update($this->db,"users",$params);
		return $this->db->errorCode();
	}

	public function eliminar($params){
		//DB::execute($this->db,DB::DELETE,"DELETE FROM users WHERE id=?",$params);
		DB::$where="id=?";
		DB::delete($this->db,"users",$params);
		return $this->db->errorCode();
	}

}

?>