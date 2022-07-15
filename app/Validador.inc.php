<?php

abstract class Validador {

	protected $aviso_inicio;
	protected $aviso_cierre;

	protected $titulo;
	protected $url;
	protected $video;
	protected $imagen;
	protected $imagen2;
	protected $precio;
	protected $texto;

	protected $error_titulo;
	protected $error_url;
	protected $error_video;
	protected $error_imagen;
	protected $error_imagen2;
	protected $error_precio;
	protected $error_texto;


	function __construct(){
	}


	protected function variable_iniciada($variable){
		if (isset($variable) && !empty($variable)) {
			return true;
		}
		else{
			return false;
		}
	}

	protected function validar_titulo($conexion, $titulo){
		if (!$this -> variable_iniciada($titulo)) {
			return "Olvidaste el título?";
		}
		else{
			$this -> titulo = $titulo;
		}

		if (strlen($titulo) >255) {
			return "Ese título esta muy largo, !Cambialo¡";
		}

		if (RepositorioEntrada :: titulo_existe($conexion, $titulo)) {
			return "Ya existe una entrada con ese titulo, escoge uno diferente";
		}
	}

	protected function validar_url($conexion, $url){
		if (!$this -> variable_iniciada($url)) {
			return "Inserta la url con la que quieres que aparezca tu entrada, sin espacios ni caracteres especiales";
		}
		else{
			$this -> url = $url;
		}

		$url_tratada = str_replace(' ', '', $url);
		$url_tratada = preg_replace('/\s+/', '', $url_tratada);


		if (strlen($url) != strlen($url_tratada)) {
			return "La URL no puede contener espacios vacios, separalos con guiones (-)";
		}
		if (RepositorioEntrada :: url_existe($conexion, $url)) {
			return "Esa URL ya fue elegida, escoge otra";
		}

	}
	protected function validar_video($conexion, $video){
		$this -> video = $video;
		
		$video_tratada = str_replace('"', '"', $video);
		$video_tratada = preg_replace('/\s+/', '', $video_tratada);
		

	}
	protected function validar_imagen($conexion, $imagen){
		if (!$this -> variable_iniciada($imagen)) {
			return "Este cuadro no puede estar vacio";
		}
		else{
			$this -> imagen = $imagen;
		}
	}

	protected function validar_imagen2($conexion, $imagen2){
	
		$imagen2_tratada = str_replace(' ', '', $imagen2);
		$imagen2_tratada = preg_replace('/\s+/', '', $imagen2_tratada);


		if (strlen($imagen2) != strlen($imagen2_tratada)) {
			return "El nombre no puede tener espacios vacios, asegurate de que este bien copiado";
		}
	}

	protected function validar_texto($conexion, $texto){
		if (!$this -> variable_iniciada($texto)) {
			return "Este cuadro no puede estar vacio";
		}
		else{
			$this -> texto = $texto;
		}
	}

	protected function validar_precio($conexion, $precio){
		if (!$this -> variable_iniciada($precio)) {
			return "Este cuadro no puede estar vacio";
		}
		else{
			$this -> precio = $precio;
		}
	}
	


	public function obtener_titulo(){
		return $this -> titulo;
	}
	public function obtener_url(){
		return $this -> url;
	}
	public function obtener_video(){
		return $this -> video;
	}
	public function obtener_imagen(){
		return $this -> imagen;
	}
	public function obtener_imagen2(){
		return $this -> imagen2;
	}
	public function obtener_precio(){
		return $this -> precio;
	}
	public function obtener_texto(){
		return $this -> texto;
	}





	public function mostrar_titulo(){
		if ($this -> titulo != "") {
			echo 'value = "' . $this -> titulo . '"';
		}
	}
	public function mostrar_url(){
		if ($this -> url != "") {
			echo 'value = "' . $this -> url . '"';
		}
	}
	public function mostrar_video(){
		if ($this -> video != "") {
			echo 'value = "' . $this -> video . '"';
		}
	}
	public function mostrar_imagen(){
		if ($this -> imagen != "") {
			echo 'value = "' . $this -> imagen . '"';
		}
	}
	public function mostrar_imagen2(){
		if ($this -> imagen2 != "") {
			echo 'value = "' . $this -> imagen2 . '"';
		}
	}
	public function mostrar_precio(){
		if ($this -> precio != "" && strlen($this -> precio) > 0) {
			echo $this -> precio;
		}
	}
	public function mostrar_texto(){
		if ($this -> texto != "" && strlen($this -> texto) > 0) {
			echo $this -> texto;
		}
	}

	

	public function mostrar_error_titulo(){
		if ($this -> error_titulo != "") {
			echo $this -> aviso_inicio . $this -> error_titulo . $this -> aviso_cierre;
		}
	}
	public function mostrar_error_url(){
		if ($this -> error_url != "") {
			echo $this -> aviso_inicio . $this -> error_url . $this -> aviso_cierre;
		}
	}
	public function mostrar_error_video(){
		if ($this -> error_video != "") {
			echo $this -> aviso_inicio . $this -> error_video . $this -> aviso_cierre;
		}
	}
	public function mostrar_error_imagen(){
		if ($this -> error_imagen != "") {
			echo $this -> aviso_inicio . $this -> error_imagen . $this -> aviso_cierre;
		}
	}
	public function mostrar_error_imagen2(){
		if ($this -> error_imagen2 != "") {
			echo $this -> aviso_inicio . $this -> error_imagen2 . $this -> aviso_cierre;
		}
	}
	public function mostrar_error_precio(){
		if ($this -> error_precio != "") {
			echo $this -> aviso_inicio . $this -> error_precio . $this -> aviso_cierre;
		}
	}
	public function mostrar_error_texto(){
		if ($this -> error_texto != "") {
			echo $this -> aviso_inicio . $this -> error_texto . $this -> aviso_cierre;
		}
	}
	public function entrada_valida(){
		if ($this -> error_titulo == "" && $this -> error_url == "" && $this -> error_video == "" && $this -> error_imagen == "" && $this -> error_imagen2 == "" && $this -> error_precio == "" && $this -> error_texto == "") {
			return true;
		}
		else {
			return false;
		}
	}

}