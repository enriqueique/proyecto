<?php

require ("../../conexion/conexion.php");

class Login extends Conexion {
	public function __construct(){
		parent::__construct();
	}
	
	public function startLogin($user){

		// Verificamos si hay un usuario que existe con ese correo;
		if($checkEmail = $this->checkUser($user['email'])){

			if($this->verifyPassword($checkEmail, $user['password'])){
				// Si el usuario es el correcto creamos los parametros para la sesion y ledejamos entrar a la intranet.
				session_start();
				$_SESSION['user'] = $checkEmail->nombre;
				$_SESSION['rol'] = $checkEmail->rol;

				header("Location: ../intranet");
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

		$resultado = $this->conexion_db->query($search_user);
		// Obtenemos mediante objeto al usuario
		$user = $resultado->fetch_object();
		// Si no hay usuario
		if (count($user) == 0 ){
			return false;
		}
		// si no, devuelve los datos
		return $user;
	}

	public function verifyPassword($user, $password){
		// Verifica si la contraseña ingresada en el formulario del login coincide con el usuario obtenido de la DDBB
		if (!password_verify($password, $user->password)){
			return false;
		}
		return true;

	}
	
}

?>


