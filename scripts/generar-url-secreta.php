<?php

include_once 'app/config.inc.php';
include_once 'app/Conexion.inc.php';

include_once 'app/Usuario.inc.php';
include_once 'app/RecuperacionClave.inc.php';

include_once 'app/RepositorioUsuario.inc.php';
include_once 'app/RepositorioRecuperacionClave.inc.php';

include_once 'app/Redireccion.inc.php';


function sa($longitud){
	$caracteres = '0123456789abcdefghijklmnopqrstcvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
	$numero_caracteres = strlen($caracteres);
	$string_aleatorio = '';

	for ($i = 0; $i < $longitud; $i++) { 
		$string_aleatorio .= $caracteres[rand(0, $numero_caracteres - 1)];
	}
	return $string_aleatorio;

}

if (isset($_POST['enviar_email'])) {
	$email = $_POST['email'];

	Conexion::abrir_conexion();

	if (!RepositorioUsuario :: email_existe(Conexion :: obtener_conexion(), $email)) {
		return;
	}

	$usuario = RepositorioUsuario :: obtener_usuario_por_email(Conexion :: obtener_conexion(), $email);

	$nombre_usuario = $usuario -> obtener_nombre();
	$string_aleatorio = sa(10);

	$url_secreta = hash('sha256', $string_aleatorio . $nombre_usuario);

	$peticion_generada = RepositorioRecuperacionClave :: generar_peticion(Conexion :: obtener_conexion(), $usuario -> obtener_id(), $url_secreta);

	$destinatario = $email;
	$asunto = "prueba de email";
	$mensaje = "Darelabs" . PHP_EOL . 
				"Recientemente nos dimos cuenta de que solicitaste un restablecimiento de contraseña." . PHP_EOL .
				"Pulsa para continuar." . PHP_EOL .
				"Si no fuiste tú ignora o elimina este mensaje." . PHP_EOL .
				"<a href=" . '"' .
				SERVIDOR . "/" . $url_secreta  . '"' . ' style="text-decoration: none;border-radius: 10px;padding: 1em;background-color:#c9c9c9;color:#2b2b2b;">'.
	    		"CONTINUAR".
	    		"</a>";

	$exito = mail($destinatario, $asunto, $mensaje);

	if ($exito) {
		echo 'email enviado';
	} else {
		echo 'envio fallido';
	} 

	Conexion :: cerrar_conexion();

	if ($peticion_generada) {
		Redireccion :: redirigir(RUTA_LOGIN);
	}

}