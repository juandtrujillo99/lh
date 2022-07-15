<?php
include_once 'RepositorioUsuario.inc.php';
include_once 'RepositorioAdmin.inc.php';

class ValidadorLoginUsuario{
	private $usuario;
	private $error;

	public function __construct($email, /*$clave,*/ $conexion){

		$this -> error = "";

		if (!$this -> variable_iniciada($email) /*|| !$this -> variable_iniciada($clave)*/) {
			$this -> usuario = null;
			$this -> error = "Debes introducir el número con el que hiciste el registro";
		}
		else{
			$this -> usuario = RepositorioUsuario::obtener_usuario_por_email($conexion, $email);
			if (is_null($this -> usuario) /*|| !password_verify($clave, $this -> usuario -> obtener_password())*/) {
				$this -> error = "Este número no se encuentra registrado";
			}
		}
	}

	private function variable_iniciada($variable){
		if (isset($variable) && !empty($variable)) {
			return true;			
		}
		else{
			return false;
		}
	}
	public function obtener_usuario(){
		return $this -> usuario;
	}
	public function obtener_error(){
		return $this -> error;
	}
	public function mostrar_error(){
		if ($this -> error !== '') {
			echo "<br><div class='alert alert-danger' role='alert'>";
			echo $this -> error;
			echo "</div><br>";
		}
	}
}

class ValidadorLoginAdmin{
	private $admin;
	private $error;

	public function __construct($email, $clave, $conexion){

		$this -> error = "";

		if (!$this -> variable_iniciada($email) || !$this -> variable_iniciada($clave)) {
			$this -> admin = null;
			$this -> error = "Error";
		}
		else{
			$this -> admin = RepositorioAdmin::obtener_admin_por_email($conexion, $email);
			if (is_null($this -> admin) || !password_verify($clave, $this -> admin -> obtener_password())) {
				$this -> error = "Tu sugerencia fue enviada satisfactoriamente <a href=". SERVIDOR .">ir a inicio</a>";	
			}
		}
	}

	private function variable_iniciada($variable){
		if (isset($variable) && !empty($variable)) {
			return true;			
		}
		else{
			return false;
		}
	}
	public function obtener_admin(){
		return $this -> admin;
	}
	public function obtener_error(){
		return $this -> error;
	}
	public function mostrar_error(){
		if ($this -> error !== '') {
			echo "<br><div class='notificacion' role='alert'>";
			echo $this -> error;
			echo "</div><br>";
		}
	}
}