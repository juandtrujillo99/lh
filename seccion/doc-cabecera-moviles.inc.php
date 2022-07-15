<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<meta name="theme-color" content="#000">
		<meta name="viewport" content="width=device-width, user-scalable=no, inicial-scale=1.0, maximun-scale=1.0, Mminimun-scale=1.0">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">

		
		<?php
		include_once 'info_empresa.inc.php';
		
		// el titulo se convirtio en una variable, por lo tanto, cada pagina puede tener su propio titulo
		if(!isset($titulo) || empty($titulo)){
			$titulo = 'Darelabs';
		}
		echo "<title>$titulo</title>";
		?>		


		<link href="<?php echo SERVIDOR; ?>/img/nosotros/mini-logo.png" type="imagen/x-icon" rel="ahortcut icon" />
		<link rel="stylesheet" href="<?php echo RUTA_CSS; ?>bootstrap.css">
		<link rel="stylesheet" href="<?php echo RUTA_CSS; ?>estilos.css">
		<link rel="stylesheet" href="<?php echo RUTA_CSS; ?>galeria-lightbox.css">
		<link rel="stylesheet" href="<?php echo RUTA_CSS; ?>slider.css">
		<link rel="stylesheet" href="<?php echo RUTA_CSS; ?>fuentes.css">

	</head>
	<body>
		<span itemscope itemtype="http://schema.org/WebSite"> 