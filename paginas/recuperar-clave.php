<?php

$titulo = "Recupera tu contraseña | $nombreEmpresa";

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

<div class="col-sm-12">
	<div class="col-sm-12" id="pc">
	    <!-- cuerpo -->
	    <div id="home" class="col-sm-12" style="background-image:url(img/fondos/fondo-passforgot.jpg);">
	    	<br><br><br>
	    	<div class="container" id="recuperar_clave">
            <div class="col-sm-12" id="formulario">
            	<h1>Recupera tu contraseña</h1>
                <div class="col-sm-12">
                    <h3>Paso 1</h3>
					<p>Notificale a Darelabs que olvidaste tu contraseña</p>
					<a target="_blank" href="<?php echo $olvidePassword;?>" class="cuadro-boton1"><i class="fab fa-whatsapp"></i> Notificar</a>
					<h3>Paso 2</h3>
					<p>En el siguiente cuadro escribe el correo electrónico con el que te registraste para restablecer tu contraseña</p>
					<form role="form" method="post" class="col-sm-12" action="<?php echo RUTA_GENERAR_URL_SECRETA; ?>">
						<input type="email" name="email" id="email" placeholder="Correo" required autofocus >
						<br><br>
						<button class="cuadro-boton1" type="submit" name="enviar_email">Enviar</button>
					</form>
                </div>			
            </div>
        </div>
        </div>
    </div>
</div>
<script type="text/javascript" src="<?php echo RUTA_JS; ?>jquery.js" async='async'></script>
<?php
include_once 'seccion/doc-pie.inc.php';
?>