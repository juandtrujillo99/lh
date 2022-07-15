<!DOCTYPE html>
<html lang="es">
	<head>
        <meta http-equiv='cache-control' content='no-cache'>
        <meta http-equiv='expires' content='0'>
        <meta http-equiv='pragma' content='no-cache'>
		<meta charset="UTF-8">
		<meta name="theme-color" content="#000">
		<meta name="viewport" content="width=device-width, user-scalable=no, inicial-scale=1.0, maximun-scale=1.0, Mminimun-scale=1.0">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
		 <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
		<link href="<?php echo RUTA_IMG; ?>nosotros/mini-logo.png" type="imagen/x-icon" rel="ahortcut icon" />
		<meta name="distribution" content="global" />
		<script defer src="<?php echo RUTA_JS; ?>theme.js"></script>
		<link async='async' rel="stylesheet" href="<?php echo RUTA_CSS; ?>fuentes.css">
		<link async='async' rel="stylesheet" href="<?php echo RUTA_CSS; ?>estilos-icono-nav.css">
		<link async='async' rel="stylesheet" href="<?php echo RUTA_CSS; ?>materialize.min.css">
        <link async='async' rel="stylesheet" href="<?php echo RUTA_CSS; ?>bootstrap.css">
        <link async='async' rel="stylesheet" href="<?php echo RUTA_CSS; ?>estilos.css">
		<style rel="prefetch" media="screen">
			.logo-svg{
				-webkit-mask:url(<?php echo RUTA_IMG;?>nosotros/logo.svg) repeat;
				-webkit-mask-position-x: center;
			    -webkit-mask-position-y: center;
			    -webkit-mask-size: cover;
				width: 100px;
				height: 100px;
				background: #000;
			}
		</style>
        <script>
            (function(h,o,t,j,a,r){
                h.hj=h.hj||function(){(h.hj.q=h.hj.q||[]).push(arguments)};
                h._hjSettings={hjid:1903590,hjsv:6};
                a=o.getElementsByTagName('head')[0];
                r=o.createElement('script');r.async=1;
                r.src=t+h._hjSettings.hjid+j+h._hjSettings.hjsv;
                a.appendChild(r);
            })(window,document,'https://static.hotjar.com/c/hotjar-','.js?sv=');
        </script>



		
		<?php
		include_once 'app/ControlSesion.inc.php';
		include_once 'app/ControlSesionAdmin.inc.php';
		
		// el titulo se convirtio en una variable, por lo tanto, cada pagina puede tener su propio titulo
		if(!isset($titulo) || empty($titulo)){
			$titulo = $nombreEmpresa;
		}
		echo "<title>$titulo</title>" . PHP_EOL;

		// la descripcion de la Pagina se convirtio en una variable, por lo tanto, cada pagina puede tener su propia descripcion
		if(!isset($descripcionPagina) || empty($descripcionPagina)){
			$descripcionPagina = ' ' . PHP_EOL;
		}
		echo '<meta name="Description" content="'.$descripcionPagina .'"/>' . PHP_EOL;

		// la imagen de la Pagina se convirtio en una variable, por lo tanto, cada pagina puede tener su propia imagen
		if(!isset($imagenCompartida) || empty($imagenCompartida)){
			$imagenCompartida = '<meta itemprop="image" content="'. RUTA_IMG .'nosotros/logo-2.jpg">' . PHP_EOL;
		}
		echo '<meta itemprop="image" content="'. RUTA_IMG .'nosotros/logo-2.jpg">' . PHP_EOL;
