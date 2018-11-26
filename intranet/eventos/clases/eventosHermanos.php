<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
?>
<?php

// Consultas para Eventos

require ("eventos.php");

class EventosHermanos extends Eventos {
	public function __construct(){
		parent::__construct();
	}
	
	public function index(){

		$data = $this->getEventos();
		return $data;

	}

	public function show($evento){

		$data = $this->getEvento($evento);
		return $data;

	}


	public function add($evento){

		$evento['fecha'] = $evento['fecha']." ".$evento['hora'];
		unset($evento['hora']);
		$data = $this->insertEvento($evento);
		if(!$data){
			echo "No se pudo agregar el evento ...";
		}else{
			header("Location: index.php");
		}
	}

	public function edit($evento){

		$data = $this->getEvento($evento);
		return $data;

	}

	public function update($evento, $id){

		$evento['fecha'] = $evento['fecha']." ".$evento['hora'];
		unset($evento['hora']);
		unset($evento['submit']);
		$data = $this->updateEvento($evento, $id);
		if(!$data){
			echo "No se pudo actualizar el evento ...";
		}else{
			header("Location: index.php");
		}
			
	}


	public function delete($evento){

		$data = $this->deleteEvento($evento);
		if(!$data){
			echo "No se pudo eliminar el evento ...";
		}else{
			header("Location: index.php");
		}

	}

	public function getHermanos($evento){

		$consulta = "SELECT hermanos.* FROM hermanos JOIN he_ev ON he_ev.asistencia = hermanos.id WHERE he_ev.evento = $evento GROUP BY hermanos.id";
		$resultado = $this->conexion_db->query($consulta);
		$data = $resultado->fetch_all(MYSQLI_ASSOC);
		echo json_encode($data);
	}
	
}
?>

