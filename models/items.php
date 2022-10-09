<?php

class ItemsModel{

	protected $db;

	public function __construct(){
		// Instancia única de PDO
		$this->db=DB::singleton();
	}

	public function listado(){
		return DB::execute($this->db,DB::SELECT,"SELECT * FROM users");
	}

	public function registrar($params){
		DB::execute($this->db,DB::INSERT,"INSERT INTO users VALUES (?,?,?)",$params);
		return $this->db->errorCode();
	}

	public function obtener($params){
		return DB::execute($this->db,DB::SELECT,"SELECT * FROM users WHERE id=?",$params);
	}

	public function actualizar($params){
		DB::execute($this->db,DB::UPDATE,"UPDATE users SET name=?, surname=? WHERE id=?",$params);
		return $this->db->errorCode();
	}

	public function eliminar($params){
		DB::execute($this->db,DB::DELETE,"DELETE FROM users WHERE id=?",$params);
	}

}

?>