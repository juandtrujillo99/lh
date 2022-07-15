<?php

include_once 'RepositorioUsuario.inc.php';
include_once 'RepositorioAdmin.inc.php';

class ValidadorRegistroUsuario{

	private $aviso_inicio;
	private $aviso_cierre;
 
	private $nombre;
	private $email; 

	private $error_nombre;
	private $error_email; 

	public function __construct( $nombre, $email, $conexion){
		$this -> aviso_inicio = "<br><div class='alert alert-danger' role='alert'>";
		$this -> aviso_cierre = "</div>";

 
		$this -> nombre = "";
		$this -> email = ""; 
 
		$this -> error_nombre = $this -> validar_nombre($conexion, $nombre);
		$this -> error_email = $this -> validar_email($conexion, $email); 
		 
	}

	private function variable_iniciada($variable){
		if (isset($variable) && !empty($variable)) {
			return true;			
		}
		else{
			return false;
		}
	}
 

	private function validar_nombre($conexion, $nombre){
		if (!$this -> variable_iniciada($nombre)) {
			return "Escribe tu nombre.";
		}
		else{
			$this -> nombre = str_replace(" ", " ", $nombre);//aqui es donde se almacena el nombre de usuario
		}
		if (strlen($nombre) < 1) {
			return "El nombre no es valido";
		}
		if (strlen($nombre) > 24) {
			return "El nombre no puede ser más largo que 24 caracteres.";
		}

		return "";
	}

/*por pereza esto se quedo como email cuando deberia ser numero telefonico*/
	private function validar_email($conexion, $email){
		if(!$this -> variable_iniciada($email)){
			return "Ingresa tu teléfono.";
		}		
		if ($email <= 1111111) {
			return "¿En serio? Ingresa un número valido";
		}
		if ($email >= 999999999999) {
			return "¿En serio? Ingresa un número valido";
		}
		else {
			$this -> email = $email;
		}
		if (RepositorioUsuario :: email_existe($conexion, $email)) {
			return "Este teléfono ya fue ingresado.";
		}

		return "";
	}
 
	public function obtener_nombre(){
		return $this -> nombre;
	}
	public function obtener_email(){
		return $this -> email;
	}
	public function obtener_error_nombre(){
		return $this -> error_nombre;
	}
	public function obtener_error_email(){
		return $this -> error_email;
	}
	
	public function mostrar_nombre(){
		if ($this -> nombre !== "") {
			echo 'value="'. $this -> nombre . '"';
		}
	}
	public function mostrar_error_nombre(){
		if ($this -> error_nombre !== "") {
			echo $this -> aviso_inicio . $this -> error_nombre . $this -> aviso_cierre;
		}
	} 
	public function mostrar_email(){
		if ($this -> email !== "") {
			echo 'value="'. $this -> email . '"';
		}
	}
	public function mostrar_error_email(){
		if ($this -> error_email !== "") {
			echo $this -> aviso_inicio . $this -> error_email . $this -> aviso_cierre;
		}
	}
	public function registro_valido(){
		if ($this -> error_nombre === "" &&
			$this -> error_email === "") {
			return true;			
		}
		else{
			return false;
		}
	}
}


class ValidadorRegistroAdmin{

	private $aviso_inicio;
	private $aviso_cierre;

	private $codigo;
	private $nombre;
	private $email;
	private $clave;

	private $error_nombre;
	private $error_email;
	private $error_clave1;
	private $error_clave2;

