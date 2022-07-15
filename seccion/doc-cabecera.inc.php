<?php/* include 'seccion/cabecera-inicio.inc.php';?>
		
		<link async='async' rel="stylesheet" href="<?php echo RUTA_CSS; ?>bootstrap.css">
		<link async='async' rel="stylesheet" href="<?php echo RUTA_CSS; ?>estilos.css">
		<link async='async' rel="stylesheet" href="<?php echo RUTA_CSS; ?>galeria-lightbox.css">
		<link async='async' rel="stylesheet" href="<?php echo RUTA_CSS; ?>slider.css">
		<link async='async' rel="stylesheet" href="<?php echo RUTA_CSS; ?>efecto-imagen.css">
		<link async='async' rel="stylesheet" href="<?php echo RUTA_CSS; ?>fuentes.css">
		<link async='async' rel="stylesheet" href="<?php echo RUTA_CSS; ?>carga.css">
		<link async='async' rel="stylesheet" href="<?php echo RUTA_CSS; ?>mapa-nav.css">
		<link async='async' rel="stylesheet" href="<?php echo RUTA_CSS; ?>comentarios.css">
		<link async='async' rel="stylesheet" href="<?php echo RUTA_CSS; ?>comprar.css">
		<link async='async' rel="stylesheet" href="<?php echo RUTA_CSS; ?>recortar-imagen.min.css">
		<link async='async' rel="stylesheet" href="<?php echo RUTA_CSS; ?>redes.css">		
		<script src="<?php echo RUTA_JS; ?>arriba.js" async='async'></script>
		<script src="<?php echo RUTA_JS; ?>clipboard.min.js" async='async'></script>
		
		<?php 
		//script que sube las imagenes de las entradas
		include_once 'scripts/barra-progreso.php';
		?>

		<?php //slider section ?>
		<link rel="stylesheet" type="text/css" href="<?php echo RUTA_SLIDER_ENGINE;?>style.css" />
		<script type="text/javascript" src="<?php echo RUTA_SLIDER_ENGINE;?>jquery.js" async='async'></script>
		<?php //slider section ?>


		<script type="text/javascript" async='async'>
			function abrirMapa(){$(".ventana").slideDown("slow");}
			function cerrarMapa(){$(".ventana").slideUp("fast");}

			function abrirCompra(){$(".ventanaCompra").slideDown("fast");}
			function cerrarCompra(){$(".ventanaCompra").slideUp("fast");}
		</script>

		<script type='text/javascript' src='//platform-api.sharethis.com/js/sharethis.js#property=5c5ad2e26dbc680011d2b439&product=inline-share-buttons' async='async'></script>			

	
<?php include 'seccion/cabecera-cierre.inc.php';?>