<?php

// Contenedor de consultas, conexión a la bbdd

require ("../../conexion.php");

class Pagos extends Conexion {
	public function __construct(){
		parent::__construct();
	}
	
	public function index(){
		$consulta = "SELECT * FROM pagos";
		$resultado = $this->conexion_db->query($consulta);
		$data = $resultado->fetch_all(MYSQLI_ASSOC);
		return $data;
	}

//funciones para sacar uno o todos los pagos

	public function show($pago){
		$buscar_pago = "SELECT * FROM pago WHERE id=".$pago;
		$resultado = $this->conexion_db->query($buscar_pago);
		$data = $resultado->fetch_all(MYSQLI_ASSOC);
		return $data;
	}

// Insertar datos.

	public function add($pago){
        
		$columns = implode("," , array_keys($pago));
		$values = "'".implode("','" , $pago)."'";
		
		$consulta = "INSERT INTO pagos ($columns) VALUES ($values)"; 
		$resultado = $this->conexion_db->query($consulta);
		if(!$resultado){
			return false;
		}	
	
		header("Location: index.php");	
	}


	public function edit($pago){

		$buscar_pago = "SELECT * FROM pagos WHERE id=".$pago;
		$resultado = $this->conexion_db->query($buscar_hermano);
		$data = $resultado->fetch_all(MYSQLI_ASSOC);
		return $data;
	}

// Funciones de actualización, edit se guarda la consulta en una variable para hacer un fetch y devolver $data
// update se le pasan la variable de datos (que lo contiene todo) y la variable id, por medio del foreach se actualizan los datos a la bbdd

	public function update($pago, $id){
		
		foreach ($pago as $column => $value){
			$consulta = "UPDATE pagos SET ". $column ."='". $value . "' WHERE id = ". $id;
			$resultado = $this->conexion_db->query($consulta);
		}
		
		header("Location: index.php");	
	}

// Elimina por medio de id

	public function delete($pago){
		
		$consulta = "DELETE FROM pagos WHERE id = $pago";
		$resultado = $this->conexion_db->query($consulta);
		
		if(!$resultado){
			return false;
		}	
	
		header("Location: index.php");	
	}
	
}

?>

