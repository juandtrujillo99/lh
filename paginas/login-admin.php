<?php
include_once 'app/config.inc.php';
include_once 'app/Conexion.inc.php';
include_once 'app/RepositorioAdmin.inc.php';
include_once 'app/ValidadorLogin.inc.php';
include_once 'app/ControlSesion.inc.php';
include_once 'app/ControlSesionAdmin.inc.php';
include_once 'app/Redireccion.inc.php';

if (ControlSesionAdmin::sesion_iniciada()) {
	Redireccion::redirigir(RUTA_PERFIL_ADMIN);
}


if (isset($_POST['login'])) {
	Conexion::abrir_conexion();
	$validador = new ValidadorLoginAdmin($_POST['email'], $_POST['clave'], Conexion::obtener_conexion());

	if ($validador -> obtener_error() === '' &&
		!is_null($validador -> obtener_admin())) {
		//iniciar sesion
		//redirigir a dashboard
		ControlSesionAdmin::iniciar_sesion(
			$validador -> obtener_admin() -> obtener_id(),
			$validador -> obtener_admin() -> obtener_nombre());
		Redireccion::redirigir(RUTA_PERFIL_ADMIN);
		}

		Conexion::cerrar_conexion();
}


$titulo = "página no encontrada $nombreEmpresa";

include 'seccion/cabecera-inicio.inc.php';?>
        
        <link async='async' rel="stylesheet" href="<?php echo RUTA_CSS; ?>estilo-menu.css">

<?php 
include 'seccion/cabecera-cierre.inc.php';
include_once 'seccion/doc-navbar.inc.php';
?>



<div class="col-sm-12" id="busqueda">
	<span class="visible-xs"><br><br><br></span>
    <div class="col-sm-1"></div>
    <div class="col-sm-10"><br><br>
    	<span class="visible-xs"><br><br></span>
        <h1 class="texto-negrita" align="center">No encontramos la página que buscas</h1>
        <div class="col-sm-5"></div>
        <div class="linea-decorativa col-sm-2">.</div>
        <div class="col-sm-5"></div>
        <span class="visible-xs col-xs-1"><br><br><br></span>
        <div class="col-sm-12 col-xs-10"><br><br><br>
			<div class="col-sm-2"></div>
			<div class="col-sm-8 cuadro-contenedor">	
				<p>
					No hay ningún producto que corresponda a tu búsqueda.
					<br>
					Intenta buscar nuevamente o regresa al inicio haciendo clic en el botón de abajo.
				</p>
			</div>
			<div class="col-sm-2"></div>
			<div class="col-sm-12 volver" align="center">
				<br><br>
				<a href="<?php echo SERVIDOR; ?>">&larr; Volver a inicio</a>
				<br><br><br>
			</div>
		</div>
	</div>
</div>


<div class="col-xs-12 col-sm-12" align="center" id="hic-salis">
	<div class="col-sm-1 col-xs-1"></div>
	<div class="col-xs-10 col-sm-10" id="formulario">
		<h4>Informar de un error enviar mis datos y sugerencia</h4>
		<form role="form" method="post" class="col-sm-12" action="<?php echo RUTA_LOGIN_ADMIN; ?>">
			<input type="email" name="email" id="email" placeholder="Correo" required >
			<input type="password" name="clave" id="clave" placeholder="Contraseña" required>
			<?php
			if(isset($_POST['login'])){
				$validador -> mostrar_error();
			}
			?>
			<input type="text" name="sugerencia" id="sugerencia" placeholder="Escribe tu sugerencia">
			<button type="submit" name="login" id="boton-login">Enviar</button>
			<a href="<?php echo RUTA_REGISTRO; ?>"><button id="boton-login">Registrarse</button></a>
		</form>
    </div>
</div>
<div class="col-sm-12">
    <div class="col-sm-1"></div>
    <div class="col-sm-10">
        <?php include_once 'seccion/footer.inc.php'; ?>
    </div>
</div>
<?php
include_once 'seccion/doc-pie.inc.php';
?>