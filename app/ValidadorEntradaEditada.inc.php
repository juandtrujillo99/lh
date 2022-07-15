<?php
include_once 'RepositorioEntrada.inc.php';
include_once 'Validador.inc.php';

class ValidadorEntradaEditada extends Validador {
	private $cambios_realizados;

	private $checkbox;

	private $titulo_original;
	private $url_original;
	private $video_original;
	private $imagen_original;
	private $imagen2_original;
	private $precio_original;
	private $texto_original;
	private $checkbox_original;

	public function __construct($titulo, $titulo_original, $url, $url_original, $video, $video_original, $imagen, $imagen_original, $imagen2, $imagen2_original, $precio, $precio_original, $texto,
		$texto_original, $checkbox, $checkbox_original, $conexion) {

		$this -> titulo = $this -> devolver_variable_si_iniciada($titulo);
		$this -> url = $this -> devolver_variable_si_iniciada($url);
		$this -> video = $this -> devolver_variable_si_iniciada($video);
		$this -> imagen = $this -> devolver_variable_si_iniciada($imagen);
		$this -> imagen2 = $this -> devolver_variable_si_iniciada($imagen2);
		$this -> precio = $this -> devolver_variable_si_iniciada($precio);
		$this -> texto = $this -> devolver_variable_si_iniciada($texto);
		$this -> checkbox = $this -> devolver_variable_si_iniciada($checkbox);

		$this -> titulo_original = $this -> devolver_variable_si_iniciada($titulo_original);
		$this -> url_original = $this -> devolver_variable_si_iniciada($url_original);
		$this -> video_original = $this -> devolver_variable_si_iniciada($video_original);
		$this -> imagen_original = $this -> devolver_variable_si_iniciada($imagen_original);
		$this -> imagen2_original = $this -> devolver_variable_si_iniciada($imagen2_original);
		$this -> precio_original = $this -> devolver_variable_si_iniciada($precio_original);
		$this -> texto_original = $this -> devolver_variable_si_iniciada($texto_original);
		$this -> checkbox_original = $this -> devolver_variable_si_iniciada($checkbox_original);

		if ($this -> titulo == $this -> titulo_original &&
			$this -> url == $this -> url_original &&
			$this -> video == $this -> video_original &&
			$this -> imagen == $this -> imagen_original &&
			$this -> imagen2 == $this -> imagen2_original &&
			$this -> precio == $this -> precio_original &&
			$this -> texto == $this -> texto_original &&
			$this -> checkbox == $this -> checkbox_original) {

			$this -> cambios_realizados = false;
		} else {
			$this -> cambios_realizados = true;
		}

		if ($this -> cambios_realizados) {
			echo '<span id="notificacion" class="red badge">Se han detectado errores</span>';

			$this -> aviso_inicio = "<span class='new badge red'>";
			$this -> aviso_cierre = "</span>";

			if ($this -> titulo !== $this -> titulo_original) {
				$this -> error_titulo = $this -> validar_titulo($conexion, $this -> titulo);
			} else {
				$this -> error_titulo = "";
			}

			if ($this -> url !== $this -> url_original) {
				$this -> error_url = $this -> validar_url($conexion, $this -> url);
			} else {
				$this -> error_url = "";
			}

			if ($this -> video !== $this -> video_original) {
				$this -> error_video = $this -> validar_video($conexion, $this -> video);
			} else {
				$this -> error_video = "";
			}

			if ($this -> imagen !== $this -> imagen_original) {
				$this -> error_imagen = $this -> validar_imagen($conexion, $this -> imagen);
			} else {
				$this -> error_imagen = "";
			}

			if ($this -> imagen2 !== $this -> imagen2_original) {
				$this -> error_imagen2 = $this -> validar_imagen2($conexion, $this -> imagen2);
			} else {
				$this -> error_imagen2 = "";
			}

			if ($this -> texto !== $this -> texto_original) {
				$this -> error_texto = $this -> validar_texto($conexion, $this -> texto);
			} else {
				$this -> error_texto = "";
			}

			if ($this -> precio !== $this -> precio_original) {
				$this -> error_precio = $this -> validar_precio($conexion, $this -> precio);
			} else {
				$this -> error_precio = "";
			}

		} else {
			echo 'No hay cambios';
			//redirigir
		}
	}

	private function devolver_variable_si_iniciada($variable) {
		if ($this -> variable_iniciada($variable)) {
			return $variable;
		} else {
			return "";
		}
	}

	public function hay_cambios() {
		return $this -> cambios_realizados;
	}

	public function obtener_titulo_original() {
		return $this -> titulo_original;
	}

	public function obtener_url_original() {
		return $this -> url_original;
	}

	public function obtener_video_original() {
		return $this -> video_original;
	}

	public function obtener_imagen_original() {
		return $this -> imagen_original;
	}

	public function obtener_imagen2_original() {
		return $this -> imagen2_original;
	}

	public function obtener_precio_original() {
		return $this -> precio_original;
	}

	public function obtener_texto_original() {
		return $this -> texto_original;
	}

	public function obtener_checkbox_original() {
		return $this -> checkbox_original;
	}

	public function obtener_checkbox() {
		return $this -> checkbox;
	}
}