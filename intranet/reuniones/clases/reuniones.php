<?php

// Crearemos un archivo de ejemplo para hacer uso del archivo de conexion y hacer una consulta donde devuelva los datos de un registros o todos los datos dependiendo el tipo de consulta que queramos hacer.

require ("../../conexion.php");

class Reuniones extends Conexion {
	public function __construct(){
		parent::__construct();
	}
	
	public function getReuniones(){
		$consulta = "SELECT reuniones.* , count(he_re.participante) as asistencia FROM reuniones LEFT JOIN he_re ON he_re.reunion = reuniones.id GROUP BY reuniones.id";
		$resultado = $this->conexion_db->query($consulta);
		$data = $resultado->fetch_all(MYSQLI_ASSOC);
		return $data;
	}

	public function getReunion($reunion){
		$buscar_Reunion = "SELECT * FROM reuniones WHERE id=".$reunion;
		$resultado = $this->conexion_db->query($buscar_Reunion);
		$data = $resultado->fetch_object();
		return $data;
	}

	public function insertReunion($reunion){

		$columns = implode("," , array_keys($reunion));
		$values = "'".implode("','" , $reunion)."'";
		
		$consulta = "INSERT INTO reuniones ($columns) VALUES ($values)"; 
		$resultado = $this->conexion_db->query($consulta);
		if (!$resultado) {
			echo $consulta."<br>";
			return false;
			die();
		}	
	
		return true;	
	}

	public function updateReunion($reunion, $id){

		foreach ($reunion as $column => $value){
			$consulta = "UPDATE reuniones SET ". $column ."='". $value . "' WHERE id = ". $id;
			$resultado = $this->conexion_db->query($consulta);
			if (!$resultado) {
				echo $consulta."<br>";
				return false;
				die();
			}
		}
		
		return true;	
	}


	public function deleteReunion($reunion){
		
		$consulta = "DELETE FROM reuniones WHERE id = $reunion";
		$resultado = $this->conexion_db->query($consulta);
		
		if (!$resultado) {
			return false;
			die();
		}
	
		return true;
	}
	
}

?>


