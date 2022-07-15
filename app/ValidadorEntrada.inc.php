<?php
include_once 'RepositorioEntrada.inc.php';
include_once 'Validador.inc.php';

class ValidadorEntrada extends Validador {
	
	public function __construct($titulo, $url, $video, $imagen, $imagen2, $precio, $texto, $conexion) {
		$this -> aviso_inicio = "<span class='new badge red'>";
		$this -> aviso_cierre = "</span>";
		
		$this -> titulo = "";
		$this -> url = "";
		$this -> video = "";
		$this -> imagen = "";
		$this -> imagen2 = "";
		$this -> precio = "";
		$this -> texto = "";
		
		$this -> error_titulo = $this -> validar_titulo($conexion, $titulo);
		$this -> error_url = $this -> validar_url($conexion, $url);
		$this -> error_video = $this -> validar_video($conexion, $video);
		$this -> error_imagen = $this -> validar_imagen($conexion, $imagen);
		$this -> error_imagen2 = $this -> validar_imagen2($conexion, $imagen2);
		$this -> error_precio = $this -> validar_precio($conexion, $precio);
		$this -> error_texto = $this -> validar_texto($conexion, $texto);
	}
}