	public function __construct($codigo, $nombre, $email, $clave1, $clave2, $conexion){
		$this -> aviso_inicio = "<br><div class='alert alert-danger' role='alert'>";
		$this -> aviso_cierre = "</div>";


		$this -> codigo = "";
		$this -> nombre = "";
		$this -> email = "";
		$this -> clave = "";

		$this -> error_codigo = $this -> validar_codigo($conexion, $codigo);
		$this -> error_nombre = $this -> validar_nombre($conexion, $nombre);
		$this -> error_email = $this -> validar_email($conexion, $email);
		$this -> error_clave1 = $this -> validar_clave1($clave1);
		$this -> error_clave2 = $this -> validar_clave2($clave1, $clave2);

		if ($this -> error_clave1 === "" && $this -> error_clave2 === "") {
			$this -> clave = $clave1;
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

	private function validar_codigo($conexion, $codigo){
		if (!$this -> variable_iniciada($codigo)) {
			return "Escribe tu código de ingreso.";
		}
		else{
			$this -> codigo = str_replace(" ", "", $codigo);//aqui es donde se almacena el codigo del admin
		}
		if (strlen($codigo) < 3) {
			return "El código debe tener 4 números como mínimo.";
		}
		if (strlen($codigo) > 24) {
			return "El código superar 15 caracteres.";
		}

		if (RepositorioAdmin :: codigo_existe($conexion, $codigo)) {
			return "Código no disponible";
		}

		return "";
	}


	private function validar_nombre($conexion, $nombre){
		if (!$this -> variable_iniciada($nombre)) {
			return "Escribe un nombre de admin.";
		}
		else{
			$this -> nombre = str_replace(" ", " ", $nombre);//aqui es donde se almacena el nombre de admin
		}
		if (strlen($nombre) < 6) {
			return "El nombre debe ser más largo que 6 caracteres.";
		}
		if (strlen($nombre) > 24) {
			return "El nombre no puede ser más largo que 24 caracteres.";
		}

		if (RepositorioAdmin :: nombre_existe($conexion, $nombre)) {
			return "Nombre de admin no disponible";
		}

		return "";
	}

	private function validar_email($conexion, $email){
		if(!$this -> variable_iniciada($email)){
			return "Ingresa tu teléfono.";
		}
		else {
			$this -> email = $email;
		}

		if (RepositorioAdmin :: email_existe($conexion, $email)) {
			return "Este teléfono ya fue ingresado.";
		}

		return "";
	}

	private function validar_clave1($clave1){
		if(!$this -> variable_iniciada($clave1)){
			return "Agrega una contraseña valida.";
		}
		return "";
	}

	private function validar_clave2($clave1, $clave2){
		if (!$this -> variable_iniciada($clave1)) {
			return "Primero debes rellenar la contraseña.";
		}


		if(!$this -> variable_iniciada($clave2)){
			return "Las contraseñas no coinciden.";
		}

		if($clave1 !== $clave2){
			return "Las contraseñas deben coincidir.";
		}
		return "";
	}
	public function obtener_nombre(){
		return $this -> nombre;
	}
	public function obtener_codigo(){
		return $this -> codigo;
	}
	public function obtener_email(){
		return $this -> email;
	}
	public function obtener_clave(){
		return $this -> clave;
	}
	public function obtener_error_nombre(){
		return $this -> error_nombre;
	}
	public function obtener_error_codigo(){
		return $this -> error_nombre;
	}
	public function obtener_error_email(){
		return $this -> error_email;
	}
	public function obtener_error_clave1(){
		return $this -> error_clave1;
	}
	public function obtener_error_clave2(){
		return $this -> error_clave2;
	}
	
	public function mostrar_nombre(){
		if ($this -> nombre !== "") {
			echo 'value="'. $this -> nombre . '"';
		}
	}
	public function mostrar_error_nombre(){
		if ($this -> error_nombre !== "") {
			echo $this -> aviso_inicio . $this -> error_nombre . $this -> aviso_cierre;
		}
	}
	public function mostrar_codigo(){
		if ($this -> codigo !== "") {
			echo 'value="'. $this -> codigo . '"';
		}
	}
	public function mostrar_error_codigo(){
		if ($this -> error_codigo !== "") {
			echo $this -> aviso_inicio . $this -> error_codigo . $this -> aviso_cierre;
		}
	}
	public function mostrar_email(){
		if ($this -> email !== "") {
			echo 'value="'. $this -> email . '"';
		}
	}
	public function mostrar_error_email(){
		if ($this -> error_email !== "") {
			echo $this -> aviso_inicio . $this -> error_email . $this -> aviso_cierre;
		}
	}
	public function mostrar_error_clave1(){
		if ($this -> error_clave1 !== "") {
			echo $this -> aviso_inicio . $this -> error_clave1 . $this -> aviso_cierre;
		}
	}
	public function mostrar_error_clave2(){
		if ($this -> error_clave2 !== "") {
			echo $this -> aviso_inicio . $this -> error_clave2 . $this -> aviso_cierre;
		}
	}
	public function registro_valido(){
		if ($this -> error_codigo === "" &&
			$this -> error_nombre === "" &&
			$this -> error_email === "" &&
			$this -> error_clave1 === "" &&
			$this -> error_clave2 === "") {
			return true;			
		}
		else{
			return false;
		}
	}
}