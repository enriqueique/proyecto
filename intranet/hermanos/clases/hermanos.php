<?php
// Contenedor de consultas, conexión a la bbdd
session_start();

if (!isset($_SESSION['user'])){
    header("Location: ../../login");
}

require ("../../conexion.php");

class Hermanos extends Conexion {
    protected $rol;
	public function __construct(){
		parent::__construct();
        $this->rol = $_SESSION['rol'];
        
        if($this->rol != '1' ){
            echo "No tienes permisos para acceder a esa sección";
            die();
        }
	}
	
	public function index(){
		$consulta = "SELECT * FROM hermanos";
		$resultado = $this->conexion_db->query($consulta);
		$data = $resultado->fetch_all(MYSQLI_ASSOC);
		return $data;
	}

//funciones para sacar uno o todos los hermanos

	public function show($hermano){
		$buscar_hermano = "SELECT * FROM hermanos WHERE id=".$hermano;
		$resultado = $this->conexion_db->query($buscar_hermano);
		$data = $resultado->fetch_all(MYSQLI_ASSOC);
		return $data;
	}

// Insertar datos. Para encriptar se define por defecto la pass por medio de una extensión criptográfica

	public function add($hermano){

		$hermano['password'] = password_hash($hermano['password'], PASSWORD_DEFAULT);		
		$columns = implode("," , array_keys($hermano));
		$values = "'".implode("','" , $hermano)."'";
		
		$consulta = "INSERT INTO hermanos ($columns) VALUES ($values)"; 
		$resultado = $this->conexion_db->query($consulta);
		if(!$resultado){
			return false;
		}	
	
		header("Location: index.php");	
	}


	public function edit($hermano){

		$buscar_hermano = "SELECT * FROM hermanos WHERE id=".$hermano;
		$resultado = $this->conexion_db->query($buscar_hermano);
		$data = $resultado->fetch_all(MYSQLI_ASSOC);
		return $data;
	}

// Funciones de actualización, edit se guarda la consulta en una variable para hacer un fetch y devolver $data
// update se le pasan la variable de datos (que lo contiene todo) y la variable id, por medio del foreach se actualizan los datos a la bbdd

	public function update($hermano, $id){

		$hermanoEdit = $this->edit($id);
		$hermanoPass = $hermanoEdit[0]['password'];
		if ($hermano['password'] != $hermanoPass){
			$hermano['password'] = password_hash($hermano['password'], PASSWORD_DEFAULT);
		}else {
			unset($hermano['password']);
		}

		//$hermano['password'] = password_hash($hermano['password'], PASSWORD_DEFAULT);
		
		foreach ($hermano as $column => $value){
			$consulta = "UPDATE hermanos SET ". $column ."='". $value . "' WHERE id = ". $id;
			$resultado = $this->conexion_db->query($consulta);
		}
		
		header("Location: index.php");	
	}

// Elimina por medio de id

	public function delete($hermano){
		
		$consulta = "DELETE FROM hermanos WHERE id = $hermano";
		$resultado = $this->conexion_db->query($consulta);
		
		if(!$resultado){
			return false;
		}	
	
		header("Location: index.php");	
	}
	
}

?>


