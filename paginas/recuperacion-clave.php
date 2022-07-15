<?php

include_once 'app/RepositorioRecuperacionClave.inc.php';
include_once 'app/Redireccion.inc.php';

Conexion::abrir_conexion();

if (RepositorioRecuperacionClave::url_secreta_existe(Conexion::obtener_conexion(), $url_personal)) {
	$id_usuario = RepositorioRecuperacionClave::obtener_id_usuario_mediante_url_secreta(Conexion::obtener_conexion(), $url_personal);
}
else{
	echo '404';
}

if (isset($_POST['guardar-clave'])) {
	//validar clave 1
	//validar clave 2 a ver si coincide

	$clave_cifrada = password_hash($_POST['clave'], PASSWORD_DEFAULT);
	$clave_actualizada = RepositorioUsuario::actualizar_password(Conexion::obtener_conexion(), $id_usuario, $clave_cifrada);

	//redirigir a notificacion de actualizacion correcta y ofrecer link a login

	if ($clave_actualizada) {
		Redireccion:: redirigir(RUTA_LOGIN);
	}
	else{
		//informar error
		echo 'ERROR';
	}
}

Conexion::cerrar_conexion();

$titulo = "Recuperacion de contraseña | $nombreEmpresa";

include 'seccion/cabecera-inicio.inc.php';?>
		
		<link async='async' rel="stylesheet" href="<?php echo RUTA_CSS; ?>bootstrap.css">
		<link async='async' rel="stylesheet" href="<?php echo RUTA_CSS; ?>estilos.css">
		<link async='async' rel="stylesheet" href="<?php echo RUTA_CSS; ?>fuentes.css">
		<link async='async' rel="stylesheet" href="<?php echo RUTA_CSS; ?>mapa-nav.css">
		<link async='async' rel="stylesheet" href="<?php echo RUTA_CSS; ?>estilo-menu.css">

		<script type="text/javascript" async='async'>
			function abrirMapa(){$(".ventana").slideDown("slow");}
			function cerrarMapa(){$(".ventana").slideUp("fast");}

			function abrirCompra(){$(".ventanaCompra").slideDown("fast");}
			function cerrarCompra(){$(".ventanaCompra").slideUp("fast");}
		</script>

<?php 
include 'seccion/cabecera-cierre.inc.php';
include_once 'seccion/doc-navbar.inc.php';
?>

<div class="container">
	<div class="col-md-12" id="recuperar_clave">
		<div class="col-md-2"></div>
		<div class="col-md-8" align="center">
			<br>
			<h1>Crea una nueva contraseña</h1>
			<br>
			<div class="col-md-6">
				<h2>
					Escribe tu nueva contraseña.
				</h2>
				<br>
				<form role="form" method="post" class="col-md-12" action="<?php echo RUTA_RECUPERACION_CLAVE."/".$url_personal; ?>">
					<br><br>
					<input type="password" name="clave" id="clave" placeholder="Contraseña" autofocus required <?php ?>>
					<br><br>
					<input type="password" name="clave" id="clave" placeholder="Contraseña otra vez" required>
					<br><br>
					<?php

					?>
					<button type="submit" name="guardar-clave">Restablecer</button>
				</form>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript" src="<?php echo RUTA_JS; ?>jquery.js" async='async'></script>
<?php 
include_once 'seccion/doc-pie.inc.php';
?>