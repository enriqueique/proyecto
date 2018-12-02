<?php

// Archivo contenedor de funciones para posterior uso.

require ("../../conexion.php");

class Utileria extends Conexion {
	public function __construct(){
		parent::__construct();
	}
	
	public function index(){
		$consulta = "SELECT * FROM utileria";
		$resultado = $this->conexion_db->query($consulta);
		$data = $resultado->fetch_all(MYSQLI_ASSOC);
		return $data;
	}

	public function show($nombre){
		$buscar_util = "SELECT * FROM utileria WHERE id=".$nombre;
		$resultado = $this->conexion_db->query($buscar_util);
		$data = $resultado->fetch_all(MYSQLI_ASSOC);
		return $data;
	}

	public function add($nombre){
	
		$columns = implode("," , array_keys($nombre));
		$values = "'".implode("','" , $nombre)."'";
		
		$consulta = "INSERT INTO utileria ($columns) VALUES ($values)"; 
		$resultado = $this->conexion_db->query($consulta);
		if(!$resultado){
			return false;
		}	
	
		header("Location: index.php");	
	}

	public function edit($id){

		$buscar_util = "SELECT * FROM utileria WHERE id=".$id;
		$resultado = $this->conexion_db->query($buscar_util);
		$data = $resultado->fetch_all(MYSQLI_ASSOC);
		return $data;
	}

	public function update($nombre, $id){
		
		foreach ($nombre as $column => $value){
			$consulta = "UPDATE utileria SET ". $column ."='". $value . "' WHERE id = ". $id;
			$resultado = $this->conexion_db->query($consulta);
		}
		
		header("Location: index.php");	
	}


	public function delete($id){
		
		$consulta = "DELETE FROM utileria WHERE id = $id";
		$resultado = $this->conexion_db->query($consulta);
		
		if(!$resultado){
			return false;
		}	
	
		header("Location: index.php");	
	}
	
}

?>
