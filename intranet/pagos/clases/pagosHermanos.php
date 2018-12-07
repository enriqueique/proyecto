<?php

// Archivo contenedor de funciones para 

require ("pagos.php");

class PagosHermanos extends Pagos {
	public function __construct(){
		parent::__construct();
	}
	
	public function index(){

		$data = $this->getPagos();
		return $data;

	}

	public function show($pago){

		$data = $this->getPago($pago);
		return $data;

	}

	public function add($pago){

		$data = $this->insertPago($pago);
		if(!$data){
			echo "No se pudo agregar el pago ...";
		}else{
			header("Location: index.php");
		}
	}

	public function edit($pago){

		$data = $this->getPago($pago);
		return $data;

	}

	public function update($pago, $id){

		$pago['fecha'] = $pago['fecha']." ".$pago['hora'];
		unset($pago['hora']);
		unset($pago['submit']);
		$data = $this->updatePago($pago, $id);
		if(!$data){
			echo "No se pudo actualizar el pago ...";
		}else{
			header("Location: index.php");
		}
			
	}


	public function delete($pago){

		$data = $this->deletePago($pago);
		if(!$data){
			echo "No se pudo eliminar el pago ...";
		}else{
			header("Location: index.php");
		}

	}

	public function getHermanos($pago){
		$idPago = $pago['pago'];
		if ($pago['tipo'] == 'addHermanos') {
			$consulta = "SELECT * FROM hermanos WHERE NOT EXISTS (SELECT NULL FROM he_pa WHERE pago = hermanos.id AND pago = $idPago)";
		}else{
			$consulta = "SELECT hermanos.* FROM hermanos JOIN he_pa ON he_pa.pago = hermanos.id WHERE he_pa.pago = $idPago GROUP BY hermanos.id";
		}

		$resultado = $this->conexion_db->query($consulta);
		$data =$resultado->fetch_all(MYSQLI_ASSOC);
		echo json_encode($data);

	}

	public function deleteHermano($pago, $hermano){
		$consulta = "DELETE FROM he_pa WHERE pago = $pago AND asistencia = $hermano";
		$resultado = $this->conexion_db->query($consulta);
	}

	public function addHermanos($pago, $hermanos){
		foreach ($hermanos['addAsistencia'] as $asistencia) {
			$consulta = "INSERT INTO he_pa (pago, asistencia) VALUES " . "(" . $pago . "," . $asistencia . ")";
			$resultado = $this->conexion_db->query($consulta);

			if(!$resultado){
				echo $consulta;
				echo "<br>Hubo un error en la consulta. Disculpa las molestias...";
				exit();
			}
		}

		header("Location: ver.php?id=$pago");
	}
	
}
?>

