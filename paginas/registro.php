<?php
include_once 'app/config.inc.php';
include_once 'app/Conexion.inc.php';
include_once 'app/Usuario.inc.php';
include_once 'app/RepositorioUsuario.inc.php';
include_once 'app/ValidadorRegistro.inc.php';
include_once 'app/Redireccion.inc.php';
include_once 'app/ControlSesion.inc.php';

if (isset($_POST['enviar'])) {
	Conexion :: abrir_conexion();

	$validador = new ValidadorRegistroUsuario($_POST['nombre'], $_POST['email'], Conexion :: obtener_conexion());

	if($validador -> registro_valido()){
		$usuario = new Usuario('', '',
			$validador-> obtener_nombre(), 
			$validador-> obtener_email(), 
			'',
			'', 
			'');

		$usuario_insertado = RepositorioUsuario :: insertar_usuario(Conexion :: obtener_conexion(), $usuario);

		if ($usuario_insertado) {
			//redirigir a REGISTRO CORRECTO
			Redireccion::redirigir(RUTA_REGISTRO_CORRECTO . '/' . $usuario -> obtener_nombre());
		}
	}
}

$titulo = "Registro | $nombreEmpresa";

include 'seccion/cabecera-inicio.inc.php';?>
		
		<link async='async' rel="stylesheet" href="<?php echo RUTA_CSS; ?>estilo-menu.css">


<?php 
include 'seccion/cabecera-cierre.inc.php';
?>

<?php //cuerpo ?>
<div class="col-sm-12 col-xs-12">
	<div class="col-xs-12"><br><br></div>
	<div class="col-xs-12">
		<div class="col-xs-12 visible-xs"><br><br><br></div>
		<?php //quitar titulo <span hidden>?>
		<h1 class="texto-negrita" align="center">Contáctanos</h1>
		<div class="col-xs-5"></div>
		<div class="linea-decorativa col-xs-2">.</div>
		<?php //quitar titulo </span>?>
		<div class="col-xs-5"><br><br></div>

		<div class="col-xs-2"><br></div>
		<div class="col-xs-8 contacto" align="center">
			<h2>¡Ingresa tus datos y podrás ganarte un bono de descuento del 30%!</h2>
		    <div class="col-xs-12">
				<br>
				<form role="form" method="post" class="col-xs-12" action="<?php echo RUTA_REGISTRO; ?>">
					<?php
					if (isset($_POST['enviar'])) {
						include 'seccion/registro_validado.inc.php';
					}
					else{
						include 'seccion/registro_vacio.inc.php';
					}
					?>
					<button class="btn waves-effect waves-light" type="submit" id="boton" name="enviar">Registrar</button>
				</form>
		    </div>
		    <div class="col-xs-12">
		    	<br><br>
		    	<h3>Términos y condiciones</h3>
				<p>
					Por compras mayores a $20.000 COP.
					<br>
					Los bonos y sus porcentajes serán entregadas de manera aleatoria periodicamente.
				</p>
				<br><br>
			</div>
		</div>
		<div class="col-xs-12 " align="center">
		    <?php
			include 'seccion/seccion-social.inc.php';
			?>				
		</div>
		<div class="visible-xs col-xs-1"><br><br></div>
	</div>
</div>

<?php //cuerpo
//en el registro solo se puede poner un formulario, es por eso, que no se adapta a moviles como lo hace el login, es decir, solo esta disponible para pc y el navegador debe hacer el trabajo de adaptarlo solo

include_once 'seccion/doc-pie.inc.php';
?>