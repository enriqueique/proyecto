<?php
// Archivo contenedor de funciones para eventos
require ("../../conexion.php");

class Eventos extends Conexion {
    protected $rol;
	public function __construct(){
		parent::__construct();
        $this->rol = $_SESSION['rol'];
        
        if($this->rol != '1' ){
            echo "No tienes permisos para acceder a esa sección";
            die();
        }
	}
	
    
    
	public function getEventos(){
		$consulta = "SELECT eventos.* , count(he_ev.asistencia) as asistencia FROM eventos LEFT JOIN he_ev ON he_ev.evento = eventos.id GROUP BY eventos.id";
		$resultado = $this->conexion_db->query($consulta);
		$data = $resultado->fetch_all(MYSQLI_ASSOC);
		return $data;
	}

	public function getEvento($evento){
		$buscar_evento = "SELECT * FROM eventos WHERE id=".$evento;
		$resultado = $this->conexion_db->query($buscar_evento);
		$data = $resultado->fetch_object();
		return $data;
	}

	public function insertEvento($evento){

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


