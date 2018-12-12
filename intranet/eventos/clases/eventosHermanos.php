<?php
// Contenedor de consultas, conexión a la bbdd
session_start();

if (!isset($_SESSION['user'])){
    header("Location: ../../login");
}

// Archivo contenedor de funciones para 

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
		$idEvento = $evento['evento'];
		if ($evento['tipo'] == 'addHermanos') {
			$consulta = "SELECT * FROM hermanos WHERE NOT EXISTS (SELECT NULL FROM he_ev WHERE asistencia = hermanos.id AND evento = $idEvento)";
		}else{
			$consulta = "SELECT hermanos.* FROM hermanos JOIN he_ev ON he_ev.asistencia = hermanos.id WHERE he_ev.evento = $idEvento GROUP BY hermanos.id";
		}

		$resultado = $this->conexion_db->query($consulta);
		$data =$resultado->fetch_all(MYSQLI_ASSOC);
		echo json_encode($data);

	}

	public function deleteHermano($evento, $hermano){
		$consulta = "DELETE FROM he_ev WHERE evento = $evento AND asistencia = $hermano";
		$resultado = $this->conexion_db->query($consulta);
	}

	public function addHermanos($evento, $hermanos){
		foreach ($hermanos['addAsistencia'] as $asistencia) {
			$consulta = "INSERT INTO he_ev (evento, asistencia) VALUES " . "(" . $evento . "," . $asistencia . ")";
			$resultado = $this->conexion_db->query($consulta);

			if(!$resultado){
				echo $consulta;
				echo "<br>Hubo un error en la consulta. Disculpa las molestias...";
				exit();
			}
		}

		header("Location: ver.php?id=$evento");
	}
	
}
?>

