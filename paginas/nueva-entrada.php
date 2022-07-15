<?php
include_once 'app/config.inc.php';
include_once 'app/Conexion.inc.php';
include_once 'app/Entrada.inc.php';
include_once 'app/RepositorioAdmin.inc.php';
include_once 'app/RepositorioEntrada.inc.php';
include_once 'app/ValidadorEntrada.inc.php';
include_once 'app/ControlSesion.inc.php';
include_once 'app/ControlSesionAdmin.inc.php';
include_once 'app/Redireccion.inc.php';

if (!ControlSesionAdmin :: sesion_iniciada()) {
    Redireccion :: redirigir(RUTA_LOGIN_ADMIN);
}
else{
    Conexion :: abrir_conexion();
    $id = $_SESSION['id_usuario'];
    $admin = RepositorioAdmin :: obtener_admin_por_id(Conexion::obtener_conexion(), $id);
}


$entrada_publica = 0;
if (isset($_POST['guardar'])) {
	Conexion :: abrir_conexion();
	
	$validador = new ValidadorEntrada($_POST['titulo'], $_POST['url'], $_POST['video'], $_POST['imagen'], $_POST['imagen2'], $_POST['precio'], $_POST['texto'], Conexion :: obtener_conexion());

	
	if (isset($_POST['publicar']) && $_POST['publicar'] == 'si') {
		$entrada_publica = 1;
	}
	
	if ($validador -> entrada_valida()) {
		if (ControlSesion :: sesion_iniciada()) {
			
			$entrada = new Entrada('', $_SESSION['id_usuario'], $validador -> obtener_url(), $validador -> obtener_video(), $validador -> obtener_imagen(), $validador -> obtener_imagen2(), $validador -> obtener_titulo(), $validador -> obtener_precio(), $validador -> obtener_texto(), '', $entrada_publica);
				
			$entrada_insertada = RepositorioEntrada :: insertar_entrada(Conexion :: obtener_conexion(), $entrada);
			if ($entrada_insertada) {
				Redireccion::redirigir(RUTA_GESTOR_ENTRADAS);
			}
		} else {
			Redireccion :: redirigir(RUTA_LOGIN);
		}
		
		Conexion :: cerrar_conexion();
	}
}

$titulo = "Nueva entrada | $nombreEmpresa";

include 'seccion/cabecera-inicio.inc.php';?>
        
		<?php 
		//script que sube las imagenes de las entradas
		include_once 'scripts/barra-progreso.php';
		?>

	    <script src="<?php echo RUTA_JS; ?>clipboard.min.js" async='async'></script>

<?php 
include 'seccion/cabecera-cierre.inc.php';
include_once 'seccion/doc-navbar.inc.php';
?>

<script type="text/javascript">
	// usamos onload para asegurarnos que existan los elementos en nuestro DOM
        window.onload = function() {
            var anchor = document.getElementById("anchor");         
            
            // le asociamos el evento a nuestro elemento para tener un codigo 
            // html mas limpio y manejar toda la interaccion
            // desde nuestro script
            anchor.onclick = function() {
                // una variable donde pongo la url a donde quiera ir, 
                //podria estar de mas pero asi queda mas limpio la funcion window.open()
                var url = "<?php echo RUTA_SUBIR_IMAGEN;?>";
                window.open(url, "_blank", 'width=800,height=500'); 
                // el return falase es para eviar que se progrague el evento y se vaya al href de tu anchor.
                return false;
            };
        }
</script>

<div class="col-sm-12 col-xs-12" id="agregar-entrada">
	<br><br>
    <h2 class="text-center texto-negrita">Agregando entrada...</h2>
    <div class="col-sm-12" align="center">
		<br><br>
		<a href="javascript:history.back(-1);">&larr; Volver al gestor</a>
		<br><br><br>
	</div> 
	<br><br>
	<div class="col-sm-1 col-xs-1"></div>
	<div class="col-sm-10 col-xs-10">
		<div class="col-sm-8" id="formulario-entrada">
			<form class="form-nueva-entrada" method="post" action="<?php echo RUTA_NUEVA_ENTRADA; ?>">
				<?php
					if (isset($_POST['guardar'])) {
						include_once 'seccion/form_nueva_entrada_validado.inc.php';
					} else {						
						include_once 'seccion/form_nueva_entrada_vacio.inc.php';
					}
				?>
				<br><br><br>
				<button type="submit" class="btn btn-primary" name="guardar">Guardar entrada</button>
				<br><br><br>
			</form>	
		</div>
		<div class="col-sm-1"></div>
		<div class="col-sm-3">
			<h3>Para agregar un color</h3>
			<p align="justify" id="copialo">
				<input id="copia-tag-color" type="textarea" class="copialo" value="<img src='http://loshuecos.cf/img/colores/dorado.jpg' width='20px' height='20px'>" >
				<button class="boton" data-clipboard-action="copy" data-clipboard-target="#copia-tag-color">Copiar</button>
				<?php //copiar al portapapeles ?>
			    <script>
				    var clipboard = new ClipboardJS('.boton');
				    clipboard.on('success', function(e) {
				        console.log(e);
				    });
				    clipboard.on('error', function(e) {
				        console.log(e);
				    });
			    </script>
			    <?php //copiar al portapapeles ?>				
			</p>
			<br><br>
		</div>		
	</div>
	<br>
</div>
<?php
include_once 'seccion/doc-pie.inc.php';
?>
