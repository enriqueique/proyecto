<?php

// Crearemos un archivo llamado conexion para conectar con nuestra base de datos
require ("config.php");

class Conexion {

	protected $conexion_db;
	protected $base_url;

	public function __construct(){
		$this->base_url = URL;
		$this->conexion_db = new mysqli(HOST, USER, PASS, NAME);
		
		if ($this->conexion_db->connect_errno){
			echo "Fallo al conectar con la DDBB: ". $this->conexion_db->connect_error;
			return;
		}
		
	}

}


?>