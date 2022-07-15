<?php
include_once 'app/config.inc.php';
include_once 'app/Conexion.inc.php';
include_once 'app/Usuario.inc.php';
include_once 'app/RepositorioUsuario.inc.php';
include_once 'app/ValidadorRegistro.inc.php';
include_once 'app/Redireccion.inc.php';
include_once 'app/ControlSesion.inc.php';

if (ControlSesion::sesion_iniciada()) {
  Redireccion::redirigir(RUTA_PERFIL);
}

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

$titulo = "Contacto | $nombreEmpresa";

include 'seccion/cabecera-inicio.inc.php';?>

    
    <link async='async' rel="stylesheet" href="<?php echo RUTA_CSS; ?>iframe-registro-usuarios.css">
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
  <div class="col-sm-5 col-xs-12 img-contacto hidden-xs" id="contacto" style="background-image: url(<?php echo RUTA_IMG;?>fondos/contacto.jpg)">
    <div class="col-xs-12 vias" align="center">
      <div class="col-xs-12 correo">
        <i class="far fa-envelope"></i>
        <h3><?php echo $emailEmpresa; ?></h3>
      </div>
      <a class="whatsapp" href="<?php echo $whatsappEmpresa; ?>" target="_blank">
        <div class="col-xs-12">
          <i class="fab fa-whatsapp"></i> 
          <h3><?php echo $telefonoEmpresa; ?></h3>
        </div>
      </a>
    </div>      
  </div>
  <div class="col-sm-7 col-xs-12">
    <?php
    include_once 'seccion/registro-usuarios.inc.php';
    ?> 
  </div>
</div>
<?php //cuerpo
//en el registro solo se puede poner un formulario, es por eso, que no se adapta a moviles como lo hace el login, es decir, solo esta disponible para pc y el navegador debe hacer el trabajo de adaptarlo solo

include_once 'seccion/doc-pie.inc.php';
?>