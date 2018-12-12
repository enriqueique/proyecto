<?php

require ("../conexion.php");

class Login extends Conexion {
	public function __construct(){
		parent::__construct();
	}
	
	public function startLogin($user){

		// Verificamos si hay un usuario que existe con ese correo;
		if($checkEmail = $this->checkUser($user['email'])){
			// si existe comprobamos su  contraseña
			if($this->verifyPassword($checkEmail, $user['password'])){
				// Si el usuario es el correcto creamos los parametros para la sesion y ledejamos entrar a la intranet.
				session_start();
                $_SESSION['userId'] = $checkEmail->id;
				$_SESSION['user'] = $checkEmail->nombre;
				$_SESSION['rol'] = $checkEmail->rol;

				header("Location: ../");
			}else{
				// Si la contraseña es erronea notifica al usuario
				return "La <strong>contraseña</strong> es incorrecta.";
			}
		// Si no encuentra un registro con ese correo avisa al usuario
		}else{
			return "El correo no existe.";
		}

	}

	public function endLogin(){
		session_start();
		session_destroy();

		header("Location: index.php");
	}

	public function checkUser($email){
		// Realiza la busqueda del usuario mediante su correo electrónico
		$search_user = "SELECT * FROM hermanos WHERE email = '$email' LIMIT 1";
		// Ejecutamos la consulta
		$resultado = $this->conexion_db->query($search_user);
		// Obtenemos mediante objeto al usuario
		$user = $resultado->fetch_object();
		// Si al contar el registro nos da 0 quiere decir que no hay ningún usuario con ese correo
		if (count($user) == 0 ){
			return false;
		}
		// de lo contrario devuelve los datos de dicho usuario
		return $user;
	}

	public function verifyPassword($user, $password){
		// Verifica si la contraseña ingresada en el formulario del login coincide con el usuario obtenido de la DDBB
		if (!password_verify($password, $user->password)){
			return false;
		}
		return true;

	}

	public function register($hermano){

		$hermano['password'] = password_hash($hermano['password'], PASSWORD_DEFAULT);		
		$columns = implode("," , array_keys($hermano));
		$values = "'".implode("','" , $hermano)."'";
		
        if($this->checkUser($hermano['email']) == false){
            $consulta = "INSERT INTO hermanos ($columns) VALUES ($values)"; 
            $resultado = $this->conexion_db->query($consulta);
            
            if(!$resultado){
                return false;
            }
            session_start();
            $_SESSION['userId'] = $this->conexion_db->insert_id;
            $_SESSION['user'] = $hermano['nombre'];
            $_SESSION['rol'] = 3;
        
            header("Location: ../");

        }else{
            
            return "El email ya existe en nuestra base de datos, escribe otro.";
            
        }
	
	}

	
}


?>


