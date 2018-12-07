<?php

// Archivo contenedor de funciones para pagos

require ("../../conexion.php");

class Pagos extends Conexion {
	public function __construct(){
		parent::__construct();
	}
	
	public function getPagos(){
		$consulta = "SELECT pagos.* , count(he_pa.pago) as pago FROM pagos LEFT JOIN he_pa ON he_pa.pago = pagos.id GROUP BY pagos.id";
		$resultado = $this->conexion_db->query($consulta);
		$data = $resultado->fetch_all(MYSQLI_ASSOC);
		return $data;
	}

	public function getPago($pago){
		$buscar_pago = "SELECT * FROM pagos WHERE id=".$pago;
		$resultado = $this->conexion_db->query($buscar_pago);
		$data = $resultado->fetch_object();
		return $data;
	}

	public function insertPago($pago){

		$columns = implode("," , array_keys($pago));
		$values = "'".implode("','" , $pago)."'";
		
		$consulta = "INSERT INTO pagos ($columns) VALUES ($values)"; 
		$resultado = $this->conexion_db->query($consulta);
		if (!$resultado) {
			echo $consulta."<br>";
			return false;
			die();
		}	
	
		return true;	
	}

	public function updatePago($pago, $id){

		foreach ($pago as $column => $value){
			$consulta = "UPDATE pagos SET ". $column ."='". $value . "' WHERE id = ". $id;
			$resultado = $this->conexion_db->query($consulta);
			if (!$resultado) {
				echo $consulta."<br>";
				return false;
				die();
			}
		}
		
		return true;	
	}


	public function deletePago($pago){
		
		$consulta = "DELETE FROM pagos WHERE id = $pago";
		$resultado = $this->conexion_db->query($consulta);
		
		if (!$resultado) {
			return false;
			die();
		}
	
		return true;
	}
	
}

?>


