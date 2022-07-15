<?php

include_once 'app/EscritorEntradas.inc.php';
include_once 'app/RepositorioEntrada.inc.php';

$busqueda = null;
$resultados = null;

$buscar_titulo = true;
$buscar_contenido = true;
$buscar_tags = false;
$buscar_autor = false;

$ordenar_antiguas = false;

if (isset($_POST['buscar']) && isset($_POST['termino-buscar']) && !empty($_POST['termino-buscar'])) {
	$busqueda = $_POST['termino-buscar'];

	Conexion::abrir_conexion();
	$resultados = RepositorioEntrada::buscar_entradas_todos_los_campos(Conexion::obtener_conexion(), $busqueda);

	Conexion::cerrar_conexion();
}

if (isset($_POST['busqueda_avanzada']) && isset($_POST['campos'])) {

	if (in_array("titulo", $_POST['campos'])) {
		$buscar_titulo = true;
	}

	if (in_array("contenido", $_POST['campos'])) {
		$buscar_contenido = true;
	}

	if (in_array("tags", $_POST['campos'])) {
		$buscar_tags = true;
	}

	if (in_array("autor", $_POST['campos'])) {
		$buscar_autor = true;
	}

	if ($_POST['fecha'] == "recientes") {
		$orden = "DESC";
	}

	if ($_POST['fecha'] == "antiguas") {
		$orden = "ASC";
	}

	if (isset($_POST['termino-buscar']) && !empty($_POST['termino-buscar'])) {
		$busqueda = $_POST['termino-buscar'];

		Conexion::abrir_conexion();

		if ($buscar_titulo) {
			$entradas_por_titulo = RepositorioEntrada::buscar_entradas_por_titulo(Conexion::obtener_conexion(),  $busqueda, $orden);
		}

		if ($buscar_contenido) {
			$entradas_por_contenido = RepositorioEntrada::buscar_entradas_por_contenido(Conexion::obtener_conexion(),  $busqueda, $orden);
		}

		if ($buscar_tags) {
			//añadir tags cuando existan
		}

		if ($buscar_autor) {
			$entradas_por_autor = RepositorioEntrada::buscar_entradas_por_autor(Conexion::obtener_conexion(), $busqueda, $orden);
		}
	}
}

$titulo = "Buscar";

include 'seccion/cabecera-inicio.inc.php';?>
        
        <link async='async' rel="stylesheet" href="<?php echo RUTA_CSS; ?>materialize.min.css">
        <link async='async' rel="stylesheet" href="<?php echo RUTA_CSS; ?>bootstrap.css">
        <link async='async' rel="stylesheet" href="<?php echo RUTA_CSS; ?>estilo-servicios.css">
        <link async='async' rel="stylesheet" href="<?php echo RUTA_CSS; ?>estilos.css">
        <link async='async' rel="stylesheet" href="<?php echo RUTA_CSS; ?>galeria-lightbox.css">
        <link async='async' rel="stylesheet" href="<?php echo RUTA_CSS; ?>efecto-imagen.css">
        <link async='async' rel="stylesheet" href="<?php echo RUTA_CSS; ?>recortar-imagen.min.css">
		<link async='async' rel="stylesheet" href="<?php echo RUTA_CSS; ?>estilo-menu.css">
        

<?php 
include 'seccion/cabecera-cierre.inc.php';
include_once 'seccion/doc-navbar.inc.php';
?>

<?php //pc ?>
<div class="col-sm-12" id="busqueda">
    <div class="col-sm-1"></div>
    <div class="col-sm-10"><br><br>
        <h1 class="texto-negrita">Resultados de Búsqueda</h1>
        <div class="col-sm-5"></div>
        <div class="linea-decorativa col-sm-2">.</div>
        <div class="col-sm-5"></div>
        <span class="visible-xs col-xs-1"><br><br><br></span>
        <div class="col-sm-12 col-xs-10"><br><br><br>
			<div class="col-sm-12">
				<h4>
					<?php
					if (isset($_POST['buscar']) && count($resultados)) {
						echo count($resultados);?>
						Producto(s)
				</h4>
				<hr>
						<?php
					} //COMPROBAR RESULTADOS EN BÚSQUEDA MÚLTIPLE
					?>
			</div>

			<?php
				if (isset($_POST['buscar'])) {
					if(count($resultados)) {
						EscritorEntradas::mostrar_entradas_busqueda($resultados);
					} else {
						?>
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
						<?php
					}
				} else if (isset($_POST['busqueda_avanzada'])) {
					if (count($entradas_por_titulo) || count($entradas_por_contenido) || count($entradas_por_autor)) {
						$parametros = count($_POST['campos']);
						$ancho_columnas = 12 / $parametros;
						?>
						<div class="col-sm-12">
							<?php
							for ($i = 0; $i < $parametros; $i++) {
							?>
								<div class="<?php echo 'col-sm-'.$ancho_columnas;?> text-center">
									<h4><?php echo 'Coincidencias en '.$_POST['campos'][$i];?></h4>
									<br>
									<?php
									switch($_POST['campos'][$i]) {
										case "titulo":
											EscritorEntradas::mostrar_entradas_busqueda_multiple($entradas_por_titulo);
											break;
										case "contenido":
										EscritorEntradas::mostrar_entradas_busqueda_multiple($entradas_por_contenido);
											break;
										case "tags":
											break;
										case "autor":
											EscritorEntradas::mostrar_entradas_busqueda_multiple($entradas_por_autor);
											break;
									}
									?>
								</div>
								<?php
							}
							?>
						</div>
						<?php
					} else {
						?>
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
						<?php
					}
				}
			?>	
		</div> 
		      
    </div>	


    <div class="col-sm-12">
        <div class="col-sm-1"></div>
        <div class="col-sm-10">
            <?php include_once 'seccion/footer.inc.php'; ?>
        </div>
    </div>
</div>

<?php //pc ?>



<?php
include_once 'seccion/doc-pie.inc.php';
?>
