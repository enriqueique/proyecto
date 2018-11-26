<?php

// Contenedor de funciones

require ("../../conexion.php");

class Eventos extends Conexion {
	public function __construct(){
		parent::__construct();
	}
// Left Join para para sacar los hermanos que asisten a eventos agrupados por su id
	
	public function getEventos(){
		$consulta = "SELECT eventos.* , count(he_ev.asistencia) as asistencia FROM eventos LEFT JOIN he_ev ON he_ev.evento = eventos.id GROUP BY eventos.id";
		$resultado = $this->conexion_db->query($consulta);
		$data = $resultado->fetch_all(MYSQLI_ASSOC);
		return $data;
	}

// Consulta de evento según su id

	public function getEvento($evento){
		$buscar_evento = "SELECT * FROM eventos WHERE id=".$evento;
		$resultado = $this->conexion_db->query($buscar_evento);
		$data = $resultado->fetch_object();
		return $data;
	}

// Consulta de inserción de datos

	public function insertEvento($evento){

// Separo y guardo los datos adquiridos, por un lado las llaves en $columns y el array en $values 

		$columns = implode("," , array_keys($evento));
		$values = "'".implode("','" , $evento)."'";
		
		$consulta = "INSERT INTO eventos ($columns) VALUES ($values)"; 
		$resultado = $this->conexion_db->query($consulta);
		if (!$resultado) {
			echo $consulta."<br>";
			return false;
			die();
		}	
	
		return true;	
	}

// Con die() fuerzo el error, para que no queden campos vacios

	public function updateEvento($evento, $id){

		foreach ($evento as $column => $value){
			$consulta = "UPDATE eventos SET ". $column ."='". $value . "' WHERE id = ". $id;
			$resultado = $this->conexion_db->query($consulta);
			if (!$resultado) {
				echo $consulta."<br>";
				return false;
				die();
			}
		}
		
		return true;	
	}


	public function deleteEvento($evento){
		
		$consulta = "DELETE FROM eventos WHERE id = $evento";
		$resultado = $this->conexion_db->query($consulta);
		
		if (!$resultado) {
			return false;
			die();
		}
	
		return true;
	}
	
}

?>


