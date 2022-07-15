<?php

include_once 'app/config.inc.php';
include_once 'app/Conexion.inc.php';
include_once 'app/Redireccion.inc.php';
include_once 'app/RepositorioUsuario.inc.php';
include_once 'app/RepositorioAdmin.inc.php';

$titulo = "Registro satisfactorio | $nombreEmpresa";

include 'seccion/cabecera-inicio.inc.php';?>		
		<link async='async' rel="stylesheet" href="<?php echo RUTA_CSS; ?>estilo-menu.css">
<?php 
include 'seccion/cabecera-cierre.inc.php';
?>

<div class="col-xs-12 iframe-registro-usuarios">
	<div class="col-xs-1"></div>
	<div class="col-xs-10">
		<br><br><br><br>
		<h1 align="center">¡Genial! Ya recibimos tus datos</h1>
		<h3>Pronto nos pondremos en contacto contigo a través de whatsapp. Pero espera, aun tenemos una pregunta más...</h3>	
		<br><br>
		<iframe src="<?php echo RUTA_ACTIVAR_NOTIFICACIONES; ?>" style="width: 100%;border: none;height: 25vh;"></iframe>
		<br>
		<div class="btn waves-effect waves-light" align="center" id="registro-correcto">
            <a href="<?php echo RUTA_REGISTRO; ?>">Volver atras</a>
		</div>
	</div>
</div>

<?php
include_once 'seccion/doc-pie.inc.php'
?>