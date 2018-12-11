<?php
session_start();
require 'conexion.php';
if (!isset($_SESSION['user'])){
    header("Location: login/");
}

Class Principal extends Conexion{
    public $rol;
    protected $user;
    
    
    public function __construct (){
        parent::__construct();
        $this->rol = $_SESSION['rol'];
        $this->user = $_SESSION['user'];
    }
    
    public function index(){
        
    }
    
    public function eventos($data = null){
        $consulta = "SELECT * from eventos";
        $resultado = $this->conexion_db->query($consulta);
        $eventos = $resultado->fetch_all(MYSQLI_ASSOC);
        
        if(isset($data['confirmar'])){
            $hermano = $data['asistencia'];
            $evento = $data['eve'];
            if($this->checkEvento($hermano, $evento) == 0 ){
                $consulta = "INSERT INTO he_ev (asistencia,evento) VALUES ($hermano, $evento)";
                $resultado = $this->conexion_db->query($consulta);
                if(!$resultado){
                    echo "error al agregarte al evento: ".$consulta;

                    die();
                }
            }
            
        }
        
        return $eventos;
        
    }
    
    public function reuniones($data = null){
        $consulta = "SELECT * from reuniones";
        $resultado = $this->conexion_db->query($consulta);
        $eventos = $resultado->fetch_all(MYSQLI_ASSOC);
        
        if(isset($data['confirmar'])){
            $hermano = $data['asistencia'];
            $reunion = $data['reu'];
            if($this->checkHermano($hermano, $reunion) == 0 ){
                $consulta = "INSERT INTO he_re (participante,reunion) VALUES ($hermano, $reunion)";
                $resultado = $this->conexion_db->query($consulta);
                if(!$resultado){
                    echo "error al agregarte a la Reunión: ".$consulta;

                    die();
                }
            }
            
        }
        
        return $eventos;
    }
    
    public function pagos($data = null){
        $consulta = "SELECT * from pagos";
        $resultado = $this->conexion_db->query($consulta);
        $pagos = $resultado->fetch_all(MYSQLI_ASSOC);
        
        if(isset($data['confirmar'])){
            $hermano = $data['asistencia'];
            $pago = $data['pag'];
            if($this->checkPago($hermano, $pago) == 0 ){
                $consulta = "INSERT INTO he_pa (hermano,pago) VALUES ($hermano, $pago)";
                $resultado = $this->conexion_db->query($consulta);
                if(!$resultado){
                    echo "error al agregarte al Pago: ".$consulta;

                    die();
                }
            }
            
        }
        
        return $pagos;
    }
    
    public function checkHermano ($hermano, $reunion){
        $consulta = "SELECT * FROM he_re WHERE participante = $hermano AND reunion = $reunion";
        $resultado = $this->conexion_db->query($consulta);
        $a = $resultado->fetch_all(MYSQLI_ASSOC);
        $count = count($a);
        
        return $count;
    }
    
        public function checkEvento ($hermano, $evento){
        $consulta = "SELECT * FROM he_ev WHERE asistencia = $hermano AND evento = $evento";
        $resultado = $this->conexion_db->query($consulta);
        $b = $resultado->fetch_all(MYSQLI_ASSOC);
        $count = count($b);
        
        return $count;
    }
    
     public function checkPago ($hermano, $pago){
        $consulta = "SELECT * FROM he_pa WHERE hermano = $hermano AND pago = $pago";
        $resultado = $this->conexion_db->query($consulta);
        $c = $resultado->fetch_all(MYSQLI_ASSOC);
        $count = count($c);
        
        return $count;
    }

}


?>