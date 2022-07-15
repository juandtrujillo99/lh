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


$titulo = "Mi perfil | $nombreEmpresa";

include 'seccion/cabecera-inicio.inc.php';
?>
<link async='async' rel="stylesheet" href="<?php echo RUTA_CSS; ?>estilo-menu.css">
<?php
include 'seccion/cabecera-cierre.inc.php';
?>
<!-- Load Facebook SDK for JavaScript -->
      <div id="fb-root"></div>
      <script>
        window.fbAsyncInit = function() {
          FB.init({
            xfbml            : true,
            version          : 'v6.0'
          });
        };

        (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = 'https://connect.facebook.net/es_LA/sdk/xfbml.customerchat.js';
        fjs.parentNode.insertBefore(js, fjs);
      }(document, 'script', 'facebook-jssdk'));</script>

      <!-- Your customer chat code -->
      <div class="fb-customerchat"
        attribution=setup_tool
        page_id="108894900625262"
  theme_color="#2A2359"
  logged_in_greeting="Hola, ¿Cómo podemos ayudarte?"
  logged_out_greeting="Hola, ¿Cómo podemos ayudarte?">
      </div>
<?php
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

	<div class="col-sm-7 col-xs-12" id="perfil">
		<div class="col-xs-12"><br><br></div>
		<div class="col-xs-12">
			<div class="col-xs-12 visible-xs"><br><br><br></div>
			<?php //quitar titulo <span hidden>?>
			<h1 class="texto-negrita" align="center">Contáctanos</h1>
			<div class="col-xs-5"></div>
			<div class="linea-decorativa col-xs-2">.</div>
			<?php //quitar titulo </span>?>
			<div class="col-xs-5"><br><br></div>

			<div class="col-xs-12 vias" align="center">
				<a class="correo" href="<?php echo $mailEmpresa; ?>" target="_blank">
					<div class="col-xs-6">
						<i class="far fa-envelope"></i>
						<p><?php echo $emailEmpresa; ?></p>
					</div>
				</a>
				<a class="whatsapp" href="<?php echo $whatsappEmpresa; ?>" target="_blank">
					<div class="col-xs-6">
						<i class="fab fa-whatsapp"></i> 
						<p><?php echo $telefonoEmpresa; ?></p>
					</div>
				</a>
			</div>

			<div class="col-xs-12 info" align="center">
				<br><br>
			    <h4><small>Nombre de usuario</small></h4>
				<p><?php echo $usuario -> obtener_nombre(); ?></p>
				<br>
				<a class="btn btn-success" href="<?php echo RUTA_LOGOUT; ?>">Cerrar Sesión</a>
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