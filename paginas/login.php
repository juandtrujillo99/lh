<?php
include_once 'app/config.inc.php';
include_once 'app/Conexion.inc.php';
include_once 'app/RepositorioUsuario.inc.php';
include_once 'app/ValidadorLogin.inc.php';
include_once 'app/ControlSesion.inc.php';
include_once 'app/Redireccion.inc.php';

if (ControlSesion::sesion_iniciada()) {
	Redireccion::redirigir(SERVIDOR);
}


if (isset($_POST['login'])) {
	Conexion::abrir_conexion();
	$validador = new ValidadorLoginUsuario($_POST['email'], /*$_POST['clave'],*/ Conexion::obtener_conexion());

	if ($validador -> obtener_error() === '' &&
		!is_null($validador -> obtener_usuario())) {
		//iniciar sesion
		//redirigir a dashboard
		ControlSesion::iniciar_sesion(
			$validador -> obtener_usuario() -> obtener_id(),
			$validador -> obtener_usuario() -> obtener_nombre());
		Redireccion::redirigir(SERVIDOR);
		}

		Conexion::cerrar_conexion();
}


$titulo = "Inicia sesión | $nombreEmpresa";
$imagenCompartida = '<meta itemprop="image" content="'. SERVIDOR .'/img/nosotros/logo-2.jpg">';

include 'seccion/cabecera-inicio.inc.php';?>
<link async='async' rel="stylesheet" href="<?php echo RUTA_CSS; ?>estilo-menu.css">
<?php 
include 'seccion/cabecera-cierre.inc.php';
include_once 'seccion/doc-navbar.inc.php';
?>


<?php //cuerpo ?>
<div class="col-xs-12">
	<div class="col-sm-5 col-xs-12 hidden-xs" style="background-image: url(<?php echo RUTA_IMG;?>fondos/registro.jpg);background-size: cover;">
		<div class="col-xs-12" align="center">
			<div style="height: 100vh;">
				.
			</div>			
		</div>			
	</div>

	<div class="col-sm-7 col-xs-12">
		<div class="col-xs-12"><br><br></div>
		<div class="col-xs-12">
			<div class="col-xs-12 visible-xs"><br><br><br></div>
			<?php //quitar titulo <span hidden>?>
			<h1 class="texto-negrita" align="center">Iniciar sesión</h1>
			<div class="col-xs-5"></div>
			<div class="linea-decorativa col-xs-2">.</div>
			<?php //quitar titulo </span>?>
			<div class="col-xs-5"><br><br></div>

			<div class="col-xs-2"><br></div>
			<div class="col-xs-8 contacto" align="center">
			    <div class="col-xs-12">
					<br>
					<form role="form" method="post" class="col-xs-12" action="<?php echo RUTA_LOGIN; ?>">
						<p align="left">Ingresa el número con el que te registraste (sin espacios ni signos)</p>
						<input type="number" name="email" id="email" placeholder="3507043982"
						<?php
						if(isset($_POST['login']) && isset($_POST['email'])){
							echo 'value="' . $_POST['email'] . '"';
						}
						?> required autofocus >
						<br><br>
						<?php
						if(isset($_POST['login'])){
							$validador -> mostrar_error();
						}
						?>						
						<a class="btn btn-primary waves-effect waves-light" href="<?php echo RUTA_CONTACTO; ?>">Ir a registrarme</a>
						<button class="btn waves-effect waves-light" type="submit" name="login" id="boton">Entrar</button>
					</form>
			    </div>
			</div>
			<div class="col-xs-12" align="center">
				<br><br><br>
			    <?php
				include 'seccion/seccion-social.inc.php';
				?>				
			</div>
			<div class="visible-xs col-xs-1"><br><br></div>
		</div>
	</div>
</div>
<?php //cuerpo 
include_once 'seccion/doc-pie.inc.php';
?>