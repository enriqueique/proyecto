<?php
// Contenedor de consultas, conexión a la bbdd
session_start();

if (!isset($_SESSION['user'])){
    header("Location: ../../login");
}

require ("../conexion.php");

class Intranet extends Conexion {
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
		$consulta[] = "SELECT count(*) as hermanos FROM hermanos";
        $consulta[] = "SELECT count(*) as eventos FROM eventos";
		$consulta[] = "SELECT count(*) as reuniones FROM reuniones";
        $consulta[] = "SELECT count(*)as pagos FROM pagos";
        for ($i = 0; $i < 4; $i++ ){
            $resultado = $this->conexion_db->query($consulta[$i]);
            if(!$resultado){
                echo "algo esta mal.";
            }
            $datos = $resultado->fetch_all(MYSQLI_ASSOC);
            $data[] = $datos[0];
        }
		
		return $data;
	}

}
?>


