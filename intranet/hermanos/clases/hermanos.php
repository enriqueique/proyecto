<?php

// Archivo contenedor de funciones para posterior uso.

require ("../../conexion.php");

class Hermanos extends Conexion {
	public function __construct(){
		parent::__construct();
	}
	
	public function index(){
		$consulta = "SELECT * FROM hermanos";
		$resultado = $this->conexion_db->query($consulta);
		$data = $resultado->fetch_all(MYSQLI_ASSOC);
		return $data;
	}

	public function show($hermano){
		$buscar_hermano = "SELECT * FROM hermanos WHERE id=".$hermano;
		$resultado = $this->conexion_db->query($buscar_hermano);
		$data = $resultado->fetch_all(MYSQLI_ASSOC);
		return $data;
	}

	public function add($hermano){

		$hermano['password'] = password_hash($hermano['password'], PASSWORD_DEFAULT);		
		$columns = implode("," , array_keys($hermano));
		$values = "'".implode("','" , $hermano)."'";
		
		$consulta = "INSERT INTO hermanos ($columns) VALUES ($values)"; 
		$resultado = $this->conexion_db->query($consulta);
		if(!$resultado){
			return false;
		}	
	
		header("Location: index.php");	
	}

	public function edit($hermano){

		$buscar_hermano = "SELECT * FROM hermanos WHERE id=".$hermano;
		$resultado = $this->conexion_db->query($buscar_hermano);
		$data = $resultado->fetch_all(MYSQLI_ASSOC);
		return $data;
	}

	public function update($hermano, $id){

		$hermano['password'] = password_hash($hermano['password'], PASSWORD_DEFAULT);
		
		foreach ($hermano as $column => $value){
			$consulta = "UPDATE hermanos SET ". $column ."='". $value . "' WHERE id = ". $id;
			$resultado = $this->conexion_db->query($consulta);
		}
		
		header("Location: index.php");	
	}


	public function delete($hermano){
		
		$consulta = "DELETE FROM hermanos WHERE id = $hermano";
		$resultado = $this->conexion_db->query($consulta);
		
		if(!$resultado){
			return false;
		}	
	
		header("Location: index.php");	
	}
	
}

?>


