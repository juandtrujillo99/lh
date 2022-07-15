<?php
include_once 'app/config.inc.php';
include_once 'app/Conexion.inc.php';
include_once 'app/Usuario.inc.php';
include_once 'app/Admin.inc.php';
include_once 'app/RepositorioUsuario.inc.php';
include_once 'app/RepositorioAdmin.inc.php';
include_once 'app/ValidadorRegistro.inc.php';
include_once 'app/Redireccion.inc.php';
include_once 'app/ControlSesion.inc.php';

if (isset($_POST['enviar'])) {
	Conexion :: abrir_conexion();

	$validador = new ValidadorRegistroAdmin($_POST['codigo'],$_POST['nombre'], $_POST['email'], $_POST['clave1'], $_POST['clave2'], Conexion :: obtener_conexion());

	if($validador -> registro_valido()){
		$admin = new Admin('', $validador-> obtener_codigo(),
			$validador-> obtener_nombre(), 
			$validador-> obtener_email(), 
			password_hash($validador-> obtener_clave(), PASSWORD_DEFAULT), 
			'', 
			'');

		$admin_insertado = RepositorioAdmin :: insertar_admin(Conexion :: obtener_conexion(), $admin);

		if ($admin_insertado) {
			//redirigir a REGISTRO CORRECTO
			Redireccion::redirigir(RUTA_REGISTRO_CORRECTO . '/' . $admin -> obtener_nombre());
		}
	}
}

$titulo = "Registro | $nombreEmpresa";

include 'seccion/cabecera-inicio.inc.php';?>
		
		<link async='async' rel="stylesheet" href="<?php echo RUTA_CSS; ?>bootstrap.css">
		<link async='async' rel="stylesheet" href="<?php echo RUTA_CSS; ?>estilos.css">
		<link async='async' rel="stylesheet" href="<?php echo RUTA_CSS; ?>fuentes.css">
		<link async='async' rel="stylesheet" href="<?php echo RUTA_CSS; ?>mapa-nav.css">

		<script type="text/javascript" async='async'>
			function abrirMapa(){$(".ventana").slideDown("slow");}
			function cerrarMapa(){$(".ventana").slideUp("fast");}

			function abrirCompra(){$(".ventanaCompra").slideDown("fast");}
			function cerrarCompra(){$(".ventanaCompra").slideUp("fast");}
		</script>

<?php 
include 'seccion/cabecera-cierre.inc.php';
include_once 'seccion/doc-navbar.inc.php';

//en el registro solo se puede poner un formulario, es por eso, que no se adapta a moviles como lo hace el login, es decir, solo esta disponible para pc y el navegador debe hacer el trabajo de adaptarlo solo

?>
<?php //pc ?>
<div class="col-sm-12 hidden-xs">
	<div class="col-sm-12">
	    <div id="home" class="col-sm-12" style="background-image:url(img/fondos/5a.jpg);">
	    	<br><br><br>
	    	<div class="container" id="login">
	            <div class="col-sm-12" id="contenedor" align="center">
	            	<h2>Formulario de registro</h2>
	                <div class="col-sm-12">
	                    <h3>
							Para registrarte ingresa estos datos
						</h3>
						<br>
						<form role="form" method="post" class="col-sm-12" action="<?php echo RUTA_REGISTRO_ADMIN; ?>">
							<?php
							if (isset($_POST['enviar'])) {
								include 'seccion/registro_admin_validado.inc.php';
							}
							else{
								include 'seccion/registro_admin_vacio.inc.php';
							}
							?>
						</form>
	                </div>
	                <div class="col-sm-12"><br><br></div>
		            <?php
					include 'seccion/seccion-social.inc.php';
					?>				
	            </div>
	            <div class="col-sm-12"><br><br></div>
	        </div>	        
        </div>
    </div>
</div>
<?php //pc ?>

<?php //movil ?>
<div class="col-xs-12 visible-xs">
	<br><br><br>
	<div id="login">
        <div class="col-xs-12" id="contenedor-m" align="center">
        	<h2>Formulario de registro</h2>
            <div class="col-xs-12">
                <h3>
					Para registrarte ingresa estos datos
				</h3>
				<br>
				<form role="form" method="post" class="col-xs-12" action="<?php echo RUTA_REGISTRO; ?>">
					<?php
					if (isset($_POST['enviar'])) {
						include 'seccion/registro_admin_validado.inc.php';
					}
					else{
						include 'seccion/registro_admin_vacio.inc.php';
					}
					?>
				</form>
            </div>
            <div class="col-xs-12"><br><br></div>
            <?php
			include 'seccion/seccion-social.inc.php';
			?>				
        </div>
        <div class="col-xs-12"><br><br></div>
    </div>
</div>
<?php //movil ?>
<script type="text/javascript" src="<?php echo RUTA_JS; ?>jquery.js" async='async'></script>
<?php
include_once 'seccion/doc-pie.inc.php';
?>