<?php
header("Expires: Tue, 01 Jan 2000 00:00:00 GMT");
header("Last-Modified: ". gmdate("D, d M Y H:i:s") . " GMT");
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");

include_once 'app/Conexion.inc.php';
include_once 'app/RepositorioAdmin.inc.php';
include_once 'app/ControlSesion.inc.php';
include_once 'app/ControlSesionAdmin.inc.php';
include_once 'app/Redireccion.inc.php';


if (!ControlSesionAdmin::sesion_iniciada()) {
	Redireccion::redirigir(RUTA_LOGIN_ADMIN);	
}else {
	Conexion :: abrir_conexion();
	$id = $_SESSION['id_admin'];
	$admin = RepositorioAdmin :: obtener_admin_por_id(Conexion::obtener_conexion(), $id);
}


$titulo = "Administración | $nombreEmpresa";

include 'seccion/cabecera-inicio.inc.php';
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

	<div class="col-sm-7 col-xs-12" id="perfil" align="center">
		<div class="col-xs-12"><br><br></div>
		<div class="col-xs-12">
			<div class="col-xs-12 visible-xs"><br><br><br></div>
			<?php //quitar titulo <span hidden>?>
			<h1 class="texto-negrita">Administración</h1>
			<div class="col-xs-5"></div>
			<div class="linea-decorativa col-xs-2">.</div>
			<?php //quitar titulo </span>?>
			<div class="col-xs-5"><br><br></div>

			<?php if(ControlSesion::sesion_iniciada()) {
			?>
			<div class="col-xs-6">
				<h4><small>Nombre de admin</small></h4>
				<p><?php echo $admin -> obtener_nombre(); ?></p>
			</div>
			<div class="col-xs-6">
				<h4><small>Nombre de usuario</small></h4>
				<p><?php echo $usuario -> obtener_nombre(); ?></p>
				<p><?php echo $usuario -> obtener_email(); ?></p>	
			</div>
			<div class="col-xs-12">
				<h4><small>Correo electrónico</small></h4>
				<p><?php echo $admin -> obtener_email(); ?></p>
				<br><br>	
			</div>
			<?php
			}else{
			?>
			<div class="col-xs-4">
				<h4><small>Nombre de admin</small></h4>
				<p><?php echo $admin -> obtener_nombre(); ?></p>
			</div>
			<div class="col-xs-8">
				<h4><small>Correo electrónico</small></h4>
				<p><?php echo $admin -> obtener_email(); ?></p>
				<br><br>	
			</div>
			<?php
			}
			?>

			<div class="col-xs-12 info">
			<?php if(!ControlSesion::sesion_iniciada()) {
				?>
				<h4>Tu usuario no ha iniciado sesión</h4>
				<a class="btn" href="<?php echo RUTA_LOGIN; ?>">Iniciar Sesión</a>
				<br><br><br>
			<?php
			}
			?>					
				<a class="btn btn-success" href="<?php echo RUTA_LOGOUT; ?>">Cerrar Sesión</a>
				<a class="btn btn-success" href="<?php echo DESCARGAR_BD; ?>">Descargar Base de Datos</a>
				<a class="btn btn-success" href="<?php echo RUTA_SUBIR_ARCHIVO; ?>">Subir archivo al servidor</a>				
				<br><br>
				<h4>STOCK</h4>
				<a class="btn btn-success" href="<?php echo RUTA_GESTOR_ENTRADAS;?>">Gestor de entradas</a>
				<a class="btn btn-success" href="<?php echo RUTA_NUEVA_ENTRADA;?>">Nueva entrada</a>
			</div>
			<div class="col-xs-12">
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
