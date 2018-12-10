<?php

// Crearemos un archivo de ejemplo para hacer uso del archivo de conexion y hacer una consulta donde devuelva los datos de un registros o todos los datos dependiendo el tipo de consulta que queramos hacer.

require ("reuniones.php");

class ReunionesHermanos extends Reuniones {
	public function __construct(){
		parent::__construct();
	}
	
	public function index(){

		$data = $this->getReuniones();
		return $data;

	}

	public function show($reunion){

		$data = $this->getReunion($reunion);
		return $data;

	}

	public function add($reunion){

		$reunion['fecha'] = $reunion['fecha']." ".$reunion['hora'];
		unset($reunion['hora']);
		$data = $this->insertReunion($reunion);
		if(!$data){
			echo "No se pudo agregar el reunion ...";
		}else{
			header("Location: index.php");
		}
	}

	public function edit($reunion){

		$data = $this->getReunion($reunion);
		return $data;

	}

	public function update($reunion, $id){

		$reunion['fecha'] = $reunion['fecha']." ".$reunion['hora'];
		unset($reunion['hora']);
		unset($reunion['submit']);
		$data = $this->updateReunion($reunion, $id);
		if(!$data){
			echo "No se pudo actualizar el reunion ...";
		}else{
			header("Location: index.php");
		}
			
	}


	public function delete($reunion){

		$data = $this->deleteReunion($reunion);
		if(!$data){
			echo "No se pudo eliminar el reunion ...";
		}else{
			header("Location: index.php");
		}

	}

	public function getHermanos($reunion){
		$idReunion = $reunion['reunion'];
		if ($reunion['tipo'] == 'addHermanos') {
			$consulta = "SELECT * FROM hermanos WHERE NOT EXISTS (SELECT NULL FROM he_re WHERE participante = hermanos.id AND reunion = $idReunion)";
		}else{
			$consulta = "SELECT hermanos.* FROM hermanos JOIN he_re ON he_re.participante = hermanos.id WHERE he_re.reunion = $idReunion GROUP BY hermanos.id";
		}

		$resultado = $this->conexion_db->query($consulta);
		$data =$resultado->fetch_all(MYSQLI_ASSOC);
		echo json_encode($data);

	}

	public function deleteHermano($reunion, $hermano){
		$consulta = "DELETE FROM he_re WHERE reunion = $reunion AND participante = $hermano";
		$resultado = $this->conexion_db->query($consulta);
	}

	public function addHermanos($reunion, $hermanos){
		foreach ($hermanos['addAsistencia'] as $asistencia) {
			$consulta = "INSERT INTO he_re (reunion, participante) VALUES " . "(" . $reunion . "," . $asistencia . ")";
			$resultado = $this->conexion_db->query($consulta);

			if(!$resultado){
				echo $consulta;
				echo "<br>Hubo un error en la consulta. Disculpa las molestias...";
				exit();
			}
		}

		header("Location: ver.php?id=$reunion");
	}
	
}
?>

