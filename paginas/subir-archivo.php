<?php
header("Expires: Tue, 01 Jan 2000 00:00:00 GMT");
header("Last-Modified: ". gmdate("D, d M Y H:i:s") . " GMT");
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");

include_once 'app/Conexion.inc.php';
include_once 'app/RepositorioUsuario.inc.php';
include_once 'app/ControlSesion.inc.php';
include_once 'app/Redireccion.inc.php';


$titulo = "Subir Archivo | $nombreEmpresa";

include 'seccion/cabecera-inicio.inc.php';
//poner debajo de esta linea, todas herramientas necesarias para cargar correctamente el sitio
?>      
        <link async='async' rel="stylesheet" href="<?php echo RUTA_CSS; ?>bootstrap.css">
        <link async='async' rel="stylesheet" href="<?php echo RUTA_CSS; ?>estilos.css">
        <link async='async' rel="stylesheet" href="<?php echo RUTA_CSS; ?>efecto-imagen.css">
        <link async='async' rel="stylesheet" href="<?php echo RUTA_CSS; ?>fuentes.css">
        <link async='async' rel="stylesheet" href="<?php echo RUTA_CSS; ?>mapa-nav.css">
        <link async='async' rel="stylesheet" href="<?php echo RUTA_CSS; ?>recortar-imagen.min.css">
        <?php 
		//script que sube las imagenes de las entradas
		include_once 'scripts/barra-progreso.php';
		?>

        <script type="text/javascript" async='async'>
            function abrirMapa(){$(".ventana").slideDown("slow");}
            function cerrarMapa(){$(".ventana").slideUp("fast");}

            function abrirCompra(){$(".ventanaCompra").slideDown("fast");}
            function cerrarCompra(){$(".ventanaCompra").slideUp("fast");}
        </script> 

<?php 
//no olvides cerra la cabecera con este codigo
include 'seccion/cabecera-cierre.inc.php';


if(!ControlSesion :: sesion_iniciada()) {
	Redireccion :: redirigir(SERVIDOR);
} 
else {
		Conexion :: abrir_conexion();
		$id = $_SESSION['id_usuario'];
		$usuario = RepositorioUsuario :: obtener_usuario_por_id(Conexion::obtener_conexion(), $id);
}
?>

<div class="col-sm-12">
	<div class="col-sm-12"> 
		<div class="container" style="margin-top: 4em;">
			<div class="col-sm-12">
				<div class="col-sm-1"></div>
				<div class="col-sm-10" id="img" align="center">
				<a href="#" target="_blank" class="col-sm-1 visible-sm visible-xs" title="Abrir en una nueva ventana"><i class="fas fa-external-link-alt"></i></a>
					<div class="col-sm-3" align="center">						
						<form id="upload_form" enctype="multipart/form-data" method="post">
							<br><br>
							<label for="file1" id="label-archivo">Seleccionar Archivo</label>
							<input type="file" name="file1" id="file1" class="boton_subir">

							<input type="button" value="Subir Archivo" name="guardar_imagen" id="guardar_imagen" onclick="subirArchivo()">
							<progress id="progressBar" class="barra-progreso" value="0" max="100" style="width:80%;height: 0.5em;"></progress>
							<h3 id="status"></h3>
						</form>						
					</div>
					<div class="col-sm-1"></div>
					<div class="col-sm-6" align="center">						
						<h2>Estos son todos los archivos que hay en el servidor</h2>					
						<br><br>
					</div>
					
					<div class="col-sm-12">
						<h5>Orden de los archivos (A-Z)</h5>
						<a href=""><input type="button" id="label-archivo" value="Recargar página para buscar archivo"></a>						
						<?php
						include_once 'app/MostrarArchivos.inc.php';					
						?>
					</div>
				</div>
			</div>			
		</div>
	</div>
</div>

<?php
include_once 'seccion/doc-pie.inc.php';